@extends('template')

@section('pagetitle')

<h2>
	Here is your text!
</h2>

@stop

@section('body')

<?php
		$generator = new Badcow\LoremIpsum\Generator(); 
		
		if ($paragraphsize == "small"){
			$generator->setParagraphMean(5);
			$generator->setSentenceMean(16);
		}
		elseif ($paragraphsize == "mid"){ 
			$generator->setParagraphMean(7);
			$generator->setSentenceMean(21);
		}
		else{
			$generator->setParagraphMean(9);
			$generator->setSentenceMean(26);
		}

		$paragraphs = $generator->getParagraphs($qty); 
    ?>

    <div class="result">

    	@foreach ($paragraphs as $paragraph)

    		<p>
    			{{ $paragraph }}
    		</p>

    	@endforeach

    </div>

@stop