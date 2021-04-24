<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Http\Requests\Account\StoreRequest;
use App\Http\Requests\Account\UpdateRequest;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account = Account::orderBy('created_at','DESC')->get();
        return view('backend.pages.account.index',compact('account'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request,Account $account)
    {
        // dd($request->all()); 
        // dd($account);
        if(Account::create($request->all())){
            return redirect()->route('account.index')->with('success','Thêm mới khách hàng thành công');
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
    public function edit(Account $account)
    {
        return view('backend.pages.account.update',compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,Account $account)
    {
        if($account->orders->count() < 0){
            return redirect()->route('account.index')->with('error','Cập nhật thất bại');
        }
        else{
            $account->update($request->only('name','email','phone','password','role','address','status'));
            return redirect()->route('account.index')->with('success','Cập nhật thành công');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        // dd('sd');
        if($account->orders->count() < 0){
            if($account->blogs->count() < 0){
                return redirect()->route('account.index')->with('erroe, Xóa thất bại');
            }
        }
        else{
            $account->delete();
            return redirect()->route('account.index')->with('success','Xóa thành công');
        }
    }
}
