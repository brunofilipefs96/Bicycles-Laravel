<?php

namespace App\Http\Controllers;

use App\Bicycle;
use App\Person;
use Illuminate\Http\Request;

class BicycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bicycles = Bicycle::paginate(20);
        return view('pages.bicycles.index', ['bicycles' => $bicycles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $people = Person::all();
        return view('pages.bicycles.create', ['people' => $people]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'person_id' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required',
            'price' => 'required'
        ]);
        $bicycle = new Person();
        $bicycle->person_id = $request->person_id;
        $bicycle->brand = $request->brand;
        $bicycle->model = $request->model;
        $bicycle->color = $request->color;
        $bicycle->price = $request->price;
        $bicycle->save();

        return redirect('bicycles')->with('status', 'Item created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Bicycle $bicycle
     * @return \Illuminate\Http\Response
     */
    public function show(Bicycle $bicycle)
    {
        return view('pages.bicycles.show', ['bicycle' => $bicycle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Bicycle $bicycle
     * @return \Illuminate\Http\Response
     */
    public function edit(Bicycle $bicycle)
    {
        $people = Person::all();
        return view('pages.bicycles.edit', ['bicycle' => $bicycle, 'people' => $people]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Bicycle $bicycle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bicycle $bicycle)
    {
        $bicycle->update($request->all());

        $bicycle->save();

        return redirect('bicycles')->with('status', 'Item edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Bicycle $bicycle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bicycle $bicycle)
    {

        $bicycle->delete();

        return redirect('bicycles')->with('status', 'Item deleted successfully!');
    }
}
