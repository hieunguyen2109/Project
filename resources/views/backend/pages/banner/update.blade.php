@extends('backend.master.admin')
@section('main')



<form action="{{route('banner.update',$banner->id)}}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
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
            
        </div>

        <div class="col-md-3">
        <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="file_upload" class="form-control" id="" placeholder="Input Image...">
                @error('image')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Link</label>
                <input type="text" name="link" class="form-control" id="" placeholder="Input link...">
                @error('link')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>

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



