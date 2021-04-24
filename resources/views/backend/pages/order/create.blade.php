@extends('backend.master.admin')
@section('main')



<form action="{{route('order.store')}}" method="POST" >
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
            <!-- <div class="form-group">
                <label for="">Description</label>
        
                <textarea name="description" id="content" style="height:290px" class="form-control" placeholder="Input Description..." ></textarea>

                @error('description')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div> -->
            <!-- image list -->
            <div class="form-group">
                <label for="">Gmail</label>
                <input type="text" name="email" class="form-control" id="" placeholder="Input Sale Price...">
                @error('email')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Phone</label>
                <input type="text" name="phone" class="form-control" id="" placeholder="Input Price...">
                @error('phone')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <!-- sale price -->
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control" id="" placeholder="Input Sale Price...">
                @error('address')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <!-- category -->
            
            <!-- price -->
            

            <div class="form-group">
                <label for="">Note</label>
                <input type="text" name="note" class="form-control" id="" placeholder="Input Sale Price...">
                @error('note')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <!-- image -->
           
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

            <div class="form-group">
                <label for="">Account</label>
                
                <select name="account_id"  class="form-control">
                    <option value="">--SELECT ONE--</option>
                    @foreach($acct as $accts)
                    <option value="{{$accts->id}}">{{$accts->name}}</option>
                    @endforeach
                </select>

                @error('account_id')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
            
        </div>
    </div>

    
</form>



