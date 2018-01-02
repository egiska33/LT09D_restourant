@extends('layouts.admin')

@section('content')

    <div class="col-md-8">
        @if(session('message'))
            <div class="alert alert-info">{{session('message')}}</div>
        @endif
        <ul class="list-group">
            @foreach($menus as $menu)

                <li class="list-group-item">
                    {{ $menu->title }}
                    <form action="{{ route('menu.destroy', $menu) }}" method="POST"
                          style="display: inline"
                          onsubmit="return confirm('Are you sure?');">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        <button class="btn btn-danger pull-right">Delete</button>
                    </form>
                    <a href="{{route('menu.edit', $menu)}}" class="btn btn-primary pull-right">Edit</a>
                </li>

            @endforeach

        </ul>


    </div>
    <div class="col-md-8">
        <a href="{{route('admin')}}" class="btn btn-default pull-left">Back</a>
        <a href="{{route('menu.create')}}" class="btn btn-primary pull-right">Create</a>

    </div>

@endsection

