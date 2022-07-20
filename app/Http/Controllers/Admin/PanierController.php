<?php

namespace App\Http\Controllers\Admin;

use App\Models\Panier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PanierStoreRequest;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paniers = Panier::all();
        return view('admin.paniers.index', compact('paniers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paniers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PanierStoreRequest $request)
    {
        $image = $request->file('image')->store('public/paniers');

        Panier::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price,
        ]);
        return to_route('admin.paniers.index');
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
    public function edit(Panier $panier)
    {

        return view('admin.paniers.edit', compact('panier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Panier $panier)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',

        ]);
        $image = $panier->image;
        if ($request->hasFile('image')) {
            Storage::delete($panier->image);
            $image = $request->file('image')->store('public/paniers');
        }
        $panier->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price,
        ]);
        return to_route('admin.paniers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Panier $panier)
    {
        Storage::delete($panier->image);
        $panier->delete();

        return to_route('admin.paniers.index');

    }
}
