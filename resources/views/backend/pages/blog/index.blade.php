@extends('backend.master.admin')
@section('main')


<form action="" class="form-inline" role="form">
    <legend>Form title</legend>

    <div class="form-group">
        <input type="text" name="search" class="form-control" id="" placeholder="Search By Name.....">
    </div>

    <button type="submit" class="btn btn-primary">
        <i class="fas fa-search"></i>
    </button>
</form>



<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Image</th>
            <th>Description</th>
            <th>Sumary</th>
            <th>Status</th>
            <th>Account</th>
            <th>created Date</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($blog as $model)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$model->name}}</td>
            <td><img src="{{url('uploads')}}/{{$model->image}}" width="80px"></td>
            <td>{{$model->description}}</td>
            <td>{{$model->sumary}}</td>
            <td>
                @if($model->status == 0)
                <span class="badge badge-danger">Private</span>
                @else
                <span class="badge badge-success">Public</span>
                @endif
            </td>
            <td>{{$model->accounts->name}}</td>
            <td>{{$model->created_at->format('m-d-Y')}}</td>
            <td class="text-right">
                <a href="{{route('blog.edit',$model->id)}}" class="btn btn-sm btn-success">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{route('blog.destroy',$model->id)}}" class="btn btn-sm btn-danger btndelete">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<form method="POST" action="" id="form-delete">
    @csrf @method('DELETE')
</form>

<hr>




@stop

