<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApprovalInstructorRequestMail;
use App\Mail\DeclineInstructorRequestMail;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


class AdminDashboardController extends Controller
{
    function index(){
        return view('admin.dashboard');
    }
    function instructorRequest(): View|Factory|Application
    {
        $users = User::where('approve_status','pending')->orwhere('approve_status','rejected')->get();
        return view('admin.instructor-request',compact('users'));
    }

    /**
     * handel incoming request (pending/approve/reject)
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    function instructorRequestStore(Request $request,User $user): RedirectResponse
    {
        $request->validate([
            'status'=>'required| in:approved,rejected,pending',
        ]);
        $user->approve_status = $request->status;

        $request->status = 'approved' ? $user->role = 'instructor' : $user->role = 'student';
        $user->save();
        if($user->role == 'instructor'){
            if (config('mail_queue')) {
                Mail::to($user)->queue(new ApprovalInstructorRequestMail());
            }else{
                Mail::to($user)->send(new ApprovalInstructorRequestMail());
            }
        }else{
            Mail::to($user)->send(new DeclineInstructorRequestMail());
        }
        return redirect()->back();
    }

    function download(User $user): BinaryFileResponse
    {
        return \response()->download(public_path("uploads/".$user->files));
    }
}
