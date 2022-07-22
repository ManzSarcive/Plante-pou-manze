<?php

namespace App\Http\Controllers\Admin;

use App\Models\Panier;
use App\Enums\PanierStatus;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paniers = Panier::where('status', PanierStatus::Available)->get();

        return view('admin.reservation.create', compact('paniers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationStoreRequest $request)
    {


        //     $panier = Panier::findOrFail($request->panier_id);
        //     if($request->panier_id > $panier->panier_id){
        //         return back()->with('warning', 'Choisissez un autre panier');
        //     }


        //    $request_date = Carbon::parse($request->res_date);
        //    foreach($panier->reservation as $res){
        //         if($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')){
        //             return back()->with('warning', 'Ce panier est réservé pour cette date');
        //         }
        //    }

        $panierRequest = $request->panier_id;
        $result = Reservation::query()
            ->where('panier_id', '=', $panierRequest)
            ->get();
        if (count($result) != 0) {
            return back()->with('danger', 'déjà reservé');
        }
        Reservation::create($request->validated());

        return to_route('admin.reservations.index')->with('success', 'Réservation créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
