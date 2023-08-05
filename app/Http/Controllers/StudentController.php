<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index() {
        $studentsData = Students::orderby('created_at', 'desc')->paginate(25);

        return view('students.index')
                ->with(['StudentsData' => $studentsData]);
    }

    public function show(Request $request) {
        $name = $request['searchItem'];
        $studentsData = Students::whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%$name%"])->paginate(25);

        return view('students.index')
                ->with(['StudentsData' => $studentsData]);
    }

    // add new student
    public function store(Request $request) {
        $validated = $request->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'gender' => 'required',
            'age' => 'required',
            'email' => 'email|required|unique:students,email'
        ]);

        Students::create($validated);
        return redirect('/')->with('message', 'Student added successful');
    }

    // delete student
    public function delete($id) {
        Students::where('id', $id)->delete();
        return redirect('/')->with('message', 'Student deleted successfully');
    }
}
