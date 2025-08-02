<?php

namespace App\Http\Controllers\Saler;

use App\Http\Controllers\Controller;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
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
            'type'     => 'saler',
        ]);

        return redirect()->route('waiting-page')->with('success', 'Saler registered successfully.');
    }

    // Saler Login Function---------------------------->
    public function salerLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('salers')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('saler-dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    // Saler Logout Function---------------------------->
    public function salerLogout()
    {
        Auth::guard('salers')->logout();
        Session::flush();
        return redirect()->route('saler-login');
    }

    // Saler Dashboard View---------------------------->
    public function salerDashboardView()
    {
        return view('saler.saler-dashboard');
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

        return redirect()->route('saler-cart')->with('success', 'Products added to cart successfully!');
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
            $soldDateFormatted = Carbon::now()->format('Y-m-d'); // fallback if parsing fails
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

        return redirect()->back()->with('success', 'Bill generated and saved.');
    }


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
        return Product::where('sub_category_id', $request->sub_category_id)->get();
    }

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
}
