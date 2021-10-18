<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeesRequest;
use App\Models\Fee;
use App\Models\Service;
use Illuminate\Http\Request;

class FeesController extends Controller
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

    // get all fees
    public function getFees(){
        $fees = Fee::select('id', 'fees_name', 'fees_value', 'service_id')->paginate(5);
        return view('fees.details', compact('fees'));
    }

    //add new fees
    public function addFees(){
        $services  = Service::select('id', 'service_name')->get();
        return view('fees.add', compact('services'));
    }

    //store fees in database
    public function insertFees(FeesRequest $request){
        //insert data
        Fee::create([
            'fees_name' => $request->fees_name,
            'fees_value' => $request->fees_value,
            'service_id' => $request->service_id
        ]);
        return redirect()->route('fees.details')->with(['success' => 'تم الحفظ بنجاح']);
    }

    //edit fees
    public function editFees($fees_id){
        $fees = Fee::find($fees_id);
        if(!$fees)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);

        $fees = Fee::select('id', 'fees_name', 'fees_value', 'service_id')->find($fees_id);
        $services = Service::select('id', 'service_name')->get();
        return view('fees.edit', compact('fees', 'services'));
    }

    // update fees
    public function updateFees(FeesRequest $request, $fees_id){
        //check if fees exists
        $fees = Fee::select('id', 'fees_name', 'fees_value', 'service_id')->find($fees_id);
        if(!$fees)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);

        //update fees
        $fees->update([
            'fees_name' => $request->fees_name,
            'fees_value' => $request->fees_value,
            'service_id' => $request->service_id
        ]);
        return redirect() -> route('fees.details') -> with(['success' => 'تم التحديث بنجاح']);
    }

    // delete fees
    public function deleteFees($fees_id){
        // check if id exists
        $fees = Fee::select('id', 'fees_name', 'fees_value', 'service_id')->find($fees_id);
        if(!$fees)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);

        $fees->delete();
        return redirect() -> route('fees.details') -> with(['success' => 'تم الحذف بنجاح']);

    }
}
