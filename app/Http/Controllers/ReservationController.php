<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use DateTime;
use App\Models\Reservation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $store = Store::find($request->store_id);

        return view('reservations.create',compact('store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'reservation_people' => 'required|integer'  ,
            'date' => 'required|date' ,
            'time' => 'required|integer' 
        ]);
        $date_time = new DateTime($request->input('date').' '. $request->input('time').':00:00');
        
        if (new DateTime() > $date_time) {
            return back()->withInput($request->input())->withErrors(['message' => '現在より過去の予約日時は指定できません。']);
        }
        $store = Store::find($request->store_id);
        if($store->opening_time > $date_time->format('H:i:s') || $store->closing_time < $date_time->format('H:i:s')){
            return back()->withInput($request->input())->withErrors(['message' => '営業時間外です。']);
        }

        foreach(explode(',',$store->holiday) as $holiday){
            if(array_search($holiday,Store::DAY_OF_WEEK) == $date_time->format('w')){
                return back()->withInput($request->input())->withErrors(['message' => '定休日です。']);
            }
        }
        $reservation = new Reservation();
        $reservation->user_id = Auth::user()->id;
        $reservation->reservation_people = $request->input('reservation_people');
        $reservation->reservation_date = $request->input('date').' '.$request->input('time').':00:00';
        $reservation->store_id = $request->input('store_id');
        $reservation->save();

        return redirect()->route('stores.show', $request->store_id)->with('message', '予約が完了しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $Reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $Reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $Reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $Reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return to_route('mypage.reservations');
    }
}
