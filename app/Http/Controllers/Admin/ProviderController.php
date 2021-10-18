<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProviderRequest;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
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

    // get all provider
    public function getProviders(){
        $providers = Provider::select('id', 'provider_name')->paginate(5);
        return view('providers.details', compact('providers'));
    }

    //add new provider
    public function addProvider(){
        return view('providers.add');
    }

    // insert provider in database
    public function insertProvider(ProviderRequest $request){
        // insert data
        Provider::create([
            'provider_name' => $request->provider_name
        ]);
        return  redirect() -> route('provider.details') -> with(['success' => 'تم الحفظ بنجاح']);
    }

    // edit provider
    public function editProvider($provider_id){
        $provider = Provider::find($provider_id);
        if(!$provider)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);

        $provider = Provider::select('id', 'provider_name')->find($provider_id);
        return view('providers.edit', compact('provider'));
    }

    // update provider
    public function updateProvider(ProviderRequest $request, $provider_id){
        //check if provider exists
        $provider = Provider::find($provider_id);
        if(!$provider)
            return redirect() -> back() -> with(['error' => 'السجل غير موجود']);

        // update provider
        $provider->update([
            'provider_name' => $request->provider_name
        ]);
        return redirect() -> route('provider.details') -> with(['success' => 'تم التحديث بنجاح']);
    }

    // delete provider
    public function deleteProvider($provider_id){
        // check if id exists
        $provider = Provider::find($provider_id);
        if(!$provider)
            return redirect()->back()->with(['error' => 'السجل غير موجود']);

        $provider->delete();
        return redirect() -> route('provider.details') -> with(['success' => 'تم الحذف بنجاح']);
    }
}
