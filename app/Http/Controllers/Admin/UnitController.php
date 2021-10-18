<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UnitRequest;
use App\Models\State;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
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

    // get all units
    public function getUnits(){
        $units = Unit::select('id', 'unit_name', "state_id") -> paginate(5);
        return view('units.details', compact('units'));
    }

    //add new unit
    public function addUnit(){
        $states = State::select('id', 'state_name') -> get();
        return view('units.add', compact('states'));
    }

    //store unit in database
    public function insertUnit(UnitRequest $request){
        //insert data
        Unit::create([
            'unit_name' => $request -> unit_name,
            'state_id' => $request -> state_id
        ]);
        return redirect()->route('unit.details')->with(['success' => 'تم الحفظ بنجاح']);
    }

    //edit unit
    public function editUnit($unit_id){
        $unit = Unit::find($unit_id);
        if(!$unit)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);

        $unit = Unit::select('id', 'unit_name', 'state_id') -> find($unit_id);
        $states = State::select('id', 'state_name') -> get();
        return view('units.edit', compact('unit', 'states'));
    }

    // update unit
    public function updateUnit(UnitRequest $request, $unit_id){
        //check if unit exists
        $unit = Unit::select('id', 'unit_name', 'state_id')->find($unit_id);
        if(!$unit)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);

        //update unit
        $unit -> update([
            'unit_name' => $request->unit_name,
            'state_id' => $request->state_id
        ]);

        return redirect() -> route('unit.details') -> with(['success' => 'تم التحديث بنجاح']);

    }

    // delete unit
    public function deleteUnit($unit_id){
        // check if id exists
        $unit = Unit::find($unit_id);

        if(!$unit)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);

        $unit -> delete();
        return redirect() -> route('unit.details') -> with(['success' => 'تم الحذف بنجاح']);

    }

}
