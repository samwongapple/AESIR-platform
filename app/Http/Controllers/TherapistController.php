<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TherapistController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('therapists.index');
    }

    public function create(){
        return view('therapists.create');
    }

    public function store()
    {
        $data = request()->validate([
            'phone_no' => 'required',
            'gender' => 'required',
            'fees' => 'required',
            'description' => 'required',
        ]);

        auth()->user()->therapist()->create([
            'phone_no' => $data['phone_no'],
            'gender' => $data['gender'],
            'fees' => $data['fees'],
            'description' => $data['description'],
            'status' => 'pending',
        ]);

        return redirect('/therapist/' . auth()->user()->id);
    }

    public function show(){
        return view('therapists.show');
    }
}
