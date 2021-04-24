@extends('backend.master.admin')
@section('main')



<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf 
    <div class="row">
        <div class="col-md-9" style="padding-left: 270px" >
            <!-- name -->
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" id="" placeholder="Input Name...">
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <!-- description -->
            <div class="form-group">
                <label for="">Description</label>
        
                <textarea name="description" id="content" style="height:290px" class="form-control" placeholder="Input Description..." ></textarea>

                @error('description')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <!-- image list -->
            <div class="form-group">
                <label for="">Image List</label>
                <input type="text" name="image_list" class="form-control" id="" placeholder="Input Sale Price...">
                @error('image_list')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <!-- category -->
            <div class="form-group">
                <label for="">Category</label>
                
                <select name="category_id"  class="form-control">
                    <option value="">--SELECT ONE--</option>
                    @foreach($cats as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>

                @error('category_id')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <!-- price -->
            <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="price" class="form-control" id="" placeholder="Input Price...">
                @error('price')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <!-- sale price -->
            <div class="form-group">
                <label for="">Sale Price</label>
                <input type="text" name="sale_price" class="form-control" id="" placeholder="Input Sale Price...">
                @error('sale_price')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <!-- image -->
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="file_upload" class="form-control" id="" placeholder="Input Sale Price...">
                @error('image')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <!-- status -->
            <div class="form-group">
                <label for="">Status</label>
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
            <!-- prioty -->
            <div class="form-group">
                <label for="">Prioty</label>
                <input type="number" class="form-control" name="prioty">
                @error('prioty')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            
        </div>
    </div>

    
</form>



