<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warga = Warga::all();
        return view('home' ,compact('warga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request -> all();
        $warga = Warga::create($input);
        if($request->hasFile('photo')){
            $request->file('photo')->move('photowarga/', $request->file('photo')->getClientOriginalName());
            $warga->photo = $request->file('photo')->getClientOriginalName();
            $warga->save();
        }

        return redirect('/warga');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $warga = Warga::find($id);
        return view('detail', compact('warga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function edit(Warga $warga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warga $warga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warga = Warga::find($id);
       $warga -> delete();
       return back();
    }
}
