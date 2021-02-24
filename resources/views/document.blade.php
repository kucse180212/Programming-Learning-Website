<x-app-layout>



<div class="container-fluid">

<x-slot name="header">

<div class="jumbotron my-4" >
      <h1 class="display-3">Create Questionaire</h1>      
</div> 
<div class="jumbotron my-4">
<form action= "{{route ( 'adddocument' , [$questionaire->id] )}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="document"><br>
    <br>
    <div class="input-group input-group-lg">
  <input type="string" class="form-control"  name="video" placeholder="Enter Utube link"aria-label="Large" aria-describedby="inputGroup-sizing-sm">
 </div>
    <button type="submit" class="btn btn-primary"> Submit</button>
    </form>


</form>
</div>




    
</x-slot>
</div>

</x-app-layout>