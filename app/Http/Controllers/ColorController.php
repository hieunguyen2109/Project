<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Order;
use App\Http\Requests\Color\StoreRequest;
use App\Http\Requests\Color\UpdateRequest;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $color = Color::orderBy('created_at','DESC')->search()->paginate(15);
        return view('backend.pages.color.index',compact('color'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        return view('backend.pages.color.create');
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
    public function edit(Color $color)
    {
        return view('backend.pages.color.update',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,Color $color)
    {
        if($color->pro_details->count() > 0){
            return redirect()->route('color.index')->with('error','Cập nhật thất bại');
        }
        else{
            $color->update($request->only('name','status'));
            return redirect()->route('color.index')->with('success','Cập nhật thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        if($color->pro_details->count() > 0){
            return redirect()->route('color.index')->with('error','Xóa thất bại');
        }
        else{
            $color->delete();
            return redirect()->route('color.index')->with('success','Xóa thành công');
        }
    }
}
