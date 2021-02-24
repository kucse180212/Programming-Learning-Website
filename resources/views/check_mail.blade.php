@extends('layouts.user')

<div class="container-fluid">

    <div class="jumbotron my-4">
      <h1 class="display-3">Congratulation you have passed</h1>
    </div>
    <div class="jumbotron my-4">
  <form action="\check_mail\{{$questionaire->title}}" method="post">
    @csrf
    <div class="input-group input-group-lg">
  <input type="email" class="form-control"  name="email" placeholder="Enter you email" >
    </div>
    <button type="submit" class="btn btn-primary btn-lg"> Submit </button>
    </form>
    </div>

</div>