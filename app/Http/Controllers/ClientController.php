<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('clients.create');
    }

    public function store()
    {
        $data = request()->validate([
            'phone_no' => 'required',
            'gender' => 'required',
            'description'=> 'required',
        ]);

        auth()->user()->client()->create([
            'phone_no' => $data['phone_no'],
            'gender' => $data['gender'],
            'description' => $data['description'],
        ]);

        return redirect('/client/' . auth()->user()->id);
    }

    public function show(){

    }

}
