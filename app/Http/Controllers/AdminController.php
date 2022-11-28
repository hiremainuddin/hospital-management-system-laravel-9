<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctors;
use App\Models\Department;
use App\Models\Appointment;
use DB;
use Notification;
use App\Notifications\MessageNotification;

class AdminController extends Controller
{

    // =======  Doctor functionality ===
    public function doctors()
    {
        $doctors = DB::table('doctors')->get();
        return view('admin.doctors', compact('doctors'));
    }

    public function adding_doctor()
    {
        return view('admin.adding_doctor');
    }

    public function doctordata_store(Request $request)
    {

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255',
        //     'phone' => 'required|regex:/(01)[0-9]{9}/',
        //     'specialty' => 'required',
        //     'room' => 'required',
        //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        // ]);


        $doctorData = new Doctors;
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('backend/doctorsimage', $imagename);

        $doctorData->image = $imagename;
        $doctorData->name = $request->name;
        $doctorData->bio = $request->bio;
        $doctorData->email = $request->email;
        $doctorData->phone = $request->phone;
        $doctorData->specialty = $request->specialty;
        $doctorData->room = $request->room;
        $doctorData->save();
        return redirect()->back()->with('success', 'Doctor data successfully added !');

    }


    public function doctordata_edit($id)
    {
        $doctor = Doctors::findOrFail($id);
        return view('admin.editing_doctor', compact('doctor'));
    }


    public function doctordata_update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'specialty' => 'required',
            'room' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $doctor = Doctors::findOrFail($id);
        if ($request->image) {
            unlink('backend/doctorsimage/'.$doctor->image);
            $image = $request->image;
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('backend/doctorsimage', $imagename);
            $doctor->image = $imagename;
        }
        $doctor->name = $request->name;
        $doctorData->bio = $request->bio;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->specialty = $request->specialty;
        $doctor->room = $request->room;
        $doctor->save();
        return redirect()->back()->with('success', 'Doctor data successfully added !');
    }


    public function doctordata_remove($id)
    {
      $doctor = Doctors::findOrFail($id);
      if ($doctor) {
          unlink('backend/doctorsimage/'.$doctor->image);
          $doctor->delete();
      }
      return redirect()->back()->with('success', 'Department data successfully deleted !');
    }



    // department functions
        public function department()
    {
        $department = DB::table('departments')->get();
        return view('admin.department', compact('department'));
    }

    public function department_add()
    {
        return view('admin.adding_department');
    }

    public function department_store(Request $request)
    {
        $department = new Department;
        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();
        return redirect()->back()->with('success', 'Department data successfully added !');

    }


    public function department_edit($id)
    {
        $department = Department::findOrFail($id);
        return view('admin.editing_department', compact('department'));
    }


    public function department_update(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();
        return redirect()->back()->with('success', 'Department data successfully added !');
    }


    public function department_remove($id)
    {
      $department = Department::findOrFail($id);
      $department->delete();
      return redirect()->back()->with('success', 'Department data successfully deleted !');
    }


    // =======  Appointments functionality ===
    public function getAppointments ()
    {
        $appointments = DB::table('appointments')->get();
        return view('admin.appointments', compact('appointments'));
    }

    public function appointment_edit($id)
    {
      $appointment = Appointment::findOrFail($id);
      return view('admin.appointmentView', compact('appointment'));
    }

    public function appointment_remove($id)
    {
      $appointment = Appointment::findOrFail($id);
      $appointment->delete();
      return back()->with('success', 'Appointment successfully deleted');
    }
    // approve
    public function approve($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = "approved";
        $appointment->save();
        return back()->with('success', 'Appointment successfully approved');
    }
    // cancel
    public function cancel($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = "canceled";
        $appointment->save();
        return back()->with('success', 'Appointment successfully canceled');
    }

    // send mail to user 
    public function sendmail($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('admin.emailView', compact('appointment'));
    }

    public function sendemail(Request $request, $id)
    {
        $data = Appointment::findOrFail($id);

        $details =
        [
            'greeting' => $request->greeting,

            'body' => $request->body,

            'actiontext' => $request->actiontext,

            'actionurl' => $request->actionurl,

            'endpart' => $request->endpart,
        ];

        Notification::send($data, new MessageNotification($details));

        return redirect()->back()->with('success', 'successfully sened mail');
    }
}
