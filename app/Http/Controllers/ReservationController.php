<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = null;
        $tables = Table::StatusAvailable()->with(
            ['Reservations' => function ($q) {
                $q->ReservationDay();
            }])->get();
        if (request('search') != null) {
            $search = Reservation::orderBy('scheduleDate','DESC')->where('customer_name', 'Like', '%' . request('search') . '%')
                ->orwhere('customer_phone', 'Like', '%' . request('search') . '%')
                ->Reservation_scheduleDate( request('scheduleDate'))
                ->paginate(PAGINATION_COUNT);
        }
       // return  $search;
        return view('reservations.index', compact('tables','search'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReservationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationRequest $request)
    {
        try {
            if($request->endTime == null){
                $time = Carbon::parse($request->startTime);
                $request['endTime'] = $time->addMinutes(29)->format('H:i');
            }
            $checkBooking = Reservation::ReservationDay()
                ->whereBetween('startTime', array( $request->startTime , $request->endTime))
                ->orwhereBetween('endTime', array( $request->startTime , $request->endTime))
                ->Table($request->table_id)
                ->first();
            if($checkBooking !=null){
                return redirect()->route('Reservations.index')
                    ->with(['error' => 'يوجد معاد فى هذه الطاوله']);
            }
            Reservation::create($request->all())  ;
            return redirect()->route('Reservations.index')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('Reservations.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function create()
    {
        //
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservationRequest  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
        $reservation = Reservation::find($id);
        $reservation->status = 'Completed';
        $reservation->save();
        return redirect()->back()->with(['success' => 'تم التعديل بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }



}
