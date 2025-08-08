<?php

namespace App\Http\Controllers\Saler;

use App\Http\Controllers\Controller;
use App\Mail\ProductPurchaseMail;
use App\Mail\SalerRegisteredMail;
use App\Models\Bill;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\Solded;
use App\Models\SoldItems;
use App\Models\SubCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Str;


class SalerController extends Controller
{
    // Saler Login View---------------------------->
    public function loginView()
    {
        return view('saler-login');
    }

    // Saler Register View---------------------------->
    public function registerView()
    {
        return view('saler-register');
    }

    // Saler Waiting Page View---------------------------->
    public function waitingPageView()
    {
        return view('waiting-page');
    }

    // Saler Register Function---------------------------->
    public function salerRegister(Request $request)
    {
        try {

            $validated = $request->validate([
                'name'     => 'required|string|max:255',
                'email'    => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:6',
            ]);


            $user = User::create([
                'name'     => $validated['name'],
                'email'    => $validated['email'],
                'password' => bcrypt($validated['password']),
                'type'     => 'saler',
            ]);


            Mail::to($user->email)->send(new SalerRegisteredMail($user));

            return redirect()
                ->route('saler.waiting-page')
                ->with('success', 'Saler registered successfully.');
        } catch (\Throwable $e) {

            Log::error('Saler registration error: ' . $e->getMessage());


            return back()
                ->with('error', 'Unable to process your request at the moment. Please try again later.')
                ->withInput();
        }
    }

    // Saler Login Function---------------------------->
    public function salerLogin(Request $request)
    {

        $request->validate([
            'email'    => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ], [
            'email.required'    => 'Please enter your email address.',
            'email.email'       => 'The email format is invalid.',
            'email.max'         => 'Email cannot exceed 255 characters.',
            'password.required' => 'Please enter your password.',
            'password.min'      => 'Password must be at least 6 characters.',
        ]);

        $credentials = $request->only('email', 'password');


        if (Auth::guard('salers')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('saler.saler-dashboard')
                ->with('success', 'Welcome back!');
        }


        return back()->withErrors([
            'email' => 'Invalid credentials. Please try again.',
        ])->withInput($request->only('email'));
    }


    // Saler Logout Function---------------------------->
    public function salerLogout()
    {
        Auth::guard('salers')->logout();
        Session::flush();
        return redirect()->route('saler.saler-login');
    }

    // Saler Dashboard View---------------------------->
    public function salerDashboardView()
    {
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

        return view('saler.saler-dashboard', [
            'todaysSales' => $todaysSales,
            'todaysProductQty' => $todaysProductQty,
            'yesterdaysSales' => $yesterdaysSales,
            'yesterdaysProductQty' => $yesterdaysProductQty,
            'yesterdaySalesDate' => $yesterdaySalesDate,
            'yesterdaySellingProductDate' => $yesterdaySellingProductDate,
            'stockRefillCount' => $stockRefillCount,
            'thisMonthSales' => $thisMonthSales,
            'lastMonthSales' => $lastMonthSales,
            'lastMonthName' => $lastMonth->format('F'),
            'latestSales' => $latestSales,
        ]);
    }

    // PDF Download Function---------------------------->
    public function pdfDownload($id)
    {
        $sale = SoldItems::findOrFail($id);

        $productsArray = is_string($sale->products)
            ? json_decode($sale->products, true)
            : $sale->products;

        $productDetails = [];

        foreach ($productsArray as $item) {
            $product = Product::find($item['product_id'] ?? null);
            if ($product) {
                $productDetails[] = [
                    'name' => $product->product_name,
                    'field_values' => is_string($product->field_values)
                        ? json_decode($product->field_values, true)
                        : $product->field_values,
                    'rate' => $item['customer_product_rate'] ?? null,
                    'quantity' => $item['customer_purchase_quantity'] ?? null,
                    'profit' => $item['customer_profit_percentage'] ?? null,
                    'selling_price' => $item['customer_product_selling_price'] ?? null,
                ];
            }
        }

        // Share data with the view
        $data = [
            'sale' => $sale,
            'productDetails' => $productDetails
        ];

        $pdf = PDF::loadView('invoice_pdf', $data);

        return $pdf->download("invoice_{$sale->id}.pdf");
    }

    public function allProductsView(Request $request)
    {

        $products = Product::with(['subCategory.mainCategory'])->get();


        return view('saler.saler-all-products', compact('products'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_ids' => 'required|array',
            'product_ids.*' => 'exists:products,id',
        ]);

        Cart::create([
            'product_ids' => $request->product_ids,
        ]);

        return redirect()->route('saler.saler-cart')->with('success', 'Products added to cart successfully!');
    }

    public function deleteCartItem($product_id)
    {
        $latestCart = Cart::latest()->first();

        if (!$latestCart) {
            return back()->with('error', 'No cart found.');
        }

        if ($product_id === 'all') {
            $latestCart->delete();
            return back()->with('success', 'All items removed from cart.');
        }

        $productIds = $latestCart->product_ids;

        // Remove the specific product
        $updatedIds = array_filter($productIds, fn($id) => $id != $product_id);

        if (empty($updatedIds)) {
            $latestCart->delete();
        } else {
            $latestCart->product_ids = array_values($updatedIds);
            $latestCart->save();
        }

        return back()->with('success', 'Item removed from cart.');
    }

    public function cartView()
    {
        $cartItems = Cart::all();
        $latestCheckout = Checkout::latest()->first();

        $decodedProducts = collect();
        $productModels = collect();

        if ($latestCheckout && is_array($latestCheckout->products)) {
            $decodedProducts = collect($latestCheckout->products);

            // Fetch related product models
            $productIds = $decodedProducts->pluck('product_id')->toArray();
            $productModels = Product::whereIn('id', $productIds)->get()->keyBy('id');
        }

        return view('saler.saler-cart', compact('cartItems', 'latestCheckout', 'decodedProducts', 'productModels'));
    }

    public function checkOut(Request $request)
    {
        $validated = $request->validate([
            'products' => 'required|array',
            'products.*.product_id' => 'required|integer|exists:products,id',
            'products.*.customer_product_rate' => 'required|numeric',
            'products.*.customer_purchase_quantity' => 'required|numeric',
            'products.*.customer_profit_percentage' => 'required|numeric',
            'products.*.customer_product_selling_price' => 'required|numeric',
        ]);

        $totalAmount = collect($validated['products'])->sum('customer_product_selling_price');

        $checkout = Checkout::create([
            'products' => $validated['products'],
            'customer_overall_total_amount' => $totalAmount,
        ]);

        // For Stock Update
        foreach ($validated['products'] as $item) {
            $product = Product::find($item['product_id']);

            if ($product) {

                $product->purchase_unit -= $item['customer_purchase_quantity'];

                // Avoid negative stock
                if ($product->purchase_unit < 0) {
                    $product->purchase_unit = 0;
                }

                $product->save();
            }
        }

        return back()->with('success', 'Checkouts successfully!');
    }

    public function deleteCheckOutData()
    {
        // Get the latest Checkout entry
        $latestCheckout = Checkout::latest()->first();

        if (!$latestCheckout) {
            return back()->with('error', 'No checkout data found to delete.');
        }

        // Decode the products JSON into array (if it's stored as JSON)
        $products = is_array($latestCheckout->products)
            ? $latestCheckout->products
            : json_decode($latestCheckout->products, true);

        // Restore stock
        foreach ($products as $item) {
            $product = Product::find($item['product_id']);

            if ($product) {
                $product->purchase_unit += $item['customer_purchase_quantity'];
                $product->save();
            }
        }

        // Delete the checkout record
        $latestCheckout->delete();

        return back()->with('success', 'Latest checkout deleted and stock restored.');
    }



    public function generateBill(Request $request)
    {
        $products = $request->input('products');
        $totalAmount = $request->input('customer_overall_total_amount');
        $soldDate = $request->input('sold_date');
        $customerName = $request->input('customer_name');
        $customerEmail = $request->input('custome_email');
        $customerMobile = $request->input('custome_mobile');

        // Manually handle sold_date if not provided
        try {
            $soldDateFormatted = $soldDate ? Carbon::parse($soldDate)->format('Y-m-d') : Carbon::now()->format('Y-m-d');
        } catch (\Exception $e) {
            $soldDateFormatted = Carbon::now()->format('Y-m-d');
        }

        SoldItems::create([
            'products' => is_array($products) ? $products : [],
            'customer_overall_total_amount' => is_numeric($totalAmount) ? $totalAmount : 0,
            'sold_date' => $soldDateFormatted,
            'customer_name' => $customerName ?? 'N/A',
            'custome_email' => $customerEmail,
            'custome_mobile' => $customerMobile,
        ]);

        // Delete latest checkout if exists
        $latestCheckout = Checkout::latest()->first();
        if ($latestCheckout) {
            $latestCheckout->delete();
        }

        $productData = [];

        foreach ($products as $item) {
            if (!isset($item['product_id'])) {
                continue;
            }
            $productModel = Product::find($item['product_id']);
            $productData[] = [
                'product_id' => $item['product_id'],
                'product_name' => $productModel->product_name ?? 'N/A',
                'customer_purchase_quantity' => $item['customer_purchase_quantity'],
                'customer_product_rate' => $item['customer_product_rate'],
                'customer_product_selling_price' => $item['customer_product_selling_price'],
            ];
        }

        $billDetails = [
            'customer_name' => $customerName,
            'customer_email' => $customerEmail,
            'customer_mobile' => $customerMobile,
            'sold_date' => $soldDateFormatted,
            'customer_overall_total_amount' => $totalAmount,
            'products' => $productData,
        ];


        $pdf = PDF::loadView('pdf.bill', ['billDetails' => $billDetails]);


        $pdfPath = 'bills/bill_' . now()->timestamp . '.pdf';
        // Storage::put($pdfPath, $pdf->output());

        Mail::to($customerEmail)->send(new ProductPurchaseMail($billDetails, $pdf->output()));


        return redirect()->back()->with('success', 'Bill generated and saved.');
    }

    // Product Filter View ----------------------------->
    public function productFilterView()
    {
        $mainCategories = MainCategory::all();
        return view('saler.saler-product-filter', compact('mainCategories'));
    }

    public function getSubcategories($mainCategoryId)
    {
        return SubCategory::where('main_category_id', $mainCategoryId)->get();
    }
    public function getProducts(Request $request)
    {
        $products = Product::with([
            'subCategory.mainCategory'
        ])->where('sub_category_id', $request->sub_category_id)->get();

        return $products->map(function ($product) {
            $product->field_values = is_string($product->field_values)
                ? json_decode($product->field_values, true)
                : $product->field_values;

            $product->unit_type = $product->unit_type ?? '';

            $product->main_category = $product->subCategory->mainCategory ?? null;
            $product->sub_category = $product->subCategory ?? null;

            return $product;
        });
    }

    // Sales Report View ----------------------------->
    public function salesReport(Request $request)
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

        return view('saler.saler-sales-report', compact('salesReport', 'from', 'to'));
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


    // Saler Profile View---------------------------->
    public function salerProfileView()
    {
        $user = Auth::guard('salers')->user();
        return view('saler.saler-profile', compact('user'));
    }

    // Saler Manager Profile Edit---------------------------->
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'nullable|string|max:20',
        ]);

        $user = Auth::guard('salers')->user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    // Saler Manager Profile Password Update---------------------------->
    public function updateProfilePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::guard('salers')->user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully!');
    }

    // Stock Refill View ---------------------------->
    public function stockRefillView()
    {
        $products = Product::where('purchase_unit', '<', 4)->get();
        return view('saler.saler-stock-refill', compact('products'));
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
