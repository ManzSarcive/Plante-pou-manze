<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;

use App\Models\Panier;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use App\Enums\PanierStatus;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function stepOne(Request $request)
    {
        $reservation = $request->session()->get('reservation');
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addweek();
        return view ('reservations.step-one', compact('reservation', 'min_date', 'max_date'));
    }

    public function storeStepOne(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'tel_number' => ['required'],
            'res_date' => ['required', 'date', new DateBetween, new TimeBetween],
           
        ]);
        
        if(empty($request->session()->get('reservation'))){
            $reservation = new Reservation();
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);

        } else {
            $reservation = $request->session()->get('reservation');
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);

        }

        return to_route('reservations.step.two');
    }

    public function stepTwo(Request $request)
    {
        $reservation = $request->session()->get('reservation');
        $res_panier_ids = Reservation::orderBy('res_date')->get()->filter(function($value) use($reservation){
                return $value->res_date->format('Y-m-d') == $reservation->res_date->format('Y-m-d');
        })->pluck('panier_id');
        $paniers = Panier::where('status', PanierStatus::Available)->get();
        return view ('reservations.step-two', compact('reservation', 'paniers'));
    }

    public function storeStepTwo(Request $request)
    {
        $validated = $request->validate([
            'panier_id' => ['required']
        ]);
        $reservation = $request->session()->get('reservation');
        $reservation->fill($validated);
        $reservation->save();
        $request->session()->forget('reservation');

        return to_route('thankyou');

    }

}
