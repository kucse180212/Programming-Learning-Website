@extends('layouts.user')
<div class="jumbotron my-4" style="width:80%; position:relative; left:100px" >
<h1 class="display-4"  >Click to see  the related document!</h1>
<a href="\python_doc\{{$webmatrial->id}}" class="btn btn-primary btn-lg" >Click to Enroll  !! </a>
</div>
<div  id="contentframe" style="position:relative; left:100px">
<iframe width="80%" height="700"  src="{{$webmatrial->video}}">
</iframe>

<div>
