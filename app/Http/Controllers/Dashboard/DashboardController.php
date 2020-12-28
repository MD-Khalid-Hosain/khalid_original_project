<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * It will show the dashboard index
     */

    public function index()
    {
        return view('backend.layouts.index');
    }
}
