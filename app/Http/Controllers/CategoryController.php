<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $products = $category->products;
        return view('category.show_products', compact('category', 'products'));
    }

    public function user_show_products(Category $category, $id)
    {
        $products =Category::find($category)->first()->products;
        // dd($products);
        $user = User::find($id);
        return view('category.user_show_products', compact('category', 'products'), ['id' => $user->id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }




    public function edit(Request $request, $id)
    {
        $category = Category::find($id);

        $category->update($request->except('_method', '_token'));

        return redirect()->route('product.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->except('_method', '_token'));
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        // Storage::delete('images/' . $category->product_picture);
        $category->delete();
        return redirect()->route('category.index');
    }


    public function user_categories($id)
    {
        $categories = Category::get();
        $user = User::find($id);
        return view('category.user_categories', ['categories' => $categories], ['id' => $user->id]);
    }
}