@extends('backend.master.admin')
@section('main')



<form action="{{route('account.store')}}" method="POST" >
    @csrf 
    <div class="row" style="padding-left: 260px">
        <div class="col-md-9">
            <!-- name -->
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" id="" placeholder="Input Name...">
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="">email</label>
        
                <textarea name="email" id="content" class="form-control" placeholder="Input Rmail..." ></textarea>

                @error('email')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Phone</label>
                <input type="text" name="phone" class="form-control" id="" placeholder="Input Phone...">
                @error('phone')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-3">

            <div class="form-group">
                <label for="">Password</label>
                <input type="text" name="password" class="form-control" id="" placeholder="Input Password...">
                @error('password')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>


            <div class="form-group">
                <label for="">Role</label>
                <input type="text" name="role" class="form-control" id="" placeholder="Input Role...">
                @error('role')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control" id="" placeholder="Input Address...">
                @error('address')
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

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>



