<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * show student list
     * 
     * @return view
     */
    public function showList()
    {
        $students = Student::all();
        return view('student.list', ['students' => $students]);
    }

    /**
     * show student regiter form
     * 
     * @return view
     */
    public function showCreate()
    {
        return view('student.form');
    }

    /**
     * register data
     * 
     * @return view
     */
    public function exeStore(StudentRequest $request)
    {
        $inputs = $request->all();

        DB::beginTransaction();

        try {
            
            Student::create($inputs);
            DB::commit();

        } catch(Throwable $e) {

            DB::rollback();
            abort(500);
        }

        Session::flash('err_msg', 'Register a new Student');
        return redirect(route('students'));
    }

    /**
     * show edit form
     * 
     * @param int $id
     * @return view
     */
    public function showEdit($id)
    {
        $student = Student::find($id);

        if(is_null($student)) {
            Session::flash('err_msg', 'There is no date');
            return redirect(route('students'));
        }

        return view('student.edit', ['student' => $student]);
    }

    /**
     * Edit data
     * 
     * @return view
     */
    public function exeUpdate(StudentRequest $request)
    {
        $inputs = $request->all();

        DB::beginTransaction();

        try {
            
            $student = Student::find($inputs['id']);
            $student->fill([
                'name' => $inputs['name'],
                'email' => $inputs['email'],          
                'phone' => $inputs['phone'],
                'course' => $inputs['course'],
                'year' => $inputs['year'],   
                'city' => $inputs['city']      
            ]);
            $student->save();
            DB::commit();
        } catch(Throwable $e) {
            DB::rollback();
            abort(500);
        }

        Session::flash('err_msg', 'Updated a new Student');
        return redirect(route('students'));
    }

    /**
     * delete
     * @param int $id
     * @return view
     */
    public function exeDelete($id)
    {
        if(empty($id)){
            Session::flash('err_msg', 'There is no data');
            return redirect(route('students'));
        }

        try {
            Student::destroy($id);
        } catch(Throwable $e) {
            abort(500);
        }

        Session::flash('err_msg', 'Delete data');
        return redirect(route('students'));
    }
    
}
