<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Unit;

class DepartmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // get all departments
    public function getDepartments(){
        $departments = Department::select('id', 'department_name', 'unit_id')->paginate(5);
    	return view('departments.details', compact('departments'));
    }

    //add new department
    public function addDepartment(){
        $units = Unit::select('id', 'unit_name')->get();
    	return view('departments.add', compact('units'));
    }

    //store department in database
    public function insertDepartment(DepartmentRequest $request){
        //insert data
        Department::create([
            'department_name' => $request->department_name,
            'unit_id' => $request->unit_id
        ]);
         return redirect()->route('department.details')->with(['success' => 'تم الحفظ بنجاح']);
    }

    //edit Department
    public function editDepartment($department_id){
        $department = Department::find($department_id);
        if(!$department)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);

        $department = Department::select('id', 'department_name', 'unit_id')->find($department_id);
        $units = Unit::select('id', 'unit_name') -> get();
        return view('departments.edit', compact('department', 'units'));
    }

    // update department
    public function updateDepartment(DepartmentRequest $request, $department_id){
        //check if department exists
        $department = Department::select('id', 'department_name', 'unit_id')->find($department_id);
        if(!$department)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);
        //update department
        $department->update([
            'department_name' => $request->department_name,
            'unit_id' => $request->unit_id
        ]);
        return redirect() -> route('department.details') -> with(['success' => 'تم التحديث بنجاح']);
    }

    // delete department
    public function deleteDepartment($department_id){
        // check if id exists
         $department = Department::select('id', 'department_name', 'unit_id')->find($department_id);
        if(!$department)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);

        $department->delete();
        return redirect() -> route('department.details') -> with(['success' => 'تم الحذف بنجاح']);

    }
}
