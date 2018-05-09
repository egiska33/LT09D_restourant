<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Mail\ReservationAccept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Reservation;

class ReservationController extends Controller
{
    public function create()
    {
        return view('reservation.create');
    }

    public function store(StoreReservationRequest $request)
    {
        $reservation =  new Reservation;
        $reservation->person_count=$request->person_count;
        $reservation->date=$request->date;
        $reservation->time=$request->time;
        $reservation->user_id=$request->user()->id;

        $reservation->save();


        Mail::to($request->user())->send(new ReservationAccept($reservation));
        return redirect(route('home'))->with(['message'=>'Your reservation accept']);
    }
}
