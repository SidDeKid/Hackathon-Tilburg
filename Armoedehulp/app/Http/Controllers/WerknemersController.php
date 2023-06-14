<?php

namespace App\Http\Controllers;

use App\Models\Werknemer;
use Illuminate\Http\Request;

class WerknemersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('werknemers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $encrypted = Crypt::encrypt($request->wachtwoord);
        $request->wachtwoord = $encrypted;

        $request->validate([
            'gebruikersnaam'=>'required|unique|max:100',
            'email' => 'max:80',
            'wachtwoord' => 'required|max:500',
        ]);
        Werknemer::create($request->only(['gebruikersnaam', 'email', 'wachtwoord']));
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
            'gebruikersnaam'=>'required|unique|max:100',
            'email' => 'max:80',
            'wachtwoord' => 'required|max:500',
        ]);
        Werknemer::find($id)->update($request->only(['gebruikersnaam', 'email', 'wachtwoord']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Werknemer::destroy($id);
    }
}
