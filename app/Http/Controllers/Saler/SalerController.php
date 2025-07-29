<?php

namespace App\Http\Controllers\Saler;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Cart;
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
        $request->validate([
            'bill_data' => 'required|array',
            'bill_data.*.product_id' => 'required|integer',
            'bill_data.*.product_name' => 'required|string',
            'bill_data.*.other_details' => 'nullable|string',
            'bill_data.*.purchase_rate' => 'required|numeric',
            'bill_data.*.quantity' => 'required|numeric',
            'bill_data.*.profit_percentage' => 'required|numeric',
            'bill_data.*.selling_price' => 'required|numeric',
            'total_amount' => 'required|numeric',
        ]);

        $totalAmount = collect($request->bill_data)->sum('total_amount');

        $bill = new Bill();
        $bill->bill_data = json_encode($request->bill_data);
        $bill->total_amount = $totalAmount;
        $bill->save();


        return redirect()->back()->with('success', 'Bill created successfully!');
    }


    public function generateBill(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'email' => 'nullable|email',
            'mobile_number' => 'nullable|string|max:15',
            'bill_id' => 'required|integer|exists:bills,id',
        ]);

        $bill = Bill::findOrFail($request->bill_id);

        // Decode bill_data
        $billItems = json_decode($bill->bill_data, true); // true = associative array

        foreach ($billItems as $item) {
            if (isset($item['id'], $item['quantity'])) {
                $product = Product::find($item['id']);

                if ($product) {
                    $newQty = max(0, $product->purchase_unit - (int) $item['quantity']);
                    $product->purchase_unit = $newQty;
                    $product->save();
                }
            }
        }


        // Move to sold table
        Solded::create([
            'bill_data' => $bill->bill_data,
            'total_amount' => $bill->total_amount,
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
        ]);

        // Delete the original bill
        $bill->delete();

        return redirect()->back()->with('success', 'Bill generated, stock updated, and moved to Solded successfully.');
    }

    public function emptyCart()
    {
        try {
            Cart::truncate();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function deleteCartProduct($id)
    {
        try {
            $cartItem = Cart::findOrFail($id);
            $cartItem->delete();

            return redirect()->back()->with('success', 'Deleted Successfully.');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting cart item.', 'error' => $e->getMessage()]);
        }
    }
}
