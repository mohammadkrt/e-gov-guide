<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use App\Models\Provider;
use App\Models\Service;
use App\Models\Site;
use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services = Service::all()->count();
        $sites = Site::all()->count();
        $conditions = Condition::all()->count();
        $providers = Provider::all()->count();
        return view('admin.home', compact('services', 'sites', 'conditions', 'providers'));

    }
}
