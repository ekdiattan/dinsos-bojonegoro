<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function view()
    {
        $user = User::all();
        return view('admin.user.index', ['title' => 'Dinas Sosial Bojonegoro', 'user' => $user]);
    }

    public function storeuser(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        
        if ($user) 
        {
            return back()->with('error', 'Email already exists');
        }

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Register successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        
        return back()->with('success', 'Data User Has Been Deleted!');
    }

    public function editview($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', ['title' => 'Dinas Sosial Bojonegoro', 'user' => $user]);
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        
        if (!is_null($request->password) || !is_null($request->name) || !is_null($request->email)) 
        {
            if (!is_null($request->password)) 
            {
                $user->password = Hash::make($request->password);
            }

            if (!is_null($request->name)) 
            {
                $user->name = $request->name;
            }

            if (!is_null($request->email)) 
            {
                $exist = User::where('email', $request->email)->first();
                if ($exist) 
                {
                    return back()->with('error', 'Email already exists');
                }

                $user->email = $request->email;
            }

            $user->save();
            
        }else
        {
            return back()->with('error', 'Nothing to update');
        }

        return redirect('/datauser')->with('success', 'Data User Has Been Updated!');
    }
}
