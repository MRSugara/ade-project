<?php

namespace App\Http\Controllers;

use App\Models\Example;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $example = Example::all();
    return view('example.index', compact('example'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('example.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validate = $request->validate(['name' => 'required','description'=>'required','image'=>'required']);
    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('images'), $imageName);
    $validate['image'] = $imageName;
    // dd($validate);
    Example::create($validate);
    return  redirect()->route('example.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Example $example)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Example $example)
    {
        return view('example.edit',compact('example'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Example $example)
    {
        $validate = $request->validate(['name'=>'required','description'=>'required','image'=>'image']);
        if($validate['image'] == null){
            $validate['image'] = $example->image;
        } else {
            // delete old image
            $oldImage = public_path('images/'.$example->image);
            unlink($oldImage);
            $ImageName = time() . '.' . $validate['image']->extension();
            $request->image->move(public_path('images'), $ImageName);
            $validate['image'] = $ImageName;
        }

        $example->update($validate);
        return redirect()->route('example.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Example $example)
    {
        //delete image
        $oldImage = public_path('images/'.$example->image);
        unlink($oldImage);
        $example->delete();
        return redirect()->route('example.index');
    }
}
