@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class=" card-header pt-3">
         {{isset($post) ? 'Edit Post' : 'Create Post'}}

        </div>
        <div class="card-body">
                @include('partial.error')
            <form method="POST" enctype="multipart/form-data" action="{{isset($post) ? route('posts.update',$post->id) :route('posts.store')}}">
                @csrf

                @if(isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="ttl">Title</label>
                    <input type="text" id="ttl" class="form-control" name="ttl" value="{{isset($post) ? $post->title : ''}}">
                </div>

                <div class="form-group">

                    <label for="content">
                        Description
                    </label>
                    <textarea id="Descrip"  name="Descrip" cols="5" rows="5" class="form-control">{{isset($post) ? $post->description : ''}}</textarea>

                </div>
                <div class="form-group">
                    <label for="content">
                        Content
                    </label>
                    <input id="contents" type="hidden" name="contents" value="{{isset($post) ? $post-> contents: ''}}">
                    <trix-editor input="contents"></trix-editor>
                </div>
                <div class="form-group">
                    <label for="pba">Published At</label>
                    <input type="text" id="pba" class="form-control" name="pba" value="{{isset($post) ? $post->published_at : ''}}">
                </div>
                @if(isset($post))
                <div class="form-group">
                    <img src="{{ asset('storage/'.$post->image)}}" alt="" style="width: 100px">

                </div>
                @endif
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="img" class="form-control" name="img">
                </div>

                <div class="form-group">
                    <label for="category">category</label>
                    <select name="category" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                @if(isset($post))
                                    @if($category->id==$post->category_id)
                                                selected
                                    @endif
                                    @endif >
                                    {{$category->name}}
                            </option>
                        @endforeach
                    </select>

                </div>
                @if($tags->count()>0)
                <div class="form-group">
                        <label for="image">Tags</label>
                        <select name="tags[]" id="tags" class="form-control" multiple>
                                @foreach ($tags as $tag)
                        
                                <option value="{{$tag->id}}"
                                   @if(isset($post))
                                        @if($post->hasTags($tag->id))
                                        selected
                                    @endif
                                @endif
                                >
                                {{$tag->name}}
                                </option>
                            @endforeach
        
                        </select>     
                    </div>
                    @endif

                <button  type="submit" class=" btn btn-success">{{isset($post) ? 'Update Post' : 'Create Post'}}</button>

            </form>

        </div>
    </div>



@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script type="text/javascript">
    flatpickr('#pba',{
enableTime: true,
enableSeconds: true

    });
</script>

@endsection

@section('css')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


@endsection
