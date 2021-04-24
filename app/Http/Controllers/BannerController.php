<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Requests\Banner\StoreRequest;
use App\Http\Requests\Banner\UpdateRequest;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::orderBy('created_at','DESC')->get();
        return view("backend.pages.banner.index",compact("banner"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.pages.banner.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('file_upload')){
            // dd($request->hasFile('file_upload'));
            $file = $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'banner.'.$ext;
            $file->move(public_path('uploads'), $file_name);
        }
        $request->merge(['image' => $file_name]);
        if(Banner::create($request->all())){
            return redirect()->route('banner.index')->with('success','Thêm mới banner thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner,Request $request)
    {
        return view('backend.pages.banner.create',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,Banner $banner)
    {
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'banner.'.$ext;
            // dd($file_name);
            $file->move(public_path('uploads'), $file_name);
        }
        $request->merge(['image' => $file_name]);
        if($banner->count() < 0){
            return redirect()->route('banner.index')->with('error','Cập nhật thất bại');
        }
        else{
            $product->update($request->only('name','image','link','description','status','prioty'));
            return redirect()->route('banner.index')->with('success','Cập nhật thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('banner.index')->with('Yes','xoá thành công');
    }
}
