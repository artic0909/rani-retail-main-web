<?php

namespace App\Http\Controllers\Saler;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Cart;
use App\Models\Product;
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
        $cartProductIds = Cart::pluck('product_id')->toArray();

        return view('saler.saler-all-products', compact('products', 'cartProductIds'));
    }

    public function addToCart(Request $request)
    {

        $productId = $request->product_id;

        $product = Product::findOrFail($productId);

        $existingCart = Cart::where('product_id', $productId)->first();
        if ($existingCart) {
            return redirect()->back()->with('warning', 'Product already in cart.');
        }


        $purchaseRate = $product->purchase_rate + $product->transport_cost;

        // Create cart entry
        Cart::create([
            'product_id' => $productId,
            'quantity' => 1,
            'purchase_rate' => $purchaseRate,
            'selling_price' => 0,
            'profit_parcentage' => 0,
        ]);

        return redirect()->back()->with('success', 'Product added to cart.');
    }


    public function cartView()
    {
        $cartProducts = Cart::with('product')->get();
        $lastBill = Bill::latest()->first();

        return view('saler.saler-cart', compact('cartProducts', 'lastBill'));
    }


    public function addToBill(Request $request)
    {

        $cart = $request->input('cart');

        if (!$cart || !is_array($cart)) {
            return redirect()->back()->with('error', 'No items to save.');
        }

        $bill = new Bill();
        $bill->bill_data = json_encode($cart);
        $bill->save();

        return redirect()->back()->with('success', 'Bill saved successfully.');
    }
}
