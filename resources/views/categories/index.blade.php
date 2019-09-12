@extends('layouts.app')


@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{route('categories.create')}}" class="btn btn-success float-right">Add</a>
    </div>
<div class="card-header pt-3">
    Categories
</div>

    <div class="card card-body">
        @if($categories->count() > 0)
<table class="table">
<thead>
<th>Name</th>
<th>Posts Counts</th>
<th></th>
<th>
</th>
</thead>
    <tbody>
@foreach($categories as $category)
    <tr>
        <td>

{{$category->name}}

        </td>
        <td>
            {{$category->posts->count()}}
        </td>
        <td>
            <a href="{{route('categories.edit',$category->id)}}" class="btn btn-info btn-sm">Edit</a>
            <a href="" onclick="handleDelete({{$category->id}})" class="btn ml-2 btn-danger btn-sm">Delete</a>


        </td>

    </tr>

    @endforeach
    </tbody>

</table>
        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="DeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="" action="" method="post" id="deleteCategoryForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="DeleteModalLabel">Delete Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">No Go Back</button>
                            <button type="submit" class="btn btn-danger ">Yes Delete</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

            @else
        <h3>No category at the moment</h3>
            @endif
    </div>

    @endsection

@section('scripts')
<script>

    $(document).ready(function handleDelete(id){

        var form =getElementById('deleteCategoryForm')
        form.action='/categories/'.id

        console.log('deleting',form)

        $('#deletemodal').modal('show')




    });

</script>

    @endsection
