<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConditionRequest;
use App\Models\Condition;
use App\Models\Service;
use Illuminate\Http\Request;

class ConditionController extends Controller
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

    // get all conditions
    public function getConditions(){
        $conditions = Condition::select('id', 'condition_name', 'service_id')->paginate(5);
        return view('conditions.details', compact('conditions'));
    }

    //add new condition
    public function addCondition(){
        $services = Service::select('id', 'service_name')->get();
        return view('conditions.add', compact('services'));
    }

    //store condition in database
    public function insertCondition(ConditionRequest $request){
        //insert data
        Condition::create([
            'condition_name' => $request->condition_name,
            'service_id' => $request->service_id
        ]);
        return redirect()->route('condition.details')->with(['success' => 'تم الحفظ بنجاح']);
    }

    //edit condition
    public function editCondition($condition_id){
        $condition = Condition::find($condition_id);
        if(!$condition)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);
        $condition = Condition::select('id', 'condition_name', 'service_id')->find($condition_id);
        $services = Service::select('id', 'service_name')->get();
        return view('conditions.edit', compact('condition', 'services'));
    }

    // update condition
    public function updateCondition(ConditionRequest $request, $condition_id){
        //check if condition exists
        $condition = Condition::find($condition_id);
        if(!$condition)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);
        //update condition
        $condition->update([
            'condition_name' => $request->condition_name,
            'service_id' => $request->service_id
        ]);
        return redirect() -> route('condition.details') -> with(['success' => 'تم التحديث بنجاح']);
    }

    // delete condition
    public function deleteCondition($condition_id){
        // check if id exists
        $condition = Condition::find($condition_id);
        if(!$condition)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);
        $condition->delete();
        return redirect() -> route('condition.details') -> with(['success' => 'تم الحذف بنجاح']);
    }

}
