<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Visit;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\PDF as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;


class AdminController extends Controller
{
    
    public function addview()
    {
        
        return view('admin.add_doctor');
    }

    public function upload(Request $request)
{
    if ($request->hasFile('file') && $request->file('file')->isValid()) {
        $doctor = new Doctor;

        $image = $request->file('file');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('doctor_image', $image_name);

        $doctor->image = $image_name;
        $doctor->name = $request->name;
        $doctor->phone = $request->number;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;

        $doctor->save();
    }

    return redirect()->back()->with('message', 'Doctor Added Successfully');
}

public function show_appointments()
{
    $data = appointment::all();

    return view('admin.show_appointments', compact('data'));
}

public function show_doctors()
{
    $data = doctor::all();

    return view('admin.show_doctors', compact('data'));
}

public function approved($id)
{
    $data=appointment::find($id);
    $data->status='Approved';
    $data->save();

    return redirect()->back();
}

public function canceled($id)
{
    $data=appointment::find($id);
    $data->status='Canceled';
    $data->save();

    return redirect()->back();
}

public function deleted($id)
{
    $data=doctor::find($id);
    $data->delete();

    return redirect()->back();
}

public function updated($id)
{
    $data = doctor::find($id);

    return view('admin.update_doctor', compact('data'));
}

public function edit_doctor(Request $request, $id)
{
    $doctor = doctor::find($id);

    $doctor->name = $request->name;
    $doctor->phone = $request->phone;
    $doctor->speciality = $request->speciality;
    $doctor->room = $request->room;

    $image = $request->file;

    if($image)
    {
        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->file->move('doctor_image', $imagename);
    
        $doctor->image = $imagename;
    }
    

    $doctor->save();

    return redirect('show_doctors')->with('message', 'Doctor updated successfully');

}


public function show_clients()
{
    
    $data = User::where('usertype', 0)->get();

    return view('admin.show_clients', compact('data'));
}

public function addvisit()
{
    
    $patients = User::where('usertype', 0)->get();

    $doctors = Doctor::all();

    return view('admin.add_visit', compact('patients', 'doctors'));
}



    public function uploadvisit(Request $request)
{
    // Validazione dei dati del form
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'doctor_id' => 'required|exists:doctors,id',
        'date' => 'required|date',
        'report' => 'required',
        'patient_dob' => 'required|date', 
        
    ]);

    $visit = new Visit([
        'user_id' => $request->user_id,
        'doctor_id' => $request->doctor_id,
        'date' => $request->date,
        'report' => $request->report,
        'patient_date_of_birth' => $request->patient_dob,
    ]);

    $visit->save();

    $user = User::find($request->user_id);
    $user->last_exam = $request->date;
    $user->save();

    return redirect()->back()->with('message', 'Visit Added Successfully');
}

public function show_report()
{
    $data = Visit::whereHas('user', function ($query) {
        $query->where('usertype', 0);
    })
    ->with('user')
    ->get();

    return view('admin.show_report', compact('data'));
}



public function generateVisitInfo($visitId)
{
    // Recupera la visita dal database
    $visit = Visit::find($visitId);

    // Verifica se la visita esiste
    if (!$visit) {
        return redirect()->back()->with('error', 'Visit not found');
    }

    // Recupera le informazioni dal modello Visit
    $patientInfo = $visit->user->name;
    $dateOfBirth = $visit->user->date_of_birth;
    $visitDate = $visit->date;
    $report = $visit->report;

    // Passa $visitId alla funzione generateQrCode
    $qrCodePath = $this->generateQRCode($patientInfo, $visitDate, $report, $visitId);
    $pdfPath = $this->generatePDF($patientInfo, $dateOfBirth, $visitDate, $report); // Aggiunto $dateOfBirth

    // Passa le variabili alla vista
    return view('nome_della_tua_vista', [
        'patientInfo' => $patientInfo,
        'dateOfBirth' => $dateOfBirth,
        'visitDate' => $visitDate,
        'report' => $report,
        'qrCodePath' => $qrCodePath,
        'pdfPath' => $pdfPath,
    ]);
}

public function generatePDF($patientInfo, $visitDate, $report, $dateOfBirth)
{
    $pdf = PDF::loadView('pdf.visit', compact('patientInfo', 'visitDate', 'report'));

    return $pdf->download('visit_report.pdf');
}

public function showVisit($visitId)
{
    $visit = Visit::with('doctor.user')->find($visitId);

    if (!$visit) {
        abort(404);
    }

    return view('pdf.visit', [
        'patientInfo' => $visit->user->name,
        'dateOfBirth' => $visit->user->date_of_birth,
        'visitDate' => $visit->date,
        'report' => $visit->report,
        'doctor' => $visit->doctor, 
    ]);
}



public function sendVisitReminder($userId)
{
    $user = User::find($userId);

    if ($user) {
        $user->sendVisitReminderNotification();
        $user->email_sent_date = Carbon::now();
        $user->save();
        return redirect()->back()->with('success', 'Visit reminder email sent successfully!');
    } else {
        return redirect()->back()->with('error', 'Client not found');
    }
}
    

}
