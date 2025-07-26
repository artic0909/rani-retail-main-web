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
        $mainCategories = MainCategory::with('subCategories.products')
            ->inRandomOrder()
            ->paginate(6);

        return view('stocker.stock-dashboard', compact('mainCategories'));
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

    // Sales Report View---------------------------->
    public function salesReportView()
    {
        return view('stocker.stock-sales-report');
    }
}
