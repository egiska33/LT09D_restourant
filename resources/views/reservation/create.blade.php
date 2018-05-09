@extends('layouts.app')

@section('content')


    <div class="col-md-4 col-md-offset-4">
        @if ($errors->count() > 0)
            <ul>
                @foreach($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="post" action="{{route('reservation.store')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="person_count">Person Count</label>
                <input type="number" class="form-control"  name="person_count"  placeholder="Enter Person Count">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control"  name="date"  >
            </div>
            <div class="form-group">
                <label for="date">Time</label>
                <input type="time" class="form-control"  name="time"  >
            </div>

            <button type="submit" class="btn btn-primary">Reservate</button>
        </form>

    </div>

    @endsection