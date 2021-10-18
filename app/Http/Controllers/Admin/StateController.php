<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateRequest;
use Illuminate\Http\Request;
use App\Models\State;


class StateController extends Controller
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

     //
    public function getDetails(){
        $states = State::paginate(5);
    	return view('states.details',compact('states'));
    }

    //add state
    public function addstate(){
    	return view('states.add');
    }
    //insert state
    public function insertstate(StateRequest $request){
        $addstate = new State;
        $addstate -> state_name = $request->state_name;
        $addstate -> save();
        return redirect()->route('state.details')->with(['success' => 'تم الحفظ بنجاح']);
        //return redirect('/state/add');
    }

 //edit state
    public function editstate($state_id){
        $state = State::find($state_id);
        if(!$state)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);

        $state = State::select('id', 'state_name') -> find($state_id);
        return view('states.edit', compact('state'));
    }

    // update state
    public function updatestate(StateRequest $request, $state_id){
        //check if state exists
        $state = State::select('id', 'state_name') -> find($state_id);
        if(!$state)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);

        //update state
        $state -> update([
            'state_name' => $request->state_name
        ]);
        return redirect() -> route('state.details') -> with(['success' => 'تم التحديث بنجاح']);
        //return redirect('/state/details');

    }

     // delete state
    public function deletestate($state_id){
        // check if id exists
        $state = State::find($state_id);

        if(!$state)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);

        $state -> delete();
         return redirect() -> route('state.details') -> with(['success' => 'تم الحذف بنجاح']);
         //return redirect('/state/details');
    }



}
