<?php

namespace App\Http\Controllers\FrontEnd;

use App\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class StudentDashboardController extends Controller
{
    use FileUpload;

    function index():View{
        $user = Auth::user();
        return view('user.layouts.student-dashboard',compact('user'));
    }
    function instructorRequest(): View|Factory|Application
    {
        $user = Auth::user();
        return view('user.layouts.instructor-request',compact('user'));
    }

    function instructorRequestSubmit(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $this->upload($file,'uploads');
        $user->files = $filename;
        $user->save();
        return redirect()->back();
    }
}
