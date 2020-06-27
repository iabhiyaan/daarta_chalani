<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use Image;

class DashboardController extends Controller
{
    public function index()
    {
        $detail = Dashboard::first();
        return view('admin.dashboard', compact('detail'));
    }
}
