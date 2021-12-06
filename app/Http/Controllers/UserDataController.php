<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Showing form to edit profile
     *
     * @return void
     */
    function edit()
    {
        return view('user.edit');
    }

    /**
     * Action to edit profile
     *
     * @return \App\Models\User
     */
    function editProcess(Request $request, User $user)
    {
        $this->validate($request, [
            'fullname'              => ['required', 'string', 'max:255'],
            'state'                 => ['required', 'string'],
            'phone'                 => ['required'],
            'nric'                  => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'email', 'max:255'],
        ]);

        $data    = $request->except(['_token', 'id']);
        $id_user = htmlspecialchars(strip_tags($request->id));
        $update  = $user->find($id_user)->update($data);

        if($update)
        {
            return redirect()->route('edit-user')->with('success', 'Your data has been updated!');
        } else {
            return redirect()->back()->with('error', 'Woops! Server has been trouble now. Please try it several minute later!');
        }
    }

    /**
     * Showing form to change password
     *
     * @return void
     */
    public function change()
    {
        return view('user.password');
    }

    /**
     * Action to edit password
     *
     * @return \App\Models\User
     */
    public function changeProcess(Request $request, User $user)
    {
        $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ]);

        $data    = bcrypt(htmlspecialchars(strip_tags($request->password)));
        $id_user = htmlspecialchars(strip_tags($request->id));
        $update  = $user->find($id_user)->update(['password' => $data]);

        if($update)
        {
            return redirect()->route('change-password')->with('success', 'Your password has been changed!');
        } else {
            return redirect()->back()->with('error', 'Woops! Server has been trouble now. Please try it several minute later!');
        }
    }
}
