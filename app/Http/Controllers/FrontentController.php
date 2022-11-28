<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctors;
use App\Models\Department;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use DB;

class FrontentController extends Controller
{
    public function index()
    {
        $department = DB::table('departments')->get();
        $doctors    = DB::table('doctors')->get();
        return view('users.index',compact(['department','doctors']));
    }

    public function appointment(Request $request)
    {
        $request->validate([
            'name' =>  'string|required',
            'email' => 'string|required',
            'phone' => 'numeric|required',
            'date' =>  'required',
            'department' => 'string|required',
            'doctor' => 'string|required',
            'message' => 'string|required',
        ]);
        
        $appointment= new Appointment;
        if (Auth::user()) {
         $appointment->user_id = Auth::user()->id;
        }
        $appointment->status = 'In Progress';
        $appointment->name  = $request->name;
        $appointment->email = $request->email;
        $appointment->phone = $request->phone;
        $appointment->date  = $request->date;
        $appointment->department = $request->department;
        $appointment->doctor     = $request->doctor;
        $appointment->message    = $request->message;
        $appointment->save();
        return back()->with('success', 'Appointment successfully receved');
    }


    public function myappointment()
    {

        if (Auth::id()) {
            $userId = Auth::user()->id;
            $appointment = Appointment::where('user_id', $userId)->get();
            return view('users.myappointment', compact('appointment'));
        }
        else
        {
            redirect()->back();
        }
        
    }

    
}
