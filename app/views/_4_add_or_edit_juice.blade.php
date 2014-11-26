@extends('_2_logout_bar')

@section('content')
  <div class="container">
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <?php
      if ($user_input_error){
        echo "<div class='alert alert-danger container'>" . $user_input_error_message . "</div>";
      }
    ?>

  	@yield('add_or_edit_juice_header')

    <!--Add juice form-->
    @yield('add_or_edit_juice_url')

    <br>
    {{ Form::label('title_label', 'Title')}}
    {{ Form::text('title', $title, array("class" => "form-control"))}}
    
 <br/>
    <?php 
      if ($image_file_name != null && $image_file_name != ""){ ?>
         <img class="img-thumbnail" src="/images/<?php echo $image_file_name.'.png'; ?> "  width=150>
         <?php   }   ?>



 <br/>
          {{ Form::label('title_Image', 'Choose image')}}
    <div class="row">
        <div class="col-md-4">
            <img class="img-responsive" src='/images/red_juice.png' alt="red"  width=150>
             {{ Form::label('image_file_name', 'Red')}}
                {{ Form::radio('image_file_name','red_juice') }}

        </div>
        <div class="col-md-4">
                <img class="img-responsive" src='/images/orange_juice.png' alt="orange"  width=150>
                 {{ Form::label('image_file_name', 'Orange')}}
                    {{ Form::radio('image_file_name','orange_juice') }}

        </div>
        <div class="col-md-4">
            <img class="img-responsive" src='/images/green_juice.png' alt="green"  width=150>
             {{ Form::label('image_file_name', 'Green')}}
                {{ Form::radio('image_file_name','green_juice') }}

        </div>
    </div>
    <div class="row">
            <div class="col-md-6">
                 {{ Form::label('day_label', 'Day')}}

                    {{ Form::select('day', array(
                    'Monday' => 'Monday',
                    'Tuesday' => 'Tuesday',
                    'Wednesday' => 'Wednesday',
                    'Thursday' => 'Thursday',
                    'Friday' => 'Friday',
                    'Saturday' => 'Saturday',
                    'Sunday' => 'Sunday',
                     ),null,array(
                     "class"=>"form-control"
                     )) }}

            </div>
             <div class="col-md-6">
                 {{ Form::label('day_part', 'When during the Day')}}

                        {{ Form::select('day_part', array(
                        'Morning' => 'Morning',
                        'Afternoon' => 'Afternoon',
                        'Evening' => 'Evening',
                         ),null,array(
                         "class"=>"form-control"
                         )) }}
            </div>
    </div>



         <br>
  	{{ Form::label('ingredients_label', 'What to Use')}}
    <br>
    {{ Form::textarea('ingredients', $ingredients, array("class" => "form-control"))}}
    <br>
  	{{ Form::label('directions_label', 'Directions')}}
    <br>
    {{ Form::textarea('directions', $directions, array("class" => "form-control"))}}

    <br>
	 @yield('add_or_edit_juice_submit')

  	{{ Form::close() }}
  	</div>
  	<div class="col-md-2"></div>
   </div>
     </div>
@stop