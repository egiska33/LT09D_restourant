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
        <form method="post" action="{{route('dish.update', $dish)}}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="Dish">Dish</label>
                <input type="text" class="form-control"  name="title" value="{{$dish->title}}" aria-describedby="Menu" placeholder="Enter Dish">
            </div>
            <div class="form-group">
                <label for="Photo">Photo</label>
                <input type="file" class="form-control"  name="photo" aria-describedby="Menu" placeholder="Add photo">
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <textarea name="description" rows="7" cols="100">{{$dish->description}}</textarea> </div>
            <div class="form-group">
                <label for="Price">Price</label>
                <input type="text" class="form-control"  name="price" value="{{$dish->price}}" aria-describedby="Price" placeholder="Enter Price">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Menu Select</label>
                <select class="form-control" name="menu_id" id="exampleFormControlSelect1">
                    @foreach($menus as $menu)
                        <option value="{{$menu->id}}">{{$menu->title}}</option>

                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Edit</button>
        </form>

    </div>
@endsection