<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController{

	public function showHome(){
		return view("home");
	}
}