<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $katalog = Katalog::all();
        return view('katalog.index', compact('katalog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $katalog = Katalog::all();
        return view('katalog.create', compact('katalog'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            'name'=>'required',
        ]);

        Katalog::create($validate);
        return redirect()->route('katalog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Katalog $katalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Katalog $katalog)
    {
        return view('katalog.edit', compact('katalog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Katalog $katalog)
    {
        $validate =$request->validate([
            'name'=>'required'
        ]);
        $katalog ->update($validate);
        return redirect()->route('katalog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Katalog $katalog)
    {
       $katalog->delete();
       return redirect()->route('katalog.index');
    }
}
