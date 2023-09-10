<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function validateProduct($request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'size' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'qty' => 'required',
            'user_id' => 'required',
        ]);
    }

    public function newProduct(Request $request)
    {

        $this->validateProduct($request);
        $valide = $request->validate([
            'img' => 'required',
        ]);

        $product = new Products();
        $product->product_name = $request->name;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->qty = $request->qty;
        $product->img = $this->imgSave($request);
        $product->user_id = $request->user_id;
        $product->save();

        return $this->getProducts();
    }

    //image save into folder
    public function imgSave($request)
    {
        $file = $request->file('img');
        $filename = uniqid().'-'.$file->getClientOriginalName();
        $path = 'public/images/'.$filename;
        Storage::put($path, file_get_contents($file));

        return $filename;
    }

    //image delete into folder
    public function deleteImg($filename)
    {
        $path = 'public/images/'.$filename;
        if (Storage::exists($path)) {
            Storage::delete($path);

            return true;
        } else {
            return false;
        }
    }

    public function getProducts()
    {
        $products = Products::orderBy('id', 'desc')->get();

        return view('products_list', compact('products'));
    }

    public function deleteProducts($id)
    {

        $result = Products::find($id);
        if ($this->deleteImg($result->img)) {
            $result->delete();

            return redirect('products_list')->with('info', 'Product Delete Success');
        } else {
            return redirect('products_list')->with('info', 'File does not exist');
        }

    }

    public function editProducts($id)
    {
        $product = Products::find($id);

        return view('edit_product', compact('product'));
    }

    public function imgisChangOrNot($request)
    {
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            if ($file->isValid()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function updateProduct(Request $request)
    {
        $this->validateProduct($request);
        $product = Products::find($request->product_id);
        $product->product_name = $request->name;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->qty = $request->qty;

        // check new img is select or not
        if ($this->imgisChangOrNot($request)) {
            $this->deleteImg($request->oldImgName); //old img file delete from folder
            $product->img = $this->imgSave($request); //img add to folder and return filename to db
        } else {
            $product->img = $request->oldImgName; //old name readd to db img
        }
        $product->user_id = $request->user_id;
        $product->save();

        return redirect('products_list')->with('info', 'Product Update Success');

    }
}
