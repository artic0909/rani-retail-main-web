<?php

namespace App\Http\Controllers\stocker;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Manager;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubCategoryDescriptiveFields;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FilteredProductsExport;
use App\Models\SoldItems;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{

    // Stock Manager Login View---------------------------->
    public function loginView()
    {
        return view('stock-manager-login');
    }

    // Stock Manager Register View---------------------------->
    public function registerView()
    {
        return view('stock-manager-register');
    }

    // Stock Manager Waiting Page View---------------------------->
    public function waitingPageView()
    {
        return view('waiting-page');
    }

    // Stock Dashboard View---------------------------->
    public function stockDashboardView()
    {
        $mainCategoryCount = MainCategory::count();
        $subCategoryCount = SubCategory::count();
        $mainCategories = MainCategory::with('subCategories.products')
            ->inRandomOrder()
            ->paginate(6);


        $today = Carbon::today();

        $todaysSales = SoldItems::whereDate('sold_date', $today)
            ->sum('customer_overall_total_amount');

        $todaysProductQty = SoldItems::whereDate('sold_date', $today)
            ->with('products')
            ->get()
            ->sum(function ($sale) {
                return collect($sale->products)->sum('customer_purchase_quantity');
            });


        $lastSalesDay = SoldItems::whereDate('sold_date', '<', $today)
            ->orderByDesc('sold_date')
            ->value('sold_date');


        $yesterdaysSales = 0;
        $yesterdaysProductQty = 0;
        $yesterdaySalesDate = null;
        $yesterdaySellingProductDate = null;

        if ($lastSalesDay) {

            $yesterdaysSales = SoldItems::whereDate('sold_date', $lastSalesDay)
                ->sum('customer_overall_total_amount');

            $yesterdaysProductQty = SoldItems::whereDate('sold_date', $lastSalesDay)
                ->with('products')
                ->get()
                ->sum(function ($sale) {
                    return collect($sale->products)->sum('customer_purchase_quantity');
                });

            $yesterdaySalesDate = Carbon::parse($lastSalesDay)->format('d M');
            $yesterdaySellingProductDate = Carbon::parse($lastSalesDay)->format('d M');
        }

        $stockRefillCount = Product::where('purchase_unit', '<=', 3)->count();

        $now = Carbon::now();

        // This Month
        $thisMonthSales = SoldItems::whereMonth('sold_date', $now->month)
            ->whereYear('sold_date', $now->year)
            ->sum('customer_overall_total_amount');

        // Last Month
        $lastMonth = $now->copy()->subMonth();
        $lastMonthSales = SoldItems::whereMonth('sold_date', $lastMonth->month)
            ->whereYear('sold_date', $lastMonth->year)
            ->sum('customer_overall_total_amount');



        // Last latest sales
        $latestSales = SoldItems::orderByDesc('id')->get();

        foreach ($latestSales as $sale) {
            $productDetails = [];
            $productItems = is_string($sale->products) ? json_decode($sale->products, true) : $sale->products;

            if (is_array($productItems)) {
                foreach ($productItems as $item) {
                    $product = Product::find($item['product_id'] ?? null);
                    if ($product) {
                        $productDetails[] = [
                            'name' => $product->product_name,
                            'field_values' => $product->field_values,
                            'rate' => $item['customer_product_rate'] ?? null,
                            'quantity' => $item['customer_purchase_quantity'] ?? null,
                            'profit' => $item['customer_profit_percentage'] ?? null,
                            'selling_price' => $item['customer_product_selling_price'] ?? null,
                        ];
                    }
                }
            }

            $sale->productDetails = $productDetails;
        }

        $records = DB::table('sold_items')
            ->where('sold_date', '>=', now()->subMonths(6))
            ->get();

        $monthlySales = [];

        foreach ($records as $record) {
            $month = Carbon::parse($record->sold_date)->format('F'); // e.g., "August"

            $products = json_decode($record->products, true);
            $totalProfit = 0;

            foreach ($products as $product) {
                $rate = floatval($product['customer_product_rate']);
                $qty = floatval($product['customer_purchase_quantity']);
                $profit_percent = floatval($product['customer_profit_percentage']);

                // Calculate profit for each product
                $totalProfit += ($rate * $qty) * ($profit_percent / 100);
            }

            if (!isset($monthlySales[$month])) {
                $monthlySales[$month] = [
                    'month' => $month,
                    'total_sales' => 0,
                    'total_profit' => 0,
                ];
            }

            $monthlySales[$month]['total_sales'] += $record->customer_overall_total_amount;
            $monthlySales[$month]['total_profit'] += $totalProfit;
        }

        // Sort by recent months (optional)
        $monthlySales = collect($monthlySales)->sortByDesc(function ($data) {
            return Carbon::parse('1 ' . $data['month']);
        })->take(6);

        return view('stocker.stock-dashboard', [
            'mainCategoryCount' => $mainCategoryCount,
            'subCategoryCount' => $subCategoryCount,
            'yesterdaySalesDate' => $yesterdaySalesDate,
            'yesterdaySellingProductDate' => $yesterdaySellingProductDate,
            'yesterdaysSales' => $yesterdaysSales,
            'yesterdaysProductQty' => $yesterdaysProductQty,
            'todaysSales' => $todaysSales,
            'todaysProductQty' => $todaysProductQty,
            'stockRefillCount' => $stockRefillCount,
            'thisMonthSales' => $thisMonthSales,
            'lastMonthSales' => $lastMonthSales,
            'mainCategories' => $mainCategories,
            'lastMonthName' => $lastMonth->format('F'),
            'latestSales' => $latestSales,
            'monthlySales' => $monthlySales,
        ]);
    }

    // Stock Manager Register Function---------------------------->
    public function stockManagerRegister(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'mobile'   => 'required',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'mobile'    => $validated['mobile'],
            'password' => bcrypt($validated['password']),
            'type'     => 'stock-manager',
        ]);

        return redirect()->route('waiting-page')->with('success', 'Stock Manager registered successfully.');
    }

    // Stock Manager Login Function---------------------------->
    public function stockManagerLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('managers')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('stock-dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    // Stock Manager Logout Function---------------------------->
    public function stockManagerLogout()
    {
        Auth::guard('managers')->logout();
        Session::flush();
        return redirect()->route('stock-manager-login');
    }

    // Stock Manager Profile View---------------------------->
    public function profileView()
    {
        $user = Auth::guard('managers')->user();
        return view('stocker.stock-manager-profile', compact('user'));
    }

    // Stock Manager Profile Edit---------------------------->
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'nullable|string|max:20',
        ]);

        $user = Auth::guard('managers')->user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    // Stock Manager Profile Password Update---------------------------->
    public function updateProfilePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::guard('managers')->user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully!');
    }





    // Main Category View---------------------------->
    public function addMainCategoryView()
    {
        $mainCategories = MainCategory::all();
        return view('stocker.stock-add-main-category', compact('mainCategories'));
    }

    // Store Main Category Function---------------------------->
    public function storeMainCategory(Request $request)
    {
        $request->validate([
            'main_category_name' => 'required',
        ]);

        $mainCategory = new MainCategory();
        $mainCategory->main_category_name = $request->main_category_name;
        $mainCategory->slug = Str::slug($request->main_category_name);
        $mainCategory->save();
        return redirect()->route('stock-add-main-category')->with('success', 'Main Category added successfully');
    }

    // Show All Main Category View ---------------------------->
    public function showAllMainCategory()
    {

        $mainCategories = MainCategory::all();

        return view('stocker.stock-all-main-category', compact('mainCategories'));
    }

    public function editMainCategory(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:main_categories,id',
            'main_category_name' => 'required|string|max:255',
        ]);

        $category = MainCategory::findOrFail($request->id);
        $category->main_category_name = $request->main_category_name;
        $category->slug = Str::slug($request->main_category_name);
        $category->save();

        return redirect()->back()->with('success', 'Main Category updated successfully.');
    }

    public function deleteMainCategory($id)
    {
        $category = MainCategory::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Main Category deleted successfully.');
    }



    // Store Sub Category Function---------------------------->
    public function storeSubCategory(Request $request)
    {
        $request->validate([
            'main_category_name' => 'required|exists:main_categories,id',
            'sub_category_name' => 'required|array|min:1',
            'sub_category_name.*' => 'required|string|max:255',
        ]);

        foreach ($request->sub_category_name as $subCat) {
            SubCategory::create([
                'main_category_id'   => $request->main_category_name,
                'sub_category_name'  => $subCat,
                'slug'               => Str::slug($subCat),
            ]);
        }

        return redirect()->back()->with('success', 'Subcategories added successfully.');
    }

    // Sub Category View---------------------------->
    public function subCategoryView($slug)
    {
        $mainCategory = MainCategory::with('subCategories')->where('slug', $slug)->firstOrFail();
        $mainCategories = MainCategory::all();
        return view('stocker.stock-show-sub-category-fields', compact('mainCategory', 'mainCategories'));
    }

    // Show All Sub Category View ---------------------------->
    public function showAllSubCategory()
    {
        $subCategories = SubCategory::with('mainCategory')->get();
        return view('stocker.stock-all-sub-category', compact('subCategories'));
    }

    public function editSubCategory(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:sub_categories,id',
            'sub_category_name' => 'required|string|max:255',
        ]);

        $subCategory = SubCategory::findOrFail($request->id);
        $subCategory->sub_category_name = $request->sub_category_name;
        $subCategory->slug = Str::slug($request->sub_category_name);
        $subCategory->save();

        return redirect()->back()->with('success', 'Sub Category updated successfully.');
    }

    public function deleteSubCategory($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();

        return redirect()->back()->with('success', 'Sub Category deleted successfully.');
    }


    // Add Sub Category Data Fields View---------------------------->
    public function addSubCategoryFieldsView($slug)
    {
        $subCategory = SubCategory::with('mainCategory')->where('slug', $slug)->firstOrFail();
        $fields = SubCategoryDescriptiveFields::where('sub_category_id', $subCategory->id)->get();

        return view('stocker.stock-add-sub-category-fields', [
            'subCategory' => $subCategory,
            'mainCategory' => $subCategory->mainCategory,
            'fields' => $fields
        ]);
    }

    // Store Sub Category Data Fields Function---------------------------->
    public function storeDescriptiveFields(Request $request, $subCategoryId)
    {
        $request->validate([
            'fields' => 'required|array|min:1',
            'types'  => 'required|array|min:1',
        ]);

        foreach ($request->fields as $index => $fieldName) {
            SubCategoryDescriptiveFields::create([
                'sub_category_id' => $subCategoryId,
                'field_name'      => $fieldName,
                'field_type'      => $request->types[$index] ?? 'text',
            ]);
        }

        return redirect()->back()->with('success', 'Descriptive fields added.');
    }

    // Edit Sub Category Data Fields Function---------------------------->
    public function editDescriptiveFields(Request $request, $id)
    {
        $field = SubCategoryDescriptiveFields::findOrFail($id);
        $field->field_name = $request->input('field')[0];
        $field->field_type = $request->input('type')[0];
        $field->save();

        return redirect()->back()->with('success', 'Field updated successfully.');
    }

    // Delete Sub Category Data Fields Function---------------------------->
    public function deleteDescriptiveFields($id)
    {
        SubCategoryDescriptiveFields::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Field deleted successfully.');
    }

    // Add Products View---------------------------->
    public function addProductsView($subcategorySlug)
    {
        $subCategory = SubCategory::with('mainCategory', 'descriptiveFields')
            ->where('slug', $subcategorySlug)
            ->firstOrFail();

        return view('stocker.stock-add-products', [
            'subCategory' => $subCategory,
            'mainCategory' => $subCategory->mainCategory,
            'fields' => $subCategory->descriptiveFields,
        ]);
    }

    // Store Products Function---------------------------->
    public function storeProduct(Request $request, $subcategorySlug)
    {
        $subCategory = SubCategory::with('descriptiveFields')->where('slug', $subcategorySlug)->firstOrFail();


        $request->validate([
            'product_name'     => 'required|string|max:255',
            'purchase_details' => 'nullable|string',
            'purchase_unit'    => 'nullable|string|max:255',
            'unit_type'        => 'nullable|string|max:255',
            'purchase_rate'    => 'nullable|numeric',
            'transport_cost'   => 'nullable|numeric',
        ]);

        $dynamicInputs = $request->input('dynamic_fields', []);
        $dynamicFieldValues = [];

        foreach ($subCategory->descriptiveFields as $field) {
            $dynamicFieldValues[$field->field_name] = $dynamicInputs[$field->field_name] ?? null;
        }

        Product::create([
            'sub_category_id'  => $subCategory->id,
            'product_name'     => $request->input('product_name'),
            'purchase_details' => $request->input('purchase_details'),
            'purchase_unit'    => $request->input('purchase_unit'),
            'unit_type'        => $request->input('unit_type'),
            'purchase_rate'    => $request->input('purchase_rate'),
            'transport_cost'   => $request->input('transport_cost'),
            'field_values'     => $dynamicFieldValues,
        ]);

        return redirect()->back()->with('success', 'Product added successfully.');
    }

    // Show Category Wise Products Function---------------------------->
    public function showCategoryWiseProducts()
    {
        $mainCategories = MainCategory::all();

        return view('stocker.stock-all-products', compact('mainCategories'));
    }

    public function getSubcategories($mainCategoryId)
    {
        $subcategories = SubCategory::where('main_category_id', $mainCategoryId)->get();
        return response()->json($subcategories);
    }


    public function getProducts(Request $request)
    {
        $products = Product::where('sub_category_id', $request->sub_category_id)->get();
        return response()->json($products);
    }

    public function editProductView($id)
    {
        $product = Product::findOrFail($id);

        $fields = SubCategoryDescriptiveFields::where('sub_category_id', $product->sub_category_id)->get();

        $fieldValues = is_string($product->field_values)
            ? json_decode($product->field_values, true)
            : ($product->field_values ?? []);

        return view('stocker.stock-edit-product', compact('product', 'fields', 'fieldValues'));
    }

    public function editProduct(Request $request, $id)
    {
        $validated = $request->validate([
            'product_name'      => 'required|string|max:255',
            'purchase_details'  => 'nullable|string',
            'purchase_unit'     => 'nullable|string|max:255',
            'purchase_rate'     => 'nullable|numeric',
            'transport_cost'    => 'nullable|numeric',
        ]);

        $product = Product::findOrFail($id);

        $product->product_name     = $validated['product_name'];
        $product->purchase_details = $validated['purchase_details'];
        $product->purchase_unit    = $validated['purchase_unit'];
        $product->purchase_rate    = $validated['purchase_rate'];
        $product->transport_cost   = $validated['transport_cost'];

        $dynamicFieldValues = $request->input('dynamic_fields', []);

        // ✅ Save as array (will auto-convert to JSON)
        $product->field_values = $dynamicFieldValues;

        $product->save();

        return redirect()->back()->with('success', 'Product updated successfully.');
    }

    public function deleteProduct($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    public function allProductsList()
    {

        $products = Product::with(['subCategory.mainCategory'])->get();

        return view('stocker.stock-list-all-products', compact('products'));
    }

    // Stock Report View---------------------------->
    public function stockReportView()
    {
        $mainCategories = MainCategory::with(['subCategories.products'])->orderBy('main_category_name')->get();
        return view('stocker.stock-stock-report', compact('mainCategories'));
    }

    public function exportStockReport()
    {
        $filePath = storage_path('app/stock_report.csv');

        $rows = [];

        $mainCategories = MainCategory::with('subCategories.products')->get();

        foreach ($mainCategories as $mainCategory) {
            foreach ($mainCategory->subCategories as $subCategory) {
                foreach ($subCategory->products as $product) {
                    // Decode product details
                    $detailsArray = is_string($product->field_values)
                        ? json_decode($product->field_values, true)
                        : (is_array($product->field_values) ? $product->field_values : []);

                    $productDetails = collect($detailsArray)
                        ->map(fn($val, $key) => ucwords(str_replace('_', ' ', $key)) . ': ' . $val)
                        ->implode(', ');

                    // Determine status
                    $status = 'Available';
                    if ($product->purchase_unit == 0) {
                        $status = 'Out of Stock';
                    } elseif ($product->purchase_unit <= 3) {
                        $status = 'Stock Refill';
                    }

                    $rows[] = [
                        'Main Category'   => $mainCategory->main_category_name,
                        'Sub Category'    => $subCategory->sub_category_name,
                        'Product Name'    => $product->product_name,
                        'Product Details' => $productDetails ?: 'No Details',
                        'Purchase Units'  => $product->purchase_unit,
                        'Unit Type'       => $product->unit_type,
                        'Purchase Rate'   => $product->purchase_rate,
                        'Transport Cost'  => $product->transport_cost,
                        'Status'          => $status,
                    ];
                }
            }
        }

        SimpleExcelWriter::create($filePath)->addRows($rows);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }


    // Sales Report View---------------------------->
    public function salesReportView(Request $request)
    {
        $from = $request->input('from_date');
        $to = $request->input('to_date');

        $query = SoldItems::query();

        if ($from && $to) {
            $query->whereBetween('sold_date', [
                Carbon::parse($from)->format('Y-m-d'),
                Carbon::parse($to)->format('Y-m-d')
            ]);
        }

        $salesReport = $query->orderBy('sold_date', 'desc')->with('products.product')->get();

        return view('stocker.stock-sales-report', compact('salesReport', 'from', 'to'));
    }

    // Sales Report Export ---------------------------->
    public function exportSalesReport(Request $request)
    {
        $from = $request->input('from_date');
        $to = $request->input('to_date');

        $query = SoldItems::query();

        if ($from && $to) {
            $query->whereBetween('sold_date', [
                Carbon::parse($from)->format('Y-m-d'),
                Carbon::parse($to)->format('Y-m-d')
            ]);
        }

        $sales = $query->orderBy('sold_date', 'desc')->get();

        $rows = [];

        foreach ($sales as $report) {
            $products = is_array($report->products) ? $report->products : [];

            $productLines = [];
            $totalProfit = 0;
            $totalCost = 0;
            $productCounter = 1;

            foreach ($products as $product) {
                $productModel = \App\Models\Product::find($product['product_id']);

                $name = $productModel->product_name ?? 'N/A';
                $rate = $product['customer_product_rate'];
                $qty = $product['customer_purchase_quantity'];
                $selling = $product['customer_product_selling_price'];

                $cost = $rate * $qty;
                $profit = $selling - $cost;
                $profitPercentage = $cost > 0 ? round(($profit / $cost) * 100) : 0;

                $totalCost += $cost;
                $totalProfit += $profit;

                // Decode field_values (other details)
                $fieldValues = is_string($productModel->field_values ?? null)
                    ? json_decode($productModel->field_values, true)
                    : (is_array($productModel->field_values) ? $productModel->field_values : []);

                $detailsString = '';
                if (!empty($fieldValues)) {
                    $detailsList = [];
                    foreach ($fieldValues as $key => $value) {
                        $keyFormatted = ucwords(str_replace('_', ' ', $key));
                        $detailsList[] = "$keyFormatted: $value";
                    }
                    $detailsString = ' (' . implode(', ', $detailsList) . ')';
                }

                $productLines[] = $productCounter++ . ". $name$detailsString - Rate: ₹" . number_format($rate, 2) .
                    ", Qty: $qty, Profit % : $profitPercentage%" .
                    ", Selling: ₹" . number_format($selling, 2) .
                    ", Profit: ₹" . number_format($profit, 2);
            }

            $rows[] = [
                'Date' => Carbon::parse($report->sold_date)->format('d/m/Y'),
                'Customer Name' => $report->customer_name,
                'Customer Email' => $report->custome_email,
                'Customer Mobile' => $report->custome_mobile,
                'Product Details' => implode("\n", $productLines),
                'Overall Profit Amount' => "₹" . number_format($totalProfit, 2),
                'Overall Profit %' => $totalCost > 0 ? round(($totalProfit / $totalCost) * 100, 2) . '%' : '0%',
            ];
        }

        $filePath = storage_path('app/sales_report.csv');

        SimpleExcelWriter::create($filePath)->addRows($rows);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    // Stock Refill View ---------------------------->
    public function stockRefillView()
    {
        $products = Product::where('purchase_unit', '<', 4)->get();
        return view('stocker.stock-stock-refill', compact('products'));
    }

    public function exportStockRefill()
    {
        $products = Product::with(['subCategory.mainCategory'])
            ->where('purchase_unit', '<=', 3)
            ->get();

        $rows = [];
        $counter = 1;

        foreach ($products as $product) {
            $mainCategory = $product->subCategory->mainCategory->main_category_name ?? 'N/A';
            $subCategory = $product->subCategory->sub_category_name ?? 'N/A';

            // Determine stock status
            if ($product->purchase_unit == 0) {
                $stockStatus = 'Out of Stock';
            } elseif ($product->purchase_unit <= 3) {
                $stockStatus = "{$product->purchase_unit} {$product->unit_type} Refill";
            } else {
                $stockStatus = "{$product->purchase_unit} {$product->unit_type}";
            }

            // Parse dynamic fields
            $fields = is_string($product->field_values)
                ? json_decode($product->field_values, true)
                : ($product->field_values ?? []);

            $fieldDetails = [];
            if (is_array($fields)) {
                foreach ($fields as $label => $value) {
                    $fieldDetails[] = "$label: $value";
                }
            }

            $rows[] = [
                'SL' => $counter++,
                'Product Name' => $product->product_name,
                'Main Category' => $mainCategory,
                'Sub Category' => $subCategory,
                'Stock Status' => $stockStatus,
                'Purchase Details' => $product->purchase_details ?? 'N/A',
                'Purchase Rate' => $product->purchase_rate ?? 'N/A',
                'Transport Cost' => $product->transport_cost ?? 'N/A',
                'Descriptive Fields' => implode("\n", $fieldDetails),
            ];
        }

        $filePath = storage_path('app/stock_refill_report.csv');

        SimpleExcelWriter::create($filePath)->addRows($rows);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
