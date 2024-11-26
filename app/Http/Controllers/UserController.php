<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\LineItem;

class UserController extends Controller
{

    public function loadAddUser()
    {
        if (Auth::check()) {
            return view('add_product');
        } else {
            return redirect()->route('view.login');
        }
    }

    public function addUser(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required',
            'details' => 'required',
            'price' => 'required|integer|max:9999999'
        ]);
        Product::create($data);
        return redirect()->route('product.view');
    }

    public function showProducts()
    {

        if (Auth::check()) {
            $collection = Product::all();
            return view('products', compact('collection'));
        } else {
            return redirect()->route('view.login');
        }
    }

    public function viewProduct($id)
    {
        if (Auth::check()) {
            $product = Product::find($id);
            if (!$product) {
                return redirect()->back()->with('error', 'Product not found.');
            }
            return view('edit', compact('product'));
        } else {
            return redirect()->route('view.login');
        }
    }

    public function editProduct(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required',
            'details' => 'required',
            'price' => 'required|integer|max:9999999'
        ]);

        $product = Product::where('id', $request->id)->update($data);

        return redirect()->route('product.view')->with('success', 'User Updated Successfully');
    }

    public function deleteProduct($id)
    {
        $delete = Product::findOrFail($id);
        $delete->delete();
        return redirect()->route('product.view');
    }

    //////////////////// Authentication ////////////////////


    public function getLogin()
    {
        if (Auth::check()) {
            return redirect()->route('product.view');
        } else {

            return view('login');
        }
    }

    public function login(Request $request)
    {
        $user = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);
        // Check if the "remember me" checkbox was selected

        if (Auth::attempt($user)) {

            return redirect()->route('product.view');
        } else {
            return redirect()->route('view.login')
                ->withErrors([
                    'email' => 'The provided credentials do not match our system.',
                ]);
        }
    }

    public function viewRegister()
    {
        if (Auth::check()) {
            return redirect()->route('product.view');
        } else {
            return view('register');
        }
    }


    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'mobile' => 'required | max:11',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
            'password_confirm' => 'same:password'

        ]);

        User::create($data);
        return redirect()->route('view.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('view.login');
    }

    public function checkout()
    {
        // $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $products = Product::all();
        $lineItems = [];
        $totalPrice = 0;
        foreach ($products as $product) {
            $totalPrice += $product->price;
            $lineItems[] =
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $product->product_name,
                            'description' => $product->details
                        ],
                        'unit_amount' => $product->price * 100,
                    ],
                    'quantity' => 1,
                ];
        }

        // $session = $stripe->checkout->sessions->create([
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success', [], true),
            'cancel_url' => route('checkout.cancel', [], true),
        ]);

        $order = new Order();
        $order->status = 'unpaid';
        $order->total_price = $totalPrice;
        $order->session_id = $session->id;
        $order->save();

        return redirect($session->url);
    }

    public function success() {}

    public function cancel() {}
}
