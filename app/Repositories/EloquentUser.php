<?php 

namespace Noblex\Repositories;

use Auth;
use Noblex\User;
use Noblex\Repositories\Interfaces\UserInterface;
use Illuminate\Support\Facades\Hash;

class EloquentUser implements UserInterface
{
	public function getAll()
	{
		return User::all();
	}


	public function findById($id) 
	{
        return User::findOrFail($id);
	}


	public function store($request) 
	{
		$data = $request->validate([
			'name'	=> 'required',
			'email' => 'required|unique:users,email',
			'password' => 'required',
			'password2'=> 'required|same:password'
		]);

		$data['password'] = Hash::make($data['password']);

		User::create($data);
	}


	public function update($request, $id) 
	{
		$data = $request->validate([
			'name'	=> 'required',
			'email' => 'required|unique:users,email,'.$id.'|email',
			'password' => 'required',
			'password2'=> 'required|same:password'
		]);

		$data['password'] = Hash::make($data['password']);

		$user = $this->findById($id);
		$user->fill($data)->save();
	}


	public function destroy($id) 
	{
		$user = $this->findById($id);
        $user->delete();
	}
}