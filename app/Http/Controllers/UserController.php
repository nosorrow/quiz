<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        if(Auth::user()->role->name === 'manager'){
            $users = User::where('role_id', 3)->get();
        } else{
            $users = User::all();
        }

        if(!Gate::any(['isAdmin', 'isManager'])){
            abort(403);
        }

        return view('users', [
            'users'=>$users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        Gate::authorize('isAdmin');

        return view('user-create',[
			'roles'=>Role::all()
		]);
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function store(Request $request)
    {
        if(!Gate::allows('isAdmin')){
            abort(403);
        }

        $validator = $request->validate([
			'name'=>'required',
			'email'=>'required|email:rfc,dns|unique:users',
			'password'=>'required',
			'role'=>'required|integer'
		]);

		$user = new User;
		$user->name = $request->input('name');
		$user->email= $request->input('email');
		$user->password = Hash::make($request->input('password'));
		$user->role_id = $request->input('role');
		$user->save();

		return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        Gate::authorize('isAdmin');

        $user = User::findOrFail($id);

		return view('user-edit', [
			'user'=>$user,
			'roles'=>Role::all()
		]);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param int $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(Request $request, $id)
    {
		if(!Gate::allows('isAdmin')){
			abort(403);
		}

		$validator = $request->validate([
			'name'=>[
				'required',
				// Rule::unique('users')->ignore(User::find($id))
			],
			'email'=>[
				'required',
				'email:rfc,dns',
				 Rule::unique('users')->ignore(User::find($id))
			],
			'role'=>'required|integer'
		]);

		$user = User::find($id);

        $user->name = $request->input('name');
		$user->email= $request->input('email');
        $user->role_id = $request->input('role');

        if($request->input('password')){
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

		return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     */
    public function destroy($id)
    {
		if(!Gate::allows('isAdmin')){
			abort(403);
		}
		$user = User::find($id);
		if((int)$user->id === 1){
			return redirect()->route('user.index')->with('alert', 'Не може да триете този потребител');
		}

		$user->delete();

		return redirect()->route('user.index')->with('success', 'Успешно изтрихте потребител ' . $user->name);
    }
}
