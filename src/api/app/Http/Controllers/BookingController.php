<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Helpers\RequestHelper;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;

class BookingController extends Controller
{
    use ApiResponser;
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = RequestHelper::replaceIfExits(
            $request,
            [
                'id' => RequestHelper::sanitizeString($request->input('id')),
                'num' => RequestHelper::sanitizeNumber($request->input('num')),
                'dateBooking' => RequestHelper::sanitizeString($request->input('dateBooking')),
            ]
        );
        $rules = [
            'id' => 'integer|exists:activities,id',
            'num' => 'required|integer',
            'dateBooking' => 'date',
        ];
        $this->validate($request, $rules);
        
        $actividad= Activity::findOrFail($request->input('id'));

        $data['activity_id']=$request->input('id');
        $data['amount_people']=$request->input('num');
        $data['pr']=$actividad->pu;
        $data['date_activity']=$request->input('dateBooking');

        $booking = Booking::create($data);

        return $this->successResponse($booking->load('activity'), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
