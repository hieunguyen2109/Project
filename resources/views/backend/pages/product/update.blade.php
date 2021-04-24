@extends('backend.master.admin')
@section('main')



<form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row">
        <div class="col-md-9">
            <!-- name -->
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" value="$product->name" class="form-control" id="" placeholder="Input Name...">
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <!-- description -->
            <div class="form-group">
                <label for="">Description</label>
        
                <textarea name="description" value="$product->description" id="content" class="form-control" placeholder="Input Description..." ></textarea>

                @error('description')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <!-- image list -->
            <div class="form-group">
                <label for="">Image List</label>
                <input type="text" name="image_list" value="$product->image_list" class="form-control" id="" placeholder="Input Sale Price...">
                @error('image_list')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <!-- category -->
            <div class="form-group">
                <label for="">Category</label>
                
                <select name="category_id" value="$product->category_id" class="form-control">
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
                <input type="text" value="$product->price" name="price" class="form-control" id="" placeholder="Input Price...">
                @error('price')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <!-- sale price -->
            <div class="form-group">
                <label for="">Sale Price</label>
                <input type="text" value="$product->sale_price" name="sale_price" class="form-control" id="" placeholder="Input Sale Price...">
                @error('sale_price')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <!-- image -->
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" value="$product->file_upload" name="file_upload" class="form-control" id="" placeholder="Input Sale Price...">
                @error('image')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <!-- status -->
            <div class="form-group">
                <label for="">Status</label>
                <div class="radio">
                <label >
                    <input type="radio" value="$product->status" name="status" value="1">
                    Public
                </label>

                <label >
                    <input type="radio" value="$product->status" name="status" value="0">
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
            
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@stop
@section('css')
<!-- summernote -->
<link rel="stylesheet" href="{{url('ad')}}/plugins/summernote/summernote-bs4.min.css">
@stop
@section('js')
<!-- summernote -->
<script src="{{url('ad')}}/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('#content').summernote({
        height:235,
        placeholder:"Product description..."
    });
  })
</script>
@stop