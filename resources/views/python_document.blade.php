@extends('layouts.user')
<div class="jumbotron my-4" style="width:80%; position:relative; left:100px" >
<h1 class="display-4"  >Click give the exam document!</h1>
<a href="\python_t1\{{$webmatrial->questionaire_id}}" class="btn btn-primary btn-lg">Click to go back!</a>
</div>
<div class="jumbotron my-4" style="width:80%; position:relative; left:100px" >
<h1 class="display-4"  >Click to see  the related document!</h1>
</div>
<div  id="contentframe" style="position:relative; left:100px">
<iframe width="80%" height="700"  src="/document/{{$webmatrial->document}}">
</iframe>

<div>
