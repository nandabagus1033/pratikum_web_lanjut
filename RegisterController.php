<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;


class RegisterController extends BaseController
{
	public construct (){
		$this->userModel->insert($data);
	}

	public function index()
	{
		$data =[
			'tittle' => "Register",

		];
		return view('v_register');
	}

	public function saveRegister() {
		$request = service ('request');
		$data = [
			'fullname' => $request->getVar('fullname'),
			'email' => $request->getVar('email'),
			'password' => $request->getVar('password'),
		];
		//dd($data);
		$this->userModel->insert($data);
		return redirect()->to(base_url('/register'));
	}
}