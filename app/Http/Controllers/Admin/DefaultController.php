<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServceRequest;
use App\Models\Department;
use App\Models\Provider;
use App\Models\Service;
use App\Models\Site;
use App\Models\State;
use App\Models\Unit;
use Illuminate\Http\Request;

class DefaultController extends Controller
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

    // get service-providers
    public function getServiceProviders($service_id){
        $service = Service::with('providers')->find($service_id);
        $providers =  $service->providers;
        $allproviders = Provider::select('id', 'provider_name')->get();
        return view('defaults.providers', compact('providers', 'service', 'allproviders'));
    }

    //get service-sites
    public function getServiceSites($service_id){
        $service = Service::with('sites')->find($service_id);
        $sites = $service->sites;
        $allsites = Site::select('id', 'site_name')->get();
        return view('defaults.sites', compact('sites', 'service', 'allsites'));
    }

    // get service details
    public function getServices(){
        $services = Service::select('id', 'service_name', 'description', 'unit_id', 'department_id')->paginate(5);
        return view('defaults.details', compact('services'));
    }

    // add service info
    public function addService(){
        $states = State::select('id', 'state_name')->get();
        $units = Unit::select('id', 'unit_name', 'state_id')->get();
        //$departments = Department::select('id', 'department_name', 'unit_id')->get();
        //$services = Service::select('id', 'service_name', 'unit_id', 'department_id')->get();
        $providers = Provider::select('id', 'provider_name')->get();
        $sites = Site::select('id', 'site_name')->get();
        return view('defaults.add', compact('states', 'units', 'providers', 'sites'));
    }

    // dynamic dependent dropdown using ajax - units
    public function getUnitList(ServceRequest $request){
        $state_id = $request->state_id;

        $units = Unit::where('state_id',$state_id)
            ->pluck("unit_name","id");
        return response()->json($units);
    }
    // dynamic dependent dropdown using ajax - department
    public function getDepartList(ServceRequest $request){
        $unit_id = $request->unit_id;

        $departments = Department::where('unit_id',$unit_id)
            ->pluck("department_name", "id");
        return response()->json($departments);
    }
    // dynamic dependent dropdown using ajax - services
    public function getServiceList(ServceRequest $request){
        $department_id = $request->department_id;

        $services = Service::where('department_id', $department_id)
            ->pluck("service_name", "id");
        return response()->json($services);
    }

    // insert data
    public function insertService(ServceRequest $request){
        //check if service exist
        $service = Service::find($request->service_id);
        if(!$service)
            return  redirect() -> back()-> with(['error' => 'عفوا .. الخدمة غير موجودة']);

        // insert service_providers and service_sites
        if($request->provider_ids){
            $service->providers()->syncWithoutDetaching($request->provider_ids);
        }elseif ($request->site_ids){
            $service->sites()->syncWithoutDetaching($request->site_ids);
        }elseif ($request->provider_ids && $request->site_ids){
            $service->providers()->syncWithoutDetaching($request->provider_ids);
            $service->sites()->syncWithoutDetaching($request->site_ids);
        }else {
            return  redirect() -> back() -> with(['error' => 'عفوا .. حدث خطا. من فضلك حاول مرة اخري']);
        }

        return redirect() -> back() -> with(['success' => 'تم الحفظ بنجاح']);
    }

}
