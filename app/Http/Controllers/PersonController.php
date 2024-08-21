<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(Request $request)
    {
        $persons = Person::paginate(10);

        return view('dashboard', compact('persons'));
    }

    public function create()
    {
        return view('persons.partials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:persons',
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'role' => 'required|in:member,admin,owner',
            'image' => 'nullable|url|max:2048',
        ]);

        $data = $request->all();

        if (empty($data['image'])) {
            $data['image'] = 'https://i.pinimg.com/736x/b1/bd/bd/b1bdbdaea15e42631ca1b6491523a5ed.jpg';
        }

        Person::create($data);

        return redirect()->route('dashboard')->with('success', 'Person created successfully.');
    }

    public function edit(Person $person)
    {
        return view('persons.partials.edit', compact('person'));
    }

    public function update(Request $request, Person $person)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:persons,email,' . $person->id,
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'role' => 'required|in:member,admin,owner',
            'image' => 'nullable|url|max:2048',
        ]);

        $data = $request->all();

        if (empty($data['image'])) {
            $data['image'] = 'https://i.pinimg.com/736x/b1/bd/bd/b1bdbdaea15e42631ca1b6491523a5ed.jpg';
        }

        $person->update($data);

        return redirect()->route('dashboard')->with('success', 'Person updated successfully.');
    }

    public function show(Person $person)
    {
        return view('persons.partials.show', compact('person'));
    }

    public function destroy(Person $person)
    {
        // Tidak perlu menghapus file lokal, cukup hapus record dari database
        $person->delete();

        return redirect()->route('dashboard')->with('success', 'Person deleted successfully.');
    }

    public function destroyAll()
    {
        Person::truncate();

        return redirect()->route('dashboard')->with('success', 'All persons deleted successfully.');
    }
}
