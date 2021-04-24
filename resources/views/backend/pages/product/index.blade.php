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
            <th>Price / Sale</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>created Date</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($product as $model)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$model->name}}</td>
            <td>{{$model->price}}/{{$model->sale_price}}</td>
            <!-- <td>{{$model->price_list}}</td> -->
            <!-- <td>{{$model->description}}</td> -->
            <td>{{$model->cat->name}}</td>
            
            <td>
                @if($model->status == 0)
                <span class="badge badge-danger">Private</span>
                @else
                <span class="badge badge-success">Public</span>
                @endif
            </td>
            <td><img src="{{url('uploads')}}/{{$model->image}}" width="80px"></td>
            <!-- <td>{{$model->image_list}}</td> -->
            <td>{{$model->created_at->format('m-d-Y')}}</td>
            <td class="text-right">
            
            
                <a href="{{route('product.edit',$model->id)}}" class="btn btn-sm btn-success">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{route('product.destroy',$model->id)}}" class="btn btn-sm btn-danger btndelete">
                    <i class="fas fa-trash"></i>
                </a>
                

                <button type="button" class="btn btn-secondary clickModal" href="#modal-id" data-pro="{{$model->id}}" data-toggle="modal" data-target="#modal-secondary">
                  Details
                </button>

                <div class="modal fade" id="modal-secondary">
                    <div class="modal-dialog">
                        <div class="modal-content bg-secondary">
                              
                    <div class="modal-footer justify-content-between">
                        <h1 id="name"></h1>
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-outline-light">Save changes</button>
                    </div>
                </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
           
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
    {{$product->appends(request()->all())->links()}}
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

$(document).ready(function(){
$('.clickModal').click(function(){
    
    var id = $(this).data('pro');
    console.log(id);
    $.ajax({
        type:"GET",
        url:`{{route("modal")}}`,
        data: {id : id},
        success:function(msg){
            $('#name').html(msg.data.name);
            $('#modal').modal('show');
            console.log(msg.data);
        }
    });

});


});

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>




@stop