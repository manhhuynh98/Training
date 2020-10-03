<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function show(){
        // $user = User::all();
        $user = DB::table('users')->paginate(10);
        return view('admin.pages.user.show',compact('user'));
    }
    public function add(){
        return view('admin.pages.user.add');
    }

    public function postAdd(Request $request){
        $validatedData  = $request->validate([
            'name'      => 'required|max:50',
            'email'     => 'required|unique:users,email',
            'pass'      => 'required|min:6|max:32',
            'confirm'   => 'required|same:pass',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($request->pass);
        if($request->hasFile('image')){
            $hinh = $request->image;
            $getnamehinh = $hinh->getClientOriginalName();
            $user->image = $getnamehinh;
            $hinh->move('upload',$getnamehinh);
        };
        $user->save();
        return redirect('admin/user/show');
    }
    public function edit($id){
        
        $user = User::find($id);
        return view('admin.pages.user.edit',compact('user'));
    }

    public function postEdit($id,Request $request){
        // $validatedData  = $request->validate([
        //     'name'      => 'required|max:50',
        //     'email'     => 'required|unique:users,email',
        // ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if ($request->pass!=null) {
            // $validatedData  = $request->validate([
            //     'pass'      => 'required|min:6|max:32',
            //     'confirm'   => 'required|same:pass',
            // ]);
           
            $user->password = bcrypt($request->pass);
        }
        if($request->hasFile('image')){
            $hinh = $request->image;
            $getnamehinh = $hinh->getClientOriginalName();
            $user->image = $getnamehinh;
            $hinh->move('upload',$getnamehinh);
        };
        $user->save();
        return redirect('admin/user/show');
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/show');
    }
}
