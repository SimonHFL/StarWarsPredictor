<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}

	public function search(Request $request)
	{
		$cvr = $request->get('cvr');



		$path = app_path() . "/domain/test.py " . $cvr;
print($path);
		$output = shell_exec("python " . $path . " 2>&1");
print($output);exit;
		$status = $output == 1;



		$status = true;

		return view('welcome')->with('status', $status)->with('cvr', $cvr);
	}

}
