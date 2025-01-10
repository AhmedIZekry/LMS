<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class InstructorDashboardController extends Controller
{
    function index(): Factory|View|Application
    {
        return view('user.layouts.instructor-dashboard');
    }
}
