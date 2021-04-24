@extends('backend.master.admin')
@section('main')



<form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
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

            <div class="form-group">
                <label for="">Sumary</label>
                <input type="text" class="form-control" name="sumary">
                @error('sumary')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <!-- category -->
            <div class="form-group">
                <label for="">Account</label>
                
                <select name="account_id"  class="form-control">
                    <option value="">--SELECT ONE--</option>
                    @foreach($acc as $ac)
                    <option value="{{$ac->id}}">{{$ac->name}}</option>
                    @endforeach
                </select>

                @error('account_id')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <!-- price -->
           
            <!-- sale price -->
           
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
            
            <button type="submit" class="btn btn-primary">Submit</button>
            
        </div>
    </div>

    
</form>



