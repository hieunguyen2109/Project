@extends('backend.master.admin')
@section('main')

<form action="">
    <p>Bạn đã đăng nhập thành công vào trang quản trị!</p>
    <br>
    <p>Ấn vào đây để xem sản phẩm <button href="{{route('product.index')}}">Submit</button></p>
</form>

@stop