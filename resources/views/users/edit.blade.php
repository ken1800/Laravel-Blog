@extends('layouts.app')

@section('content')
        <div class="card">

                <div class="card-header">MY profile</div>
                <div class="card-body">

                       @include('partial.error')

                <form action="{{route('users.update-profile')}}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group">
        <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                </div>

                    <div class="form-group">

                    <label for="about">About me</label>
                    <textarea name="about" id="about" class="form-control" cols="5" rows="5">{{$user->about}}</textarea>

                    </div>
                    <button  type="submit"class="btn btn-success">Update profile</button>
            </form>
                </div>
        </div>       
        </div>
    </div>
</div>
@endsection
