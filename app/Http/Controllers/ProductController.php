<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    function index()
    {

        $products = Product::get();
        // dd($products);
        return view('product.index', ['products' => $products]);
    }
    function show($id)
    {
        $product = Product::find($id);
        return view('product.show', compact('product'));
    }
    function destroy($id)
    {
        $product = Product::find($id);
        Storage::delete('images/' . $product->product_picture);
        $product->delete();
        return redirect()->route('product.index');
    }
    function update($id)
    {
        $product = Product::find($id);
        return view('product.update', compact('product'));
    }

    // function edit($id,Request $request)
    // {

    //     $product = Product::find($id);
    //    $imagename=$product->product_picture;

    //     if ($request->hasFile('product_picture')) {

    //         $image =$request->file('product_picture');
    //         $imagename=time().".".$image->getClientOriginalExtension();
    //         $image->move(public_path('images'),$imagename);
    //         $mimeType = $image->getClientMimeType();
    //     }
    //     $product->update([
    //         'name' => $request->name,
    //         'price' => $request->price,
    //         'availability' => $request->availability,
    //         'product_picture'=>$request->product_picture,
    //         'category_id' => $request->category_id,
    //         'admin_id' => $request->admin_id,
    //         // 'photo' => $imagename,
    //     ]);
    //     $product->save();
    //     return redirect()->route('product.index');
    // }
    function edit($id, Request $request)
{

    $product = Product::find($id);
    $imagename = $product->product_picture;

    if ($request->hasFile('product_picture')) {

        $image = $request->file('product_picture');
        $imagename = time() . "." . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imagename);
        $mimeType = $image->getClientMimeType();
    }

    $fields = $request->only('name', 'price', 'availability',  $imagename, 'category_id', 'admin_id');
    $product->update($fields);
    $product->save();
    return redirect()->route('product.index');
}


//     function store(Request $request)
//     {
//         $request->validate([
//             'product_name' => 'required',
//             'product_price' => 'required|numeric',
//             'product_availability' => 'required|in:available,unavailable',
//             'product_picture'=>'required',
//             'category_id' => 'required|exists:categories,id',
//             'admin_id' => 'required|numeric',

//         ]);
//         $image = $request->file('photo');
//         $imageName=$request->photo;
//     if ($image) {
//     $imageName = time() . '.' . $image->getClientOriginalExtension();
//     $image->move(public_path('images'), $imageName);
// }
//     Product::create([
//         'name' => $request->product_name,
//         'price' => $request->product_price,
//         'availability' => $request->product_availability,
//         'product_picture'=>$request->product_picture,
//         'category_id' => $request->category_id,
//         'admin_id' => $request->admin_id,


//     ]);


//     return redirect()->route('product.index');

// }
public function store(Request $request)
    {
        $request->validate([
            // dd($request->all(),),
            'name' => 'required',
            'price' => 'required|numeric',
            'availability' => 'required|in:available,unavailable',
            'product_picture'=>'required',
            'category_id' => 'required|exists:categories,id',
            'admin_id' => 'required|numeric',

        ]);
        $imageName = time() . '.' . $request->product_picture->extension();


        $request->product_picture->move(public_path('images'), $imageName);
        // dd($request->except(['_token', '_method']));
        $product = Product::create($request->except(['_token', '_method']));
        $product->update([
            'product_picture' => $imageName,
        ]);
        // dd($product);
        return redirect()->route('product.index');
    }



    public function user_products($id)
    {
        // $user = User::find($id);
        // $product = Product::find($pid);
        $products = Product::get();
        $user = User::find($id);
        return view('product.user_products', ['products' => $products], ['id' => $user->id]);
    }




    public function product_search(Request $request, $id)
    {

        $query = $request->input('query');
        $user = User::find($id);
        if ($query) {

            $products = Product::where('name', 'like', "%$query%")->get();
        } else {
            // If no query is provided, retrieve all products
            $products = Product::all();
        }

        return view('product.user_products', ['products' => $products], ['id' => $user->id]);
    }

}