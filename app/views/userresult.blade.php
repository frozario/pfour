@extends('templates.template')

@section('pagetitle')

	<h2>
		Here are your fake users!
		</h2>

@stop

@section('body')

<?php
		
		$faker = Faker\Factory::create(); 
		
		for ($i=0; $i < $qty; $i++){

			$users[$i]['name'] = $faker->name;

			if (isset($address)){

				$users[$i]['streetAddress'] = $faker->streetAddress;
				$add2 = $faker->city.' '.$faker->stateAbbr.' '.$faker->postcode;
				$users[$i]['cityStateZip'] = $add2;

			}

			if (isset($phonenumber)){

				$users[$i]['phone'] = $faker->phonenumber;
			}

			if (isset($birthdate)){

				$users[$i]['birthdate'] = $faker->date($format = 'm-d-Y', $max='now-800');
			}

			if (isset($email)){

				$users[$i]['email'] = $faker->email;
			}
		}
		
?>
		


     <div class="result">
 		

    	 @foreach ($users as $user)
    	 	<p>
    			@foreach ($user as $att)
    		 	{{ $att }}

    		 	<br/>

    		 	@endforeach

    		</p>

    	 @endforeach
    	 
     </div>
		
@stop