<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FinishingWorks;

class FinishingWorksController extends Controller
{
    public function index()
    {
        $finishingWorks = FinishingWorks::all();

        return view('finishingWorks.finishingWorks', compact('finishingWorks'));
    }

    public function create()
    {
        return view('finishingWorks.create');
    }


    public function edit($id)
    {
        $finishingWorks = FinishingWorks::findOrFail($id);

        return view('finishingWorks.edit', compact('finishingWorks'));
    }

    public function store(Request $request)
    {
        // $finishingWorks = new FinishingWorks;

        // $finishingWorks->name = $request->input('name');
        // $finishingWorks->description = $request->input('description');
        // $finishingWorks->image_path = $request->input('image_path');
        // $finishingWorks->longdesc = $request->input('longdesc');


        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Dodaj walidację dla przesyłanego obrazu
            'longdesc' => 'nullable',
        ]);

        $finishingWorks = new FinishingWorks();
        $finishingWorks->name = $validatedData['name'];
        $finishingWorks->description = $validatedData['description'];
        $finishingWorks->longdesc = $validatedData['longdesc'];

        // Obsłuż przesyłane zdjęcie
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('img/finishingWorksIMG', 'public'); // Zapisz obraz w katalogu "public/images"
            $finishingWorks->image_path = 'storage/' . $imagePath;
        }


        $finishingWorks->save();

        return redirect()->route('finishingWorks')->with('success', 'Nowy stan surowy został dodany.');
    }

    public function update(Request $request, $id)
    {
        $finishingWorks = FinishingWorks::findOrFail($id);

        $finishingWorks->name = $request->input('name');
        $finishingWorks->description = $request->input('description');
        $finishingWorks->image_path = $request->input('image_path');
        $finishingWorks->longdesc = $request->input('longdesc');

        $finishingWorks->save();

        return redirect()->route('finishingWorks')->with('success', 'Dane stanu podstawowego zostały zaktualizowane.');
    }

    public function delete($id)
    {
        $finishingWorks = FinishingWorks::findOrFail($id);

        return view('finishingWorks.delete', compact('finishingWorks'));
    }

    // Metoda usuwająca stan podstawowy
    public function destroy($id)
    {
        $finishingWorks = FinishingWorks::findOrFail($id);

        $finishingWorks->delete();

        return redirect()->route('finishingWorks')->with('success', 'Stan podstawowy został usunięty.');
    }
}
