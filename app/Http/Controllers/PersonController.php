<?php

namespace App\Http\Controllers;

use App\Bicycle;
use App\Country;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Person::paginate(20);
        return view('pages.people.index', ['people' => $people]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $bicycles = Bicycle::all();
        return view('pages.people.create', ['countries' => $countries, 'bicycles' => $bicycles]);
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
            'country_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $person = new Person();

        $person->country_id = $request->country_id;
        $person->first_name = $request->first_name;
        $person->last_name = $request->last_name;
        $person->birth_date = $request->birth_date;
        $person->save();

        if ($request->bicycle_id){
            foreach($request->bicycle_id as $bikeId) {
                $bike = Bicycle::find($bikeId);
                if($bike) {
                    $person->bicycles()->save($bike);
                }
            }
        }

        //If we have an image file, we store it, and move it in the database
        if ($request->file('image')) {
            // Get Image File
            $imagePath = $request->file('image');
            // Define Image Name
            $imageName = $person->id . '_' . time() . '_' . $imagePath->getClientOriginalName();
            // Save Image on Storage
            $path = $request->file('image')->storeAs('images/people/' . $person->id, $imageName, 'public');
            //Save Image Path
            $person->image = $path;
        }
        $person->save();
        return redirect('people')->with('status','Item created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Person $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        return view('pages.people.show', ['person' => $person]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Person $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        $countries = Country::all();
        $bicycles = Bicycle::all();
        return view('pages.people.edit', ['person' => $person, 'countries' => $countries, 'bicycles' => $bicycles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Person $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        $this->validate($request, [
            'country_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Atualizar os detalhes da pessoa
        $person->country_id = $request->country_id;
        $person->first_name = $request->first_name;
        $person->last_name = $request->last_name;
        $person->birth_date = $request->birth_date;

        // Salvar as alterações da pessoa
        $person->save();

        // Obter todas as bicicletas selecionadas
        $selectedBicycleIds = $request->bicycle_id ?? [];

        // Obter todas as bicicletas associadas à pessoa
        $currentBicycles = $person->bicycles()->pluck('id')->toArray();

        // Iterar sobre as bicicletas atuais e removê-las se não estiverem na lista de bicicletas selecionadas
        foreach ($currentBicycles as $bikeId) {
            if (!in_array($bikeId, $selectedBicycleIds)) {
                $person->bicycles()->where('id', $bikeId)->delete();
            }
        }

        // Iterar sobre as bicicletas selecionadas e adicioná-las se ainda não estiverem associadas à pessoa
        foreach ($selectedBicycleIds as $bikeId) {
            if (!in_array($bikeId, $currentBicycles)) {
                $bike = Bicycle::find($bikeId);
                if ($bike) {
                    $person->bicycles()->save($bike);
                }
            }
        }

        // Lidar com o upload da imagem, se fornecido
        if ($request->file('image')) {
            // Excluir o diretório de imagem anterior
            Storage::deleteDirectory('public/images/people/' . $person->id);

            // Salvar a nova imagem
            $imagePath = $request->file('image');
            $imageName = $person->id . '_' . time() . '_' . $imagePath->getClientOriginalName();
            $path = $request->file('image')->storeAs('images/people/' . $person->id, $imageName, 'public');
            $person->image = $path;
            $person->save();
        }

        return redirect('people')->with('status', 'Item edited successfully!');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Person $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        Storage::deleteDirectory('public/images/people/' . $person->id);
        //Storage::delete('public/' . $player->image);
        $person->delete();
        return redirect('people')->with('status', 'Item deleted successfully!');
    }
}
