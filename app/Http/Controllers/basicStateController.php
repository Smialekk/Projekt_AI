<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\basicState;
use DB;

class basicStateController extends Controller
{
    public function index()
    {
        $basicState = basicState::all();


        return view('basicState.basicState', compact('basicState'));
    }

    public function create()
    {
        return view('basicState.create');
    }


    public function edit($id)
    {
        $basicState = BasicState::findOrFail($id);

        return view('basicState.edit', compact('basicState'));
    }

    public function store(Request $request)
    {
        // $basicState = new BasicState;

        // $basicState->name = $request->input('name');
        // $basicState->description = $request->input('description');
        // $basicState->image_path = $request->input('image_path');
        // $basicState->longdesc = $request->input('longdesc');

        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Dodaj walidację dla przesyłanego obrazu
            'longdesc' => 'nullable',
        ]);

        $basicState = new BasicState();
        $basicState->name = $validatedData['name'];
        $basicState->description = $validatedData['description'];
        $basicState->longdesc = $validatedData['longdesc'];

        // Obsłuż przesyłane zdjęcie
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('img/basicStateIMG', 'public'); // Zapisz obraz w katalogu "public/images"
            $basicState->image_path = 'storage/' . $imagePath;
        }

        $basicState->save();

        return redirect()->route('basicState')->with('success', 'Nowy stan surowy został dodany.');
    }

    public function update(Request $request, $id)
    {
        $basicState = BasicState::findOrFail($id);

        $basicState->name = $request->input('name');
        $basicState->description = $request->input('description');
        $basicState->image_path = $request->input('image_path');
        $basicState->longdesc = $request->input('longdesc');

        $basicState->save();

        return redirect()->route('basicState')->with('success', 'Dane stanu podstawowego zostały zaktualizowane.');
    }

    public function delete($id)
    {
        $basicState = BasicState::findOrFail($id);

        return view('basicState.delete', compact('basicState'));
    }

    // Metoda usuwająca stan podstawowy
    public function destroy($id)
    {
        $basicState = BasicState::findOrFail($id);

        $basicState->delete();

        return redirect()->route('basicState')->with('success', 'Stan podstawowy został usunięty.');
    }

}




        // // Pobierz nazwę pliku obrazu z żądania
        // $imageName = $request->file('image')->getClientOriginalName();

        // // Przenieś przesłany obraz do docelowego folderu
        // $request->file('image')->move(public_path('img/basicStateIMG'), $imageName);

        // // Utwórz ścieżkę do obrazu
        // $imagePath = public_path('img/basicStateIMG') . '/' . $imageName;

        // // Pobierz zawartość obrazu
        // $imageData = file_get_contents($imagePath);

        // // Zakoduj obraz do formatu base64
        // $base64Image = base64_encode($imageData);

        // // Utwórz nowy rekord w tabeli basic_state i zapisz zakodowany obraz
        // $basicState = new basicState();
        // $basicState->name = $request->input('name');
        // $basicState->description = $request->input('description');
        // $basicState->image = $base64Image;
        // $basicState->save();
