<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('before'=> 'guest', function()
{
	return View::make('homepage');
}));


Route::post('/', array('before'=> 'csrf', function()
{
	$email = Input::get('email');
	$password = Input::get('password');

	if (Auth::attempt(array('email' => $email, 'password' => $password), true)){
		$user= User::where("email", "=", $email)->first();

		return Redirect::intended('/overview')->with('flash_message', 'Welcome Back '. $user->name .'!');
	} else {
		return Redirect::to('/')->with('flash_message', 'Login unsuccessful: Please edit your email or password field(s).');
	}
}));

Route::get('/log-out', array('before'=>'auth', function()
{
	Auth::logout();

	return Redirect::to('/');
}));

Route::get('/sign-up', array('before'=>'guest', function()
{
	return View::make('sign_up');
}));

Route::post('/sign-up', array('before' => 'csrf', function()
{

	$user = new User();
	$user->name = Input::get('name');
	$user->email = Input::get('email');
	$user->password = Hash::make(Input::get('password'));

	$user_input_error = false;
	if ($user->name === '') {
		$user_input_error = true;
	}
	elseif ($user->email === '') {
		$user_input_error = true;
	}
	elseif ($user->password === '') {
		$user_input_error = true;
	}

	if ($user_input_error){
		return Redirect::to('/sign-up')->with('flash_message', 'Sign up failed. Please try again.');
	}

	try{
		$user->save();
	} catch (Exception $e){
		return Redirect::to('/sign-up')->with('flash_message', 'Sign up failed. Please try again.');
	}

	Auth::login($user, true);

	return Redirect::to('/overview');

	//Need to do the following::::
	//Verify email nonempty
	//Verify password nonempty
	//Verify email unique
	//Verify email valid format (includes @, .)
	//Verify passwords match
	//Verify passwords >6 characters
	
}));

Route::get('/add-juice', array('before' => 'auth', function()
{
	return View::make('add_juice')
		->with('user_input_error', false)
		->with('user_input_error_message', '')	
		->with('title', '')
		->with('image_file_name', '')
		->with('day', '')
		->with('day_part', '')
		->with('ingredients', '')
		->with('directions', '')
		;
}));

Route::post('/add-juice', array('before' => 'auth', function()
{
	$user_input_error = false;
	$user_input_error_message = "";
	$title = trim(Input::get('title'));

	//Move file to /public/images & Store file name in database
	$image_file_name = trim(Input::get('image_file_name'));

	$ingredients = trim(Input::get('ingredients'));
	$directions = trim(Input::get('directions'));
	$day= trim(Input::get('day'));
	$day_part= trim(Input::get('day_part'));


	//Form validation
	if ($title === '') {
		$user_input_error = true;
		$user_input_error_message = "Your Juice needs a title!";
	}
	elseif ($ingredients === '') {
		$user_input_error = true;
		$user_input_error_message = "Your Juice needs ingredients!";
	}
	elseif ($directions === '') {
		$user_input_error = true;
		$user_input_error_message = "Your Juice needs directions!";
	}

	//Get tag names

	if ($user_input_error){

		return View::make('add-juice')
			->with('user_input_error', $user_input_error)
			->with('user_input_error_message', $user_input_error_message)	
			->with('title', $title)
			->with('day', $day)
			->with('day_part', $day_part)
			->with('ingredients', $ingredients)
			->with('image_file_name', $image_file_name)
			->with('directions', $directions)
			;
	} else {

		$user = Auth::user();

        $juice = new Juice();
        $juice->title = $title;
        $juice->image_file_name = $image_file_name;
        $juice->ingredients = $ingredients;
        $juice->day = $day;
        $juice->day_part = $day_part;
        $juice->directions = $directions;


		$juice->user()->associate($user);
        $juice->save();



		return Redirect::to('/overview');
	}

	
}));

Route::get('/delete-juice/{id}', array('before' => 'auth|editor', function($id)
{
	
	$juice = Juice::findOrFail($id);
	//Detach all tags
    $juice->delete();

	return Redirect::to('/overview');

}));

Route::get('/edit-juice/{id}', array('before' => 'auth|editor', function($id)
{
	//Get juice from database by id
	$juice = Juice::findOrFail($id);

	//Get tag names

	return View::make('edit_juice')
		->with('user_input_error', false)
		->with('user_input_error_message', '')	
		->with('title', $juice->title)
		->with('day', $juice->day)
		->with('day_part', $juice->day_part)
		->with('image_file_name', $juice->image_file_name)
		->with('ingredients', $juice->ingredients)
		->with('directions', $juice->directions)

		->with('id', $id)
		;	

}));

Route::post('/edit-juice/{id}', array('before' => 'auth|editor', function($id)
{
	$user_input_error = false;
	$user_input_error_message = "";
	$title = trim(Input::get('title'));
	$image_file_name = trim(Input::get('image_file_name'));

	if ($image_file_name == ""){
		$juice = Juice::findOrFail($id);
		$image_file_name = $juice->image_file_name;
	}

	$ingredients = trim(Input::get('ingredients'));
	$directions = trim(Input::get('directions'));
	$day = trim(Input::get('day'));
	$day_part = trim(Input::get('day_part'));

	$user_made_this = Input::get('user_made_this');


	//Form validation
	if ($title === '') {
		$user_input_error = true;
		$user_input_error_message = "Your Juice needs a title!";
	}
	elseif ($ingredients === '') {
		$user_input_error = true;
		$user_input_error_message = "Your Juice needs ingredients!";
	}
	elseif ($directions === '') {
		$user_input_error = true;
		$user_input_error_message = "Your Juice needs directions!";
	}

	if ($user_input_error){
		return View::make('edit_juice')
			->with('user_input_error', $user_input_error)
			->with('user_input_error_message', $user_input_error_message)	
			->with('title', $title)
			->with('image_file_name', $image_file_name)
			->with('day', $day)
			->with('day_part', $day_part)
			->with('ingredients', $ingredients)
			->with('directions', $directions)
			->with('id', $id)
			;
	} else {
		//DIFFERENT FROM ADD::::
		$juice = Juice::findOrFail($id);

        $juice->title = $title;

        $juice->image_file_name = $image_file_name;

        $juice->ingredients = $ingredients;
        $juice->directions = $directions;
        $juice->day = $day;
        $juice->day_part = $day_part;


		$juice->save();



		return Redirect::to('/overview');
	}
}));

Route::get('/overview', array('before' => 'auth', function()
{
    $juices = get_logged_in_users_juices();
    return View::make('overview')
        ->with('juices', $juices);

}));

Route::get('/view-juice/{id}', array('before' => 'auth|editor', function($id)
{
	$juices = get_logged_in_users_juices();
	$selected_juice = Juice::findOrFail($id);
	return View::make('view_juice')
			->with('selected_juice', $selected_juice)
			->with('juices', $juices);
	

}));





function get_logged_in_users_juices(){
	$user = Auth::user();
	return Juice::where('user_id', '=', $user->id)->get();
}

Route::get('/debug', function() {

	echo '<pre>';

	echo '<h1>environment.php</h1>';
	$path   = base_path().'/environment.php';

	try {
		$contents = 'Contents: '.File::getRequire($path);
		$exists = 'Yes';
	}
	catch (Exception $e) {
		$exists = 'No. Defaulting to `production`';
		$contents = '';
	}

	echo "Checking for: ".$path.'<br>';
	echo 'Exists: '.$exists.'<br>';
	echo $contents;
	echo '<br>';

	echo '<h1>Environment</h1>';
	echo App::environment().'</h1>';

	echo '<h1>Debugging?</h1>';
	if(Config::get('app.debug')) echo "Yes"; else echo "No";

	echo '<h1>Database Config</h1>';
	print_r(Config::get('database.connections.mysql'));

	echo '<h1>Test Database Connection</h1>';
	try {
		$results = DB::select('SHOW DATABASES;');
		echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
		echo "<br><br>Your Databases:<br><br>";
		print_r($results);
	} 
	catch (Exception $e) {
		echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
	}

	echo '</pre>';

});