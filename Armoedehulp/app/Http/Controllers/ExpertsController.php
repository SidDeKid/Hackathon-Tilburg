<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use Illuminate\Http\Request;

class ExpertsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experts = Expert::all();
        return view('experts.index', ['experts' => $experts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $encrypted = Crypt::encrypt($request->wachtwoord);
        $request->wachtwoord = $encrypted;

        $request->validate([
            'voornaam'=>'required|unique|max:100',
            'achternaam' => 'required|max:100',
            'email' => 'required|max:80',
            'bedrijfsnaam' => 'required|max:100',
            'wachtwoord' => 'required|max:500',
        ]);
        Expert::create($request->only(['voornaam', 'achternaam', 'email', 'bedrijfsnaam', 'wachtwoord']));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $encrypted = Crypt::encrypt($request->wachtwoord);
        $request->wachtwoord = $encrypted;

        $request->validate([
            'voornaam'=>'required|unique|max:100',
            'achternaam' => 'required|max:100',
            'email' => 'required|max:80',
            'bedrijfsnaam' => 'required|max:100',
            'wachtwoord' => 'required|max:500',
        ]);
        Expert::find($id)->update($request->only(['voornaam', 'achternaam', 'email', 'bedrijfsnaam', 'wachtwoord']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Expert::destroy($id);
    }
}
