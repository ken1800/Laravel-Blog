@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-end mb-3">
        <a href="{{route('posts.create')}}" class="btn btn-success float-right">Add Post</a>
    </div>


<div class="card card-default">
    <div class=" card-header pt-3">
        Posts
    </div>
    <div class="card-body">
        @if($posts->count()>0)
        <table class="table">
            <thead>
        <th>Image</th>
            <th>Title</th>
            <th>Category</th>
            <th></th>
            <th></th>
            </thead>
            <tbody>

               @foreach($posts as $post)
                   <tr>
                       <td>
                           <img src="{{ asset('storage/'.$post->image)}}" width="60" height="60">

                       </td>
                       <td>
                           {{$post->title}}
                       </td>
                       <td>
                           <a href="{{route('categories.edit',$post->category->id)}}">
                               {{$post->category->name}}
                           </a>

                       </td>

                       @if(!$post->trashed())
                           <td>
                               <a href="{{route('posts.edit',$post->id)}}" class="btn btn-info btn-sm">Edit</a>
                           </td>

                        @else
                           <td>
                               <form action="{{route('restore-post',$post->id)}}" METHOD="POST">
                                 @csrf
                                   @method('PUT')
                                   <button type="submit" class="btn btn-info btn-sm">Restore</button>
                               </form>
                           </td>
                       @endif



                       <td>
                           <form action="/posts/{{$post->id}}/delete" method="DELETE" >
                               @csrf

                               <button  type="submit" class="btn btn-danger btn-sm">{{$post->trashed() ? 'Delete': 'Trush'}}</button>

                           </form>
                       </td>



                   </tr>


               @endforeach


            </tbody>


        </table>
        @else
            <h3>No posts at the moment</h3>
        @endif
    </div>

</div>

    @endsection
