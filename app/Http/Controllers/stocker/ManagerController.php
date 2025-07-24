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

    public function stockDashboardView()
    {
        return view('stocker.stock-dashboard');
    }


    // Stock Manager Register Function---------------------------->
    public function stockManagerRegister(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
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
        // Get subcategory with fields
        $subCategory = SubCategory::with('descriptiveFields')->where('slug', $subcategorySlug)->firstOrFail();

        // Validate static fields
        $request->validate([
            'product_name'     => 'required|string|max:255',
            'purchase_details' => 'nullable|string',
            'purchase_unit'    => 'nullable|string|max:255',
            'unit_type'        => 'nullable|string|max:255',
            'purchase_rate'    => 'nullable|numeric',
            'transport_cost'   => 'nullable|numeric',
        ]);

        // Prepare dynamic fields (based on the subcategory's descriptive fields)
        $dynamicFieldValues = [];

        foreach ($subCategory->descriptiveFields as $field) {
            $fieldInput = $request->input('dynamic_' . $field->id); // dynamic_1, dynamic_2, etc.
            $dynamicFieldValues[$field->field_name] = $fieldInput;
        }

        // Store product
        Product::create([
            'sub_category_id'  => $subCategory->id,
            'product_name'     => $request->input('product_name'),
            'purchase_details' => $request->input('purchase_details'),
            'purchase_unit'    => $request->input('purchase_unit'),
            'unit_type'        => $request->input('unit_type'),
            'purchase_rate'    => $request->input('purchase_rate'),
            'transport_cost'   => $request->input('transport_cost'),
            'field_values'     => $dynamicFieldValues, // casted as JSON
        ]);

        return redirect()->back()->with('success', 'Product added successfully.');
    }
}
