<x-app-layout>

  <!-- Page Content -->
  <div class="container-fluid">

    <x-slot name="header">
    <div class="jumbotron my-4">
      <h1 class="display-3">A Warm Welcome!</h1>
      <p class="lead">WANT TO CREATE QUESTION FOR THE MAIN EXAM CLICK BELOW</p>
      <a href="/create_questionaires/python" class="btn btn-primary btn-lg">PYTHON </a>
      <a href="/create_questionaires/java" class="btn btn-primary btn-lg">  JAVA  </a>
      <a href="/create_questionaires/c_programming" class="btn btn-primary btn-lg">C PROGRAMMING</a>
      <a href="/create_questionaires/android" class="btn btn-primary btn-lg">ANDROID</a>
      </div>

      <div class="jumbotron my-4">
      <h1 class="display-3">CREATE NEW QUESTIONARIES</h1>
      <p class="lead">create different question of different language and topics.</p>
      <a href="\create_questionaries" class="btn btn-primary btn-lg">click to action!</a>
      </div>

      </x-slot>

  </div>
  </x-app-layout>
 
