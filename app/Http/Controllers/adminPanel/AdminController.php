<?php

namespace App\Http\Controllers\adminPanel;

use Carbon\Carbon;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function overview(){
        $today = Carbon::today();

        $totalPatients = Patient::count();
        $newPatients = Patient::whereDate('created_at', $today)->count();
        $todayPatients = Patient::whereDate('date_of_next_visit', $today)->count();

        $totalAppointments = Appointment::count();
        $todayAppointment = Appointment::whereDate('appointment_date', $today)->count();
        $newAppointments = Appointment::whereDate('created_at', $today)->count();

        return view('content.overview', compact('totalPatients', 'newPatients', 'todayPatients', 'totalAppointments', 'newAppointments', 'todayAppointment'));
    }

    public function patient_list(Request $request){
        $patients = Patient::all();
        $patientQuery = Patient::query();

        if ($request->has('search') && !empty($request->get('search'))) {
            $searchTerm = $request->get('search');
            $patientQuery->where(function ($query) use ($searchTerm) {
                $query->where('last_name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('first_name', 'like', '%' . $searchTerm . '%');
            });
        }

        if ($request->has('sort')) {
            $sortOption = $request->get('sort');
            if ($sortOption == 'date_of_next_visit') {
                $patientQuery->orderBy('date_of_next_visit', 'ASC');
            } elseif ($sortOption == 'id') {
                $patientQuery->orderBy('id', 'ASC');
            } elseif ($sortOption == 'name') {
                $patientQuery->orderBy('last_name', 'ASC')->orderBy('first_name', 'ASC');
            } elseif ($sortOption == 'package') {
                $patientQuery->orderBy('package', 'ASC');
            } elseif ($sortOption == 'date_added') {
                $patientQuery->orderBy('created_at', 'ASC');
            }
        } else {
            $patientQuery->orderBy('created_at', 'ASC');
        }

        $patients = $patientQuery->paginate(10); //to edit


        return view('content.patients', compact('patients'));
    }

    public function inventory(){
        return view('content.inventory');
    }



}
