<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Templating extends BaseController
{
	public function index()
	{
		$data =[
			'tittle' => "Blog - Post",

		];
		return view('view_admin');
	}
}