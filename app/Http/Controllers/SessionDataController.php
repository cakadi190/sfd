<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Sessions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionDataController extends Controller
{
    public function lists(Sessions $session, Request $request)
    {
        $data['datas'] = $session->get();
        return view('user.session', $data);
    }

    public function actionLogout(Sessions $sess, Request $request)
    {
        try {
            $pass = htmlspecialchars(strip_tags($request->password));
            Auth::logoutOtherDevices($pass);

            return redirect()->route('sessions')->with('success', 'Successfully logged out the device session you\'ve selected.');
        } catch(\Exception $e) {
            return redirect()->route('sessions')->with('error', 'We can\'t process the logout action, because server has been unresponded now.');
        }
    }
}
