<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Staff;

class StaffController extends Controller
{

    public function index()
    {
        $staff = Staff::with('media')->get();

        return view('frontend.staff.index', compact('staff'));
    }

  }
