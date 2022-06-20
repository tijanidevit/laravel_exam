<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function renderDashboard()
    {
        $exams = Exam::all()->sortByDesc('id')->take(10);
        return view('dashboard', compact('exams'));
    }
}
