<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Blog;
use App\Http\Requests\Blog\StoreRequest;
use App\Http\Requests\Blog\UpdateRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::orderBy('created_at','DESC')->get();
        return view('backend.pages.blog.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acc = Account::orderBy('name','ASC')->select('id','name')->get();
        return view('backend.pages.blog.create', compact('acc'));
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
            $file_name = time().'-'.'blog.'.$ext;
            // dd($file_name);
            $file->move(public_path('uploads'), $file_name);
        }
        $request->merge(['image' => $file_name]);
        // dd($request->all());
        if(Blog::create($request->all())){
            return redirect()->route('blog.index')->with('success','Thêm mới sản phẩm thành công');
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
       
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog,Account $account)
    {
        $acc = Account::orderBy('name','ASC')->select('id','name')->get();
    
        return view('backend.pages.blog.update', compact('acc','blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Blog $blog)
    {
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'blog.'.$ext;
            // dd($file_name);
            $file->move(public_path('uploads'), $file_name);
        }
        $request->merge(['image' => $file_name]);
        if($blog->account->count() < 0){
            return redirect()->route('blog.index')->with('error','Cập nhật thất bại');
        }
        else{
            $blog->update($request->only('name','image','description','sumary','status','account_id'));
            return redirect()->route('blog.index')->with('success','Cập nhật thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if($blog->account->count() < 0){
            return redirect()->route('blog.index')->with('error','Xóa thất bại');
        }
        else{
            $blog->delete();
            return redirect()->route('blog.index')->with('success','Xóa thành công');
        }
    }
}
