@extends('layouts.admin')

@section('content')
    <div class="col-md-10">
        @if ($errors->count() > 0)
            <ul>
                @foreach($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="post" action="{{route('dish.store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="Dish">Dish</label>
                <input type="text" class="form-control"  name="title" aria-describedby="Menu" placeholder="Enter Dish">
            </div>
            <div class="form-group">
                <label for="Photo">Photo</label>
                <input type="file" class="form-control"  name="photo" aria-describedby="Photo" placeholder="Add Photo">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="Price">Price</label>
                <input type="text" class="form-control"  name="price" aria-describedby="Price" placeholder="Enter Pricce">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Menu</label>
                <select name="menu_id" class="form-control" id="exampleFormControlSelect1">
                    @foreach($menus as $menu)
                    <option  value="{{$menu->id}}">{{$menu->title}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

    @endsection