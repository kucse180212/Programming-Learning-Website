@extends('layouts.user')

<div style="font-weight: bold" id="quiz-time-left"></div>

<div id="time">

</div>



 

<div class="container">
<form action= "/submit_all_answer/{{$timer->id}}/{{$questionaire[0]->title}}" method="post" name="quiz" id="quiz_form" onsubmit="myFunction()" >	
@csrf									
		<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<span>GET 80% MARKS MCQ Questions TO  PASS </span>
		</li>
    	</ol>
		@foreach ($questionaire as $key1=>$users)
		<h2> {{$users->title ?? ''}} 's MCQ Questions </h2>
			 <div class="row ">
			 <div class="col-lg-12 col-md-12 col-12">
			 @foreach($users->questions_all as $key2=> $question)
			        
					<p class="question" ><strong>Q{{$key1 +$key2 }}.{{$question->question ?? ''}}</strong></p>	
					@foreach($question->answers_all as $answer)
					<label for="answer{{$answer->id}}">
					<li class="list-group-item">
					<input type="radio" name="response[{{$key1+$key2}}][answer_id]" value="{{$answer->id}}" id="answer{{$answer->id ?? ''}}"> 
					{{$answer->answer ?? ''}}
					<input type="hidden" name="response[{{$key1+$key2}}][question_id]" value="{{$question->id}}"> 
					</li>  
					</label>             
                    @endforeach 
            
			@endforeach
			</div> 
			</div>			
		@endforeach
		<button type="submit" class="btn btn-outline-dark ">submit answer</button>
		</div>

<script>
 function myFunction() {
  localStorage.clear();

   
 }
    function startTimer(duration, display) {
var timer = duration, minutes, seconds;

setInterval(function () {
    minutes = parseInt(timer / 60, 10);
    seconds = parseInt(timer % 60, 10);
	p=1;

    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;

    display.textContent = minutes + " " + " " + seconds;

    if (--timer < 0) {
      setTimeout('document.quiz.submit()',1);
      
    }
  console.log(parseInt(seconds))
  window.localStorage.setItem("seconds",seconds)
  window.localStorage.setItem("p",p)
  window.localStorage.setItem("minutes",minutes)

 
}, 1000);
}

window.onload = function () {
  sec  = parseInt(window.localStorage.getItem("seconds"))
  min = parseInt(window.localStorage.getItem("minutes"))
  p = parseInt(window.localStorage.getItem("p"))
 
  if(parseInt(min*sec*p)){
    var fiveMinutes = (parseInt(min*60)+sec);
  }else{
    var fiveMinutes = 60 * {{$questionaire[0]->allowed_time}};
  }
	
  display = document.querySelector('#time');
  startTimer(fiveMinutes, display);  
};
</script>
		
