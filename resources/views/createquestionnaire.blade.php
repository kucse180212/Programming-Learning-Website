<x-app-layout>
<style>
.manu {
    width: 960px;
    margin: 60px auto;
    border: 1px solid #222;
    /* background-color: blue; */
    background-image: linear-gradient(yellow, #1222);
    border-radius: 6px;
    box-shadow: 0 1px 1px #777;
  }
  
  
  </style>

<div class="container-fluid">

<x-slot name="header">

<div class="jumbotron my-4" >
      <h1 class="display-3">Create Questionaire</h1>      
</div> 

<div class="jumbotron my-4">
  <form action="/questionaires" method="post">
  @csrf

  <div class="form-group">
    <label for="title">Title:</label><br>
    <select class="form-control" name="title" id="title">
    <option value="Basic">Basic</option>
    <option value="String">String</option>wait
    <option value="If-Else">If-Else</option>
    <option value="Loop">Loop</option>
    </select>
  </div>

    
    
          
    @error('title')
    <small class="text-danger">haven't fill the title</small>
    @enderror
    <div class="form-group">
      <label for="language">Language:</label><br>
      <select class="form-control" name="language" id="language">
    <option value="C">c_pragramming</option>
    <option value="Python">Python</option>
    <option value="Android">Android</option>
    <option value="java">java</option>
    
  </select> 
    </div>
    @error('language')
    <small class="text-danger">haven't fill the language</small>
    @enderror



    <button type="submit" class="btn btn-primary"> Create Questionnair</button>
  </form>
  </x-slot>
</div>

</x-app-layout>
