<?php

namespace App\Http\Controllers;

use App\Therapist;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        $therapists = Therapist::where('status','pending')->get();

        return view('admins.index',compact('therapists'));
    }

    public function approve($therapist_id)
    {
        $therapist = Therapist::findOrFail($therapist_id);
        $therapist->update(['status' => 'approved']);

        return redirect()->route('admin.index')->withMessage('Therapist approved successfully');
        // return redirect()->route('admin.users.index')->withMessage('User approved successfully');
    }
}
