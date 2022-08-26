<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index()
    {
        $products = Products::all();
        $categories = Categories::all();

        return view('welcome', [
            'products' => $products,
            'categories' => $categories,

        ]);
    }

    public function dashboard()
    {
        $totalproducts = Products::count();
        $totalcategories = Categories::count();
        $totalusers = User::count();
        return view('dashboard', [

            'totalproducts'=>$totalproducts,
            'totalcategories'=>$totalcategories,
            'totalusers'=>$totalusers,

        ]);
    }
    /* ---------- Products --------------- */
    public function products()
    {
        $categories = Categories::all();
        return view('products.create', [
            'categories' => $categories,
        ]);
    }
    public function products_details($id)
    {
        $products = Products::where('id', $id)->first();
        return view('details', [
            'products' => $products,
            ]);
    }

    public function store_products(Request $request)
    {
        $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imageName);
        Products::create([
            'name' => $request->name,
            'price' => $request->price,
            'category'=>$request->category,
           'description' => $request->description,
           'image'=>$imageName,

        ]);
        return redirect(route('products.index'));
    }
    public function list_products()
    {
        $products = Products::all();

        return view('products.index', [
            'products' => $products,
        ]);
    }
    public function products_edit($id)
    {
        $products = Products::where('id', $id)->first();
        return view('products.edit', [
            'products' => $products,
            ]);
    }

    public function products_save(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255'.$id,
            'price' => 'required',
            'description' => 'required'
        ]);
        Products::where('id', $id)->update([
            'name'=>$request->name,
            'price'=> $request->price,
            'description'=>$request->description
        ]);
        return redirect(route('products.index'));
    }

    public function products_delete($id)
    {

        Products::destroy($id);
        return redirect(route('products.index'))->with('message', 'Products has been deleted');
    }
    /* ---------- Categories --------------- */

    public function categories()
    {

        return view('categories.create');
    }

    public function store_categories(Request $request)
    {
        $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('category', $imageName);
        Categories::create([
            'name' => $request->name,
            'image'=>$imageName,

        ]);
        return redirect(route('categories.index'));
    }
    public function list_categories()
    {
        $categories = Categories::all();

        return view('categories.index', [
            'categories' => $categories,
        ]);
    }
    public function categories_edit($id)
    {
        $categories = Categories::where('id', $id)->first();
        return view('categories.edit', [
            'categories' => $categories,
            ]);
    }

    public function categories_save(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255'.$id,
        ]);
        Categories::where('id', $id)->update(['name'=>$request->name]);
        return redirect(route('categories.index'));
    }

    public function categories_delete($id)
    {
        Categories::destroy($id);
        return redirect(route('categories.index'))->with('message', 'Catogory has been deleted');
    }
    /* ---------- Users --------------- */
    public function users()
    {
        return view('users.create');
    }

    public function store_users(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
           'password' => $request->password,

        ]);
        return redirect(route('users.index'));
    }
    public function list_users()
    {
        $users = User::all();

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function users_edit($id)
    {
        $users = User::where('id', $id)->first();
        return view('users.edit', [
            'users' => $users,
            ]);
    }

    public function users_save(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255'.$id,
            'email' => 'required',

        ]);
        User::where('id', $id)->update([
            'name'=>$request->name,
            'email'=> $request->email,

        ]);
        return redirect(route('users.index'));
    }

    public function users_delete($id)
    {
        User::destroy($id);
        return redirect(route('users.index'))->with('message', 'User has been deleted');
    }

    public function cart()
    {

        return view('cart');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Products::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}


