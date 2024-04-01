<?php

namespace App\Http\Controllers;

use App\Country;
use App\Person;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::paginate(20);
        return view('pages.countries.index', ['countries' => $countries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $people = Person::all();
        return view('pages.countries.create' , ['people' => $people]);
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
            'name' => 'required'
        ]);

        $country = new Country();
        $country->name = $request->name;
        $country->save();

        if ($request->person_id){
            foreach ($request->person_id as $person_id){
                $person = Person::find($person_id);
                $person->country_id = $country->id;
                $person->save();
            }
        }

        return redirect('countries')->with('status', 'Item created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Country $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return view('pages.countries.show', ['country' => $country]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Country $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        $people = Person::all();
        return view('pages.countries.edit', ['country' => $country, 'people' => $people]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Country $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $country->name = $request->name;

        $selectedPeopleIds = $request->person_id ?? [];

        $currentPeople = $country->people()->pluck('id')->toArray();

        foreach ($currentPeople as $personId) {
            if (!in_array($personId, $selectedPeopleIds)) {
                $country->people()->where('id', $personId)->delete();
            }
        }

        foreach ($selectedPeopleIds as $personId) {
            if (!in_array($personId, $currentPeople)) {
                $person = Person::find($personId);
                if ($person) {
                    $country->people()->save($person);
                }
            }
        }

        $country->save();

        return redirect('countries')->with('status', 'Item edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Country $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect('countries')->with('status', 'Item deleted successfully!');
    }
}
