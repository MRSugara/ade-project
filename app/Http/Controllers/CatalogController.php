<?php

namespace App\Http\Controllers;

use App\Models\catalog;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalog = Catalog::all();
        return view('catalog.index', compact('catalog'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);
        catalog ::create($validate);
        return redirect('catalog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(catalog $catalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(catalog $catalog)
    {
        return view('catalog.index', compact('catalog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, catalog $catalog)
    {
        $validate =  $request->validate([
            'name' => 'required'
        ]);
        $catalog -> update($validate);
        return redirect()->route('catalog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(catalog $catalog)
    {
        //
    }
}
