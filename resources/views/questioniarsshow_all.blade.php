<x-app-layout>

<div class="container-fluid">

<x-slot name="header">


<div class="jumbotron my-3" >
      <h1 class="display-3" >Add Question FOR {{$questionaire->title}}</h1>
      
</div>

<!-- <a href="https://www.w3schools.com">Visit W3Schools</a> -->

 

<div class="container-fluid">
  <form action= "{{route ( 'addquestion_all' , [$questionaire->id] )}}" method="GET">
    <div class="form-group">
      <label for="question">Question:</label>
      <input name="question"
            type="text" class="form-control" aria-describedby="questionhelp" id="title" placeholder="Enter Title" >
      <small id="questionhelp" class="form-text ">Ask simple and to the point question </small>
    </div>
   <div class = "from-group">
      <fieldset>
        <div>
           <div class="form-group">
               <label for="answer1">choice 1:</label>
                   <input  name="answer1"
                           type="text" class="form-control" id="language" 
                           placeholder="Enter choice 1" >
                  
            </div>

        </div>


        <div>
           <div class="form-group">
               <label for="answer2">choice 2:</label>
                   <input  name="answer2"
                           type="text" class="form-control" id="language" 
                           placeholder="Enter choice 2" >
                    <small id="titlehelp" class="form-text text-muted">Give your questioniar a title </small>
            </div>

        </div>


        <div>
           <div class="form-group">
               <label for="answer3">choice 3:</label>
                   <input  name="answer3"
                           type="text" class="form-control" id="language" 
                           placeholder="Enter choice 3 " >
                    <small id="titlehelp" class="form-text text-muted">Give your questioniar a title </small>
            </div>

        </div>

        <div>
           <div class="form-group">
               <label for="right_answer">answer:</label>
                   <input  name="right_answer"
                           type="text" class="form-control" id="language" 
                           placeholder="Enter the right anser " >
                    <small id="titlehelp" class="form-text text-muted">Give your questioniar a title </small>
            </div>

        </div>
      </fieldset>

    <button type="submit" class="btn btn-primary"> Add Question</button>
    </form>
</div>

</x-slot>
<div class="container-fluid">
   <div class="row justify-content-center">
       <div class="col-md-8">
          <div class="card">
            <div class="card-header">{{$questionaire->title}} </div> 
          </div>
          @foreach($questionaire->questions_all as $question)
          <div class="card">
            <div class="card-header">{{$question->question}} </div> 

            <div class ="card-body">
             <ul class = list-group>
             @foreach($question->answers_all as $answer)
                 <li class="list-group-item">{{$answer->answer}}</li>
               @endforeach
             <ul>
            </div>
          </div>
          @endforeach

       </div>  
    </div>
  </div>          

            
  </x-app-layout>