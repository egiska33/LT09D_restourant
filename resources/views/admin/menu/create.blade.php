@extends('layouts.admin')

@section('content')
    <div class="col-md-4">
        @if ($errors->count() > 0)
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="post" action="{{route('menu.store')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="Menu">Menu</label>
                <input type="text" class="form-control"  name="title" aria-describedby="Menu" placeholder="Enter Menu">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>

    </div>
@endsection