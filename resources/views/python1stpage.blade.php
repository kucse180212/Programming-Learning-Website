@extends('layouts.user')
<script>
var msg='{{Session::get('alert')}}';
var exist='{{Session::has('alert')}}';
if(exist){
  alert(msg);
}
</script>
<div class="jumbotron my-4" >
      <h1 class="display-3">click below to  participate in the programme</h1>
</div>
<div class="jumbotron my-4" >
  <div class="container" >
    <div class="row ">
    @foreach ($questionaire as $users)
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card">  
           <div class="card-header">{{$users->title ?? ''}}</div>
              <div class="card-body">
                <p >it is the basic of all programming language try to compelete this from the first.</p>
               </div>
               <div class="card-footer">
               <a href="\python_video\{{$users->id ?? ''}}" class="boxed_btn">Click to InROLL!</a>
              </div>
        </div>
    </div>
      
      @endforeach

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card">  
           <div class="card-header">WANT TO PARTICIPATE IN THE EXAM</div>
              <div class="card-body">
                <p >it is the basic of all programming language try to compelete this from the first.</p>
               </div>
               <div class="card-footer">
               <a href="\python_basic\{{$users->language ?? ''}}" class="boxed_btn">Click to InROLL!</a>
              </div>
        </div>
    </div>



    </div>  
</div>

     




