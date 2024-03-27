<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use App\Models\post;
use illuminate\Http\Request;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function loginForm(){
        if(auth()->guard('admin')->check()){
             return redirect()->back();
        }
        return view('admin.auth.login');
    }


    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:6'
        ]);
        if(auth()->guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])){
            return redirect()->route('admin.index');
        }else{
            return redirect()->route('admin.login')->with([
                'error' => 'incorrect email or password'
            ]);
        }

    }
    public function logout(){
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    public function index()
    {
        $posts = post::latest()->paginate(10);
        return view('Admin')->with([
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreadminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateadminRequest $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        //
    }
}
