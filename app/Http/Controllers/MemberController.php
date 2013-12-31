<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Member::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.index',['users' =>$admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( ! auth()->user()->isMember() )
            return redirect()->back()->withErrors('ليس لديك حق الاضافة');
            
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
        if( ! auth()->user()->isMember() )
            return redirect()->back()->withErrors('ليس لديك حق الاضافة');

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
     * Display the specified resource.
     *
     * @param  \App\Member  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Member $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $admin
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
     * @param  \App\Member  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        if( ! auth()->user()->canEdit($user) )
            return redirect()->back()->withErrors('ليس لديك حق التعديل');

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
     * @param  \App\Member  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if( ! auth()->user()->canEdit($user) )
            return redirect()->back()->withErrors('ليس لديك حق الحذف');

        $user->delete();
        Session::flash('success' , 'تم الحذف بنجاح');
        return redirect()->route('user.index');
    }

    public function profile()
    {
        return view('auth.user.profile');
    }

    public function updateProfile(Request $request) {

        $user = User::find( auth()->id() );

        $this->validate($request,[
            'name'        => 'required|max:200',
            'email'       => $request->email == $user->email ?  'nullable' :  'required|string|email|max:255|unique:users',
            'phone'       => 'nullable|string|min:12|max:15',
            'password'    => 'nullable|string|min:6|confirmed',
        ]);

        $user->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'password'  => $request->password ?  Hash::make( $request->password) : $user->password,
        ]);

        Session::flash('success' , 'تم التعديل بنجاح');
        return redirect()->back();
    }

}
