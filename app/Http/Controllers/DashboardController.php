<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $submission = Submission::pending()->get()->count();
        return view('pages.dashboard.index', compact('submission'));
    }
}
