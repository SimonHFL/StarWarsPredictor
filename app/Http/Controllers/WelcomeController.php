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

		$ageGroups = [
			1  => '18-29',
			2  => '30-44',
			3  => '45-60',
			4 => '> 60',
		];

		$incomeGroups = [
			1  => '$0 - $24,999',
			2  => '$25,000 - $49,999',
			3  => '$50,000 - $99,999',
			4  => '$100,000 - $149,999',
			5 => '$150,000+',
		];

		$educationGroups = [
			0  => 'Less than high school degree',
			1  => 'High school degree',
			2  => 'Some college or Associate degree',
			3  => 'Bachelor degree',
			4  => 'Graduate degree',
		];

		$locationGroups = [
			0  => 'South Atlantic',
			1  => 'West South Central',
			2  => 'West North Central',
			3  => 'Middle Atlantic',
			4  => 'East North Central',
			5  => 'Pacific',
			6  => 'Mountain',
			7  => 'New England',
			8 => 'East South Central',
		];

		$groups = ['ageGroups' => $ageGroups, 'incomeGroups' => $incomeGroups, 'educationGroups' => $educationGroups, 'locationGroups' => $locationGroups];


		return view('welcome')->with('groups', $groups);
	}

	public function search(Request $request)
	{
		$ageGroups = [
			1  => '18-29',
			2  => '30-44',
			3  => '45-60',
			4 => '> 60',
		];

		$incomeGroups = [
			1  => '$0 - $24,999',
			2  => '$25,000 - $49,999',
			3  => '$50,000 - $99,999',
			4  => '$100,000 - $149,999',
			5 => '$150,000+',
		];

		$educationGroups = [
			0  => 'Less than high school degree',
			1  => 'High school degree',
			2  => 'Some college or Associate degree',
			3  => 'Bachelor degree',
			4  => 'Graduate degree',
		];

		$locationGroups = [
			0  => 'South Atlantic',
			1  => 'West South Central',
			2  => 'West North Central',
			3  => 'Middle Atlantic',
			4  => 'East North Central',
			5  => 'Pacific',
			6  => 'Mountain',
			7  => 'New England',
			8 => 'East South Central',
		];

		$groups = ['ageGroups' => $ageGroups, 'incomeGroups' => $incomeGroups, 'educationGroups' => $educationGroups, 'locationGroups' => $locationGroups];


		$seenSW = $request->get('seenSW');
		$isStarTrekFan = $request->get('isStarTrekFan');
		$gender = $request->get('gender');
		$age = $request->get('age');
		$income = $request->get('income');
		$education = $request->get('education');
		$location = $request->get('location');


		$results['SeenSW'] = $seenSW;
		$results['IsStarTrekFan'] = $isStarTrekFan;
		$results['Gender'] = $gender;
		$results['Age'] = $age;
		$results['Income'] = $income;
		$results['Education'] = $education;
		$results['Location'] = $location;

		$resultsJson = json_encode($results);


		$path = app_path() . "/domain/test.py " . escapeshellarg($resultsJson);

		$probability = shell_exec("python " . $path); // add  2>&1 to get errors

		$probabilityPercentage = $probability * 100 . "%";
		$status = ((float) $probability) > 0.5;

		return view('welcome')->with('status', $status)->with('groups', $groups)->with('probabilityPercentage', $probabilityPercentage);
	}

}
