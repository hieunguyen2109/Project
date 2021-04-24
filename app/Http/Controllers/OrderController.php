<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Account;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::orderBy('created_at','DESC')->search()->paginate(15);
        return view('backend.pages.order.index',compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acct = Account::orderBy('name','ASC')->select('id','name')->get();
        return view('backend.pages.order.create', compact('acct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if(Order::create($request->all())){
            return redirect()->route('order.index')->with('success','Thêm mới khách hàng thành công');
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
    public function edit(Order $order)
    {
        $acct = Account::orderBy('name','ASC')->select('id','name')->get();
        return view('backend.pages.order.update',compact('acct','order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Order $order)
    {
        if($order->accounts->count() > 0){
            return redirect()->route('order.index')->with('error','Cập nhật thất bại');
        }
        else{
            $order->update($request->only('name','email','phone','address','note','status','account_id '));
            return redirect()->route('order.index')->with('success','Cập nhật thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        if($order->accounts->count() < 0){
            return redirect()->route('order.index')->with('error','Xóa thất bại');
        }
        else{
            $order->delete();
            return redirect()->route('order.index')->with('success','Xóa thành công');
        }
    }
}
