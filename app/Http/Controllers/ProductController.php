<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Requests\Product\StoreRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('created_at','DESC')->search()->paginate(15);
        return view('backend.pages.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::orderBy('name','ASC')->select('id','name')->get();
        return view('backend.pages.product.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('file_upload')){
           
            $file = $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'product.'.$ext;
            // dd($file_name);
            $file->move(public_path('uploads'), $file_name);
        }
        $request->merge(['image' => $file_name]);
        // dd($request->all());
        if(Product::create($request->all())){
            return redirect()->route('product.index')->with('success','Thêm mới sản phẩm thành công');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function modal(Request $request)
    {
        $id = $request->query('id');
        $product = Product::find($id);
        return response()->json(["data" => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $cats = Category::orderBy('name','ASC')->select('id','name')->get();
        return view('backend.pages.product.update',compact('cats','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,Product $product)
    {
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'product.'.$ext;
            // dd($file_name);
            $file->move(public_path('uploads'), $file_name);
        }
        $request->merge(['image' => $file_name]);
        if($product->details->count() > 0){
            return redirect()->route('product.index')->with('error','Cập nhật thất bại');
        }
        else{
            $product->update($request->only('name','image','image_list','price','sale_price','description','status','category_id'));
            return redirect()->route('product.index')->with('success','Cập nhật thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->cat->count() < 0){
            return redirect()->route('product.index')->with('error','Xóa thất bại');
        }
        else{
            $product->delete();
            return redirect()->route('product.index')->with('success','Xóa thành công');
        }
    }
}
