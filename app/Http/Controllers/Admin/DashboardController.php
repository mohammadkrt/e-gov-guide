<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Condition;
use App\Models\Provider;
use App\Models\Service;
use App\Models\Site;
use Illuminate\Http\Request;

class DashboardController extends Controller
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

    public function index()
    {
        $services = Service::all()->count();
        $sites = Site::all()->count();
        $conditions = Condition::all()->count();
        $providers = Provider::all()->count();
        return view('admin.home', compact('services', 'sites', 'conditions', 'providers'));
    }

    public function table()
    {
        return view('admin.table');
    }
}
