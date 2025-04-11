<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Student $students)
    {
        $q = $request->input('q');

        $active = 'Students';

        $students = $students->when($q, function($query) use ($q) {
                    return $query->where('namasiswa', 'like', '%' .$q. '%')
                                 ->orwhere('nisn', 'like', '%' .$q. '%')
                                 ->orwhere('email', 'like', '%' .$q. '%')
                                 ->orwhere('nmrtelepon', 'like', '%' .$q. '%');
                })
        
        ->paginate(10);

        $request = $request->all();
        return view('dashboard/student/list', [
            'students' => $students,
            'request' => $request,
            'active' => $active
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $active = 'Students';
        return view('dashboard/Student/form', [
            'active' => $active,
            'button' =>'Create',
            'url'    =>'dashboard.students.store'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'namasiswa'     => 'required|unique:App\Models\Student,namasiswa',
            'nisn'          => 'required|unique:App\Models\Student,nisn',
            'tempatlahir'   => 'required',
            'tanggallahir'  => 'required',
            'alamat'        => 'required',
            'asalsekolah'   => 'required',
            'nmrtelepon'    => 'required',
            'thumbnail'     => 'required|image'
        ]);

        if($validator->fails()){
            return redirect()
                ->route('dashboard.students.create')
                ->withErrors($validator)
                ->withInput();
        }else {
            $student = new Student(); // Perlu ditambahkan untuk membuat objek student
            $image = $request->file('thumbnail');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('public/student', $image, $filename);

            $student->nisn = $request->input('nisn');
            $student->namasiswa = $request->input('namasiswa');
            $student->tempatlahir = $request->input('tempatlahir');
            $student->tanggallahir = $request->input('tanggallahir');
            $student->jeniskelamin = $request->input('jeniskelamin');
            $student->alamat = $request->input('alamat');
            $student->asalsekolah = $request->input('asalsekolah');
            $student->nmrtelepon = $request->input('nmrtelepon');
            $student->email = $request->input('email');
            $student->thumbnail = $filename;
            $student->save();

            return redirect()
                        ->route('dashboard.students')
                        ->with('message', __('message.students.store', ['namasiswa'=>$request->input('namasiswa')]));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
        $active = 'Students';
        return view('dashboard/Student/show', [
            'active' => $active,
            'student'  =>$student,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $active = 'Students';
        return view('dashboard/Student/form', [
            'active'  => $active,
            'student' => $student,
            'button'  =>'Update',
            'url'     =>'dashboard.students.update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
        $validator = Validator::make($request->all(), [
            'namasiswa'     => 'required|unique:App\Models\Student,namasiswa,'.$student->nisn,
            'nisn'          => 'required|unique:App\Models\Student,nisn,'.$student->nisn,
            'tempatlahir'   => 'required',
            'tanggallahir'  => 'required',
            'alamat'        => 'required',
            'asalsekolah'   => 'required',
            'nmrtelepon'    => 'required',
            'thumbnail'     => 'image'
        ]);

        if($validator->fails()) {
            return redirect()
                ->route('dashboard.students.update', $student->nisn)
                    ->withErrors($validator)
                    ->withInput();
                    
        }else {
           // $student = new Student(); // Perlu ditambahkan untuk membuat objek student
                if($request->hasFile('thumbnail')){
                    $image = $request->file('thumbnail');
                    $filename = time() . '.' . $image->getClientOriginalExtension();
                        Storage::disk('local')->putFileAs('public/student', $image, $filename);
                    $student->thumbnail = $filename;
                }
            $student->nisn = $request->input('nisn');
            $student->namasiswa = $request->input('namasiswa');
            $student->tempatlahir = $request->input('tempatlahir');
            $student->tanggallahir = $request->input('tanggallahir');
            $student->jeniskelamin = $request->input('jeniskelamin');
            $student->alamat = $request->input('alamat');
            $student->asalsekolah = $request->input('asalsekolah');
            $student->nmrtelepon = $request->input('nmrtelepon');
            $student->email = $request->input('email');
            $student->save();
            
            $messageKey = 'students.update';
            return redirect()
                        ->route('dashboard.students')
                        ->with('message', __('message.students.update', ['namasiswa'=>$request->input('namasiswa')]));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
        $namasiswa = $student->namasiswa;

        $student->delete();
        $messageKey= 'students.delete';
        return redirect()
                ->route('dashboard.students')
                ->with('message', __('message.students.delete', ['namasiswa' => $namasiswa]));
    }
}
