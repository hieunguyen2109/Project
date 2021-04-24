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
            <th>Total Product</th>
            <th>Status</th>
            <th>created Date</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($category as $cat)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$cat->name}}</td>
            <td>{{$cat->products ? $cat->products->count() :0}}</td>
            <td>
                @if($cat->status == 0)
                <span class="badge badge-danger">Private</span>
                @else
                <span class="badge badge-success">Public</span>
                @endif
            </td>
            <td>{{$cat->created_at->format('m-d-Y')}}</td>
            <td class="text-right">
                <a href="{{route('category.edit',$cat->id)}}" class="btn btn-sm btn-success">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{route('category.destroy',$cat->id)}}" class="btn btn-sm btn-danger btndelete">
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
<div class="">
    {{$category->appends(request()->all())->links()}}
</div>


@stop

@section('js')

<script>
    $('.btndelete').click(function(ev){
        ev.preventDefault();  
        var _href = $(this).attr('href');
        alert(_href); 
        $('form#form-delete').attr('action',_href);
        $('form#form-delete').submit();
        if(confirm('Bạn có chắc không ?')){
            $('form#form-delete').submit();
        }

    })
</script>

@stop