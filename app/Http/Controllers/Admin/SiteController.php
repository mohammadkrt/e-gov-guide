<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteRequest;
use Illuminate\Http\Request;
use App\Models\Site;

class SiteController extends Controller
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
    public function getSites(){
        $sites = Site::select('id', 'site_name')->paginate(5);
    	return view('sites.details', compact('sites'));
    }

    //add new department
    public function addSite(){
    	return view('sites.add');
    }

    //store site in database
    public function insertSite(SiteRequest $request){
        //insert data
        Site::create([
            'site_name' => $request -> site_name
        ]);
        return redirect()->route('site.details')->with(['success' => 'تم الحفظ بنجاح']);
    }

    //edit Department
    public function editSite($site_id){
        $site = Site::find($site_id);
        if(!$site)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);

        $site = Site::select('id', 'site_name')->find($site_id);
    	return view('sites.edit', compact('site'));
    }

    // update site
    public function updateSite(SiteRequest $request, $site_id){
        //check if site exists
        $site = Site::select('id', 'site_name')->find($site_id);
        if(!$site)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);

        $site->update([
            'site_name' => $request -> site_name
        ]);
        return redirect() -> route('site.details') -> with(['success' => 'تم التحديث بنجاح']);
    }

    // delete site
    public function deleteSite($site_id){
        // check if id exists
        $site = Site::find($site_id);
        if(!$site)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);

        $site -> delete();
        return redirect() -> route('site.details') -> with(['success' => 'تم الحذف بنجاح']);
    }
}
