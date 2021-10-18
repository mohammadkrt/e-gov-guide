<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServceRequest;
use App\Models\Department;
use App\Models\Service;
use App\Models\Unit;
use Illuminate\Http\Request;

class ServiceController extends Controller
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

    // get all Services
    public function getServices(){
        $services = Service::select('id', 'service_name', 'description', 'unit_id', 'department_id')->paginate(5);
        return view('services.details', compact('services'));
    }

    //add new service
    public function addService(Request $request){
        $units = Unit::all();
        return view('services.add', compact('units'));
    }

    // dynamic dependent dropdown using ajax - departments
    public function getStateList(Request $request)
    {
        $unit_id = $request->unit_id;

        $departments = Department::where('unit_id',$unit_id)
            ->pluck("department_name","id");
        return response()->json($departments);
    }

    //store service in database
    public function insertService(ServceRequest $request){
        //insert data
        Service::create([
            'service_name' => $request->service_name,
            'description' => $request->description,
            'unit_id' => $request->unit_id,
            'department_id' => $request->department_id
        ]);
        return  redirect() -> route('service.details') -> with(['success' => 'تم الحفظ بنجاح']);
    }

    // edit service
    public function editService($service_id){
        $service = Service::find($service_id);
        if(!$service)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);

        $service = Service::select('id', 'service_name', 'description', 'unit_id', 'department_id')->find($service_id);
        $units = Unit::select('id', 'unit_name')->get();
        $departments = Department::select('id', 'department_name')->get();
        return view('services.edit', compact('service', 'units', 'departments'));
    }

    // update service
    public function updateService(ServceRequest $request, $service_id){
        //check if service exists
        $service = Service::find($service_id);
        if(!$service)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);

        //update service
        $service -> update([
            'service_name' => $request->service_name,
            'description' => $request->description,
            'unit_id' => $request->unit_id,
            'department_id' => $request->department_id
        ]);
        return redirect() -> route('service.details') -> with(['success' => 'تم التحديث بنجاح']);
    }

    // delete service
    public function deleteService($service_id){
        // check if id exists
        $service = Service::find($service_id);
        if(!$service)
            return redirect()->back()->with(['error' => 'السجل غير موجود']);

        $service->delete();
        return redirect() -> route('service.details') -> with(['success' => 'تم الحذف بنجاح']);
    }
}
