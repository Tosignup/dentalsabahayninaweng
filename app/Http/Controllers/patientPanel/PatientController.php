<?php

namespace App\Http\Controllers\patientPanel;

use App\Models\Patient;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    public function addPatient()
    {
        return view('forms.add-patient');
    }

    public function storePatient()
    {
        request()->validate([
            'first_name' => 'required|min:3|max:254',
            'last_name' => 'required|min:3|max:254',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'facebook_name' => 'required|string|max:255',
            'package' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'date_of_next_visit' => 'required|date',
            'address' => 'required|string|max:500'
        ]);

        $patient = Patient::create([
            'first_name' => request()->get('first_name', ''),
            'last_name' => request()->get('last_name', ''),
            'gender' => request()->get('gender', ''),
            'date_of_birth' => request()->get('date_of_birth', ''),
            'facebook_name' => request()->get('facebook_name', ''),
            'package' => request()->get('package', ''),
            'phone_number' => request()->get('phone_number', ''),
            'date_of_next_visit' => request()->get('date_of_next_visit', ''),
            'address' => request()->get('address', ''),
        ]);

        return redirect()->route('patient_list')->with('success','patient added');
    }
    public function showPatient($id)
    {   
        $patient = Patient::findOrFail($id);
        $payments = Payment::all();

        return view('content.patient-information', compact('patient', 'payments'));
    }

    public function editPatient($id)
    {
        $patient = Patient::findOrFail($id);

        return view('forms.update-patient', compact('patient'));
    }

    public function updatePatient(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'required|min:3|max:254',
            'last_name' => 'required|min:3|max:254',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'facebook_name' => 'required|string|max:255',
            'package' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'date_of_next_visit' => 'required|date',
            'address' => 'required|string|max:500'
        ]);

        $patient->update($validated);
        return redirect()->route('show_patient', compact('patient'))->with('success','patient updated');

    }
}
