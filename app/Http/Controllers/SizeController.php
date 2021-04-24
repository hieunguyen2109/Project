<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
use App\Http\Requests\Size\StoreRequest;
use App\Http\Requests\Size\UpdateRequest;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $size = Size::orderBy('created_at','DESC')->search()->paginate(15);
        return view('backend.pages.size.index',compact('size'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if(Size::create($request->all())){
            return redirect()->route('size.index')->with('success','Thêm mới khách hàng thành công');
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
    public function edit(Size $size)
    {
        return view('backend.pages.size.update',compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,Size $size)
    {
        if($size->pro_details->count() > 0){
            return redirect()->route('size.index')->with('error','Cập nhật thất bại');
        }
        else{
            $size->update($request->only('name','status'));
            return redirect()->route('size.index')->with('success','Cập nhật thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        if($size->pro_details->count() > 0){
            return redirect()->route('size.index')->with('error','Xóa thất bại');
        }
        else{
            $size->delete();
            return redirect()->route('size.index')->with('success','Xóa thành công');
        }
    }
}
