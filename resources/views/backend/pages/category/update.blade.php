@extends('backend.master.admin')
@section('main')



<form action="{{route('category.update',$category->id)}}" method="POST" role="form">
    @csrf @method('PUT')
    <input type="hidden" name="id" value="{{$category->id}}">
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" value="{{$category->name}}" name="name" class="form-control" id="" placeholder="Input field">
        @error('name')
        <small class="help-block">{{$message}}</small>
        @enderror
    </div>

    <div class="form-group">
        <div class="radio">
            <label >
                <input type="radio" name="status" value="1">
                Public 
            </label>

            <label >
                <input type="radio" name="status" value="0">
                Private
            </label>
        </div>
    </div>

    <div class="form-group">
        <label for="">Prioty</label>
        <input type="number" value="{{$category->prioty}}" class="form-control" name="prioty">
        @error('prioty')
        <small class="help-block">{{$message}}</small>
        @enderror
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@stop