<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRolesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $collection = array();
        $count = 1;
        foreach($users as $usr){
            $item = array();
            $item['id'] = $usr->id;
            $item['counter'] = $count;
            $item['username'] = $usr->fullname;
            $item['date_joined'] = $usr->created_at->toFormattedDateString();
            $item['status'] = $usr->status;
            $roles = explode(" ", $usr->state);
            $item['roles'] = $roles;
            $collection[] = $item;
            $count += 1;
        }
        return view('roles.index', ['users' => $collection]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getDataModalPW($id){
        $user = User::findOrFail($id);
        return view('roles._modal_change_pw', compact('user'));
    }

    public function changePW(Request $request, $id){
        $user = User::findOrFail($id);
        $request->validate([
            'oldpassword' => 'required|min:8',
            'retypeoldpassword' => 'required|min:8',
            'newpassword' => 'required|min:8'
        ]);

        if($request->oldpassword == $request->retypeoldpassword){
            $user->password = Hash::make($request->newpassword);
            $user->save();

            $msg = 'Password updated';
            return redirect('/dashboard/settings/user-role')->with('message', $msg);
        }else{
            $msg = 'Old Password didn\'t correct';
            return redirect('/dashboard/settings/user-role')->with('message', $msg);
        }
    }

    public function getDataModalEdit($id){
        $user = User::findOrFail($id);
        $roles = explode(" ", $user->state);
        return view('roles._modal_edit_user', compact('user'));
    }

    public function editDataUserDetail($id){
        $state = "";
        if(request()->has('finance')){
            $state .= 'finance';
        }
        if(request()->has('sales')){
            $state .= ' sales';
        }
        if(request()->has('management')){
            $state .= ' management';
        }

        $data = [
            'id' => $id,
            'email' => request()->email,
            'status' => request()->status,
            'fullname' => request()->name,
            'state' => $state,
            'nric' => request()->nric,
            'phone' => request()->phone,
        ];

        $user = User::findOrFail($id);
        $user->email = request()->email;
        $user->status = request()->status;
        $user->fullname = request()->name;
        $user->state = $state;
        $user->nric = request()->nric;
        $user->phone = request()->phone;
        $user->save();

        $msg = 'User data updated';
        return redirect('/dashboard/settings/user-role')->with('message', $msg);
    }

    public function getDataModalAdd(){
        return view('roles._modal_add_user');
    }
}
