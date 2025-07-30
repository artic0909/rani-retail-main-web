<?php

namespace App\Http\Controllers\Saler;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Product;
use App\Models\Solded;
use App\Models\User;
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

        return back()->with('success', 'Products added to cart successfully!');
    }

    public function cartView()
    {
        $cartItems = Cart::all();
        return view('saler.saler-cart', compact('cartItems'));
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


}
