@extends('layouts.admin')
@section('content')
    <div class="col-md-4">
        @if ($errors->count() > 0)
            <ul>
                @foreach($errors->all() as $error)
                    <li class="alert alert-danger>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="post" action="{{route('menu.update', $menu)}}">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="Menu">Menu</label>
                <input type="text" class="form-control" value="{{$menu->title}}" name="title" aria-describedby="Menu" placeholder="Enter Menu">
            </div>

            <button type="submit" class="btn btn-primary">Edit</button>
        </form>

    </div>
    @endsection