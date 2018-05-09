@extends('layouts.admin')

@section('content')

    <div class="col-md-10">
            <div class="row">
                <ul class="thumbnails">
                    @forelse($dishes as $dish)

                    <div class="col-md-3">
                        <div class="thumbnail">
                            <img src="/storage/image/{{$dish->photo}}" class="img-responsive" />
                            <div class="caption">
                                <h3>{{$dish->title}}</h3>
                                <p align="center"><a href="{{route('dish.edit', $dish)}}" class="btn btn-primary btn-block">Update</a>
                                </p>
                                <p align="center"><form action="{{ route('dish.destroy', $dish) }}" method="POST"
                                                        style="display: inline"
                                                        onsubmit="return confirm('Are you sure?');">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger btn-block">Delete</button>
                                </form>
                                </p>
                            </div>
                        </div>
                    </div>
                    @empty
                       <div class="col-md-12 text-center">
                           <h2>No entries found</h2>
                       </div>
                     @endforelse
                </ul>
            </div>
        <div class="col-md-12">
            <a href="{{route('admin')}}" class="btn btn-default pull-left">Back</a>
            <a href="{{route('dish.create')}}" class="btn btn-primary pull-right">Create</a>

        </div>
    </div>

    @endsection