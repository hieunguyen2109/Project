@extends('backend.master.admin')
@section('main')



<form action="{{route('color.store')}}" method="POST" >
    @csrf 
    <div class="row">
        <div class="col-md-9">
            <!-- name -->
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" id="" placeholder="Input Name...">
                @error('name')
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