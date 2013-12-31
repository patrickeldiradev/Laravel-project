<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.user.index',['users' =>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:6', 'confirmed']
        ]);

        $user = new User([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make( $request->password)
        ]);

        $user->save();
        return redirect()->route('user.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validate_array = [
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id]
        ];
        if($request->password) {
            $validate_array['password'] = ['required',  'string', 'min:6', 'confirmed'];
            $user->password             = Hash::make( $request->password);
        }
        $this->validate($request,$validate_array);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->update();
        Session::flash('success' , 'تم التعديل بنجاح');
        return redirect()->route('user.edit', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        Session::flash('success' , 'تم الحذف بنجاح');
        return redirect()->route('user.index');
    }

}
