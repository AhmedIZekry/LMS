<?php

namespace App\Http\Controllers\FrontEnd;

use App\FileUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Requests\UserPersonalInformationUpdateRequest;

use App\Http\Requests\UserSocialInformationUpdateRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

//user.pages.sections.profile-update
class ProfileUpdateController extends Controller
{
    use FileUpload;
    function index(): Application|Factory|View
    {
        $user = Auth::user();
        return view('user.pages.sections.profile-update',compact('user'));

    }

    function updateUserPersonalInformation(UserPersonalInformationUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $request->validated();
        $dataToUpdate = [];
        foreach ($request->validated() as $key => $value) {
            if ($value === null && $user->{$key} !== null) {
                $dataToUpdate[$key] = $user->{$key};
            }
            if ($value !== null) {
                $dataToUpdate[$key] = $value;
            }
        }
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $this->deleteFile($user->image);
            $user->image = $this->upload($file,'uploads/images');

        }
        $user->update($dataToUpdate);
        return redirect()->route('student.profileUpdate')->with('success', 'Profile updated successfully!');
    }
    function updateSocialInformation(UserSocialInformationUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $request->validated();
        $dataToUpdate = [];
        foreach ($request->validated() as $key => $value) {
            if ($value === null && $user->{$key} !== null) {
                $dataToUpdate[$key] = $user->{$key};
            }
            if ($value !== null) {
                $dataToUpdate[$key] = $value;
            }
        }
        $user->update($dataToUpdate);
        return redirect()->route('student.profileUpdate')->with('success', 'Profile updated successfully!');

    }
    function updatePassword(PasswordUpdateRequest $request): RedirectResponse{
        $request->validated();
        auth()->user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('status', 'Password updated successfully!');

    }
}

