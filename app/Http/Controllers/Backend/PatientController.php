<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\DoctorPatient;
use App\Models\PatientReport;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(auth()->user()->doctors->doctor_patients);
        $patients = Patient::all();
        return view('backend.patients.index')
        ->with('patients', $patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cnic'=>'required|numeric|unique:patients',
            'first_name'=>'required|regex:/^[a-zA-Z\-]*$/',
            'last_name'=>'required|regex:/^[a-zA-Z\-]*$/',
            'email'=>'email|required|unique:users',
            'address'=>'required',
            'city'=>'required',
            'phone'=>'required',
            'gender'=>'required',
        ]);
        $patient_search = Patient::where('cnic', $request->cnic)->first();
        if ($patient_search) {
            alert()->info('Not Created', 'Already Exist');
            return redirect()->back();
        } else {
            try {
                DB::beginTransaction();
                $user = User::create([
                'username'=>$request->first_name.rand(0, 99),

                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'first_name'=>$request->first_name,
                'password' => Hash::make($request->cnic),
            ]);
                $user->assignRole('Patient');
                $user->save();
    
                $patient = Patient::create([
                'user_id'=>$user->id,
                'cnic'=>$request->cnic,
                'address'=>$request->address,
                'city_id'=>$request->city,
                'phone'=>$request->phone,
                'gender'=>$request->gender
            ]);
                $relation = DoctorPatient::create([
                'doctor_id'=>auth()->user()->doctors->id,
                'patient_id'=>$patient->id
            ]);
                DB::commit();
                alert()->success('Created', 'Successfully Created');
                return redirect()->route('patients.show', $patient->id);
            } catch (\Throwable $th) {
                DB::rollback();
                throw $th;
            }
        }
      

        // $findrelation = DoctorPatient::where('user_patient')
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('patients.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('backend.patients.edit')
        ->with('patient', $patient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);

        $request->validate([
            'first_name'=>'required|regex:/^[a-zA-Z\-]*$/',
            'last_name'=>'required|regex:/^[a-zA-Z\-]*$/',
            'email' => 'required|email|unique:users,email,'.$patient->user->id,
            'address'=>'required',
            'city'=>'required',
            'phone'=>'required',
            'gender'=>'required',
        ]);
        $patient->user->first_name = $request->first_name;
        $patient->user->last_name = $request->last_name;
        $patient->user->email = $request->email;
        $patient->address = $request->address;
        $patient->city_id = $request->city;
        $patient->phone = $request->phone;
        $patient->gender = $request->gender;
        $patient->user->save();
        $patient->save();
        alert()->success('Updated', 'Successfully Updated');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addTests($id)
    {
        $patient = Patient::find($id);
        // dd(auth()->user()->doctors->id);
        return view('backend.patients.addTests')
        ->with('patient', $patient);
    }
    public function addTestsSave(Request $request, $id)
    {
        $patient = Patient::find($id);
        $test = PatientReport::create([
            'patient_id'=>$patient->id,
             'name'=>$request->name,
            
        ]);


        if ($request->hasFile('file')) {
     

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/files', $filename);
            $test->file =  'uploads/files/'.$filename;
            $test->save();
        }

        $response = Http::post('https://pdidentifier.tech/api/receive-patient-report',[
            'test' => $request->name,
            'image' => $test->file,
            'name' => $test->file,

        ]);
        dd($response->json());
        return $response->json();
        return redirect()->route('patients.editTest',$test->id);
    }
    public function editTest($id){
        $test = PatientReport::find($id);
        return view('backend.patients.editTest')
        ->with('test', $test);
    }

    public function updateTest(Request $request, $id){

     
        $test = PatientReport::find($id);
        $test->name = $request->name;
        $test->result = $request->result;

        if ($request->hasFile('file')) {


            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/files', $filename);
            $test->file =  'uploads/files/'.$filename;
            
        }
        $test->save();
        return redirect()->back();

    }
}
