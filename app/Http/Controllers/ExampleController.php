<?php

namespace App\Http\Controllers;

use App\Models\Example;
use App\Models\Category;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $example = Example::with('category')->get();
    // dd($example);
    return view('example.index', compact('example'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('example.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // lek semisal ngecreate baru category di dalam example
        // $category = $request['category_id'];
        // Category::create(['name' => $category]);

        $validate = $request->validate(['name' => 'required','description'=>'required','image'=>'required','category_id'=>'required']);
        // dd($validate);
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
        $example->with('category')->get();
        $category = Category::all();
        return view('example.edit',compact('example','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Example $example)
    {
        $validate = $request->validate(['name'=>'required','description'=>'required','image'=>'image','category'=>'required']);
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
