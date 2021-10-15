@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
               
   <h5 class="mb-2">Tasks</h5>



            <form  class="form_task" action="{{route('add_task')}}" method="post">
              @csrf  
  <div class="container">
    <div class="row box_users" >
      No Emp Selected
    </div>
  </div>
    <div class="row">
   <div class="col-md-5"> 
    <div class="card card-white">
        <div class="card-body">

          <h5 class="mb-2">Task Name</h5>
          <input required="true" type="hidden"  class="validate"  >
                <input  required type="text" class="form-control add-task " name="taskname" placeholder="Task Name">
                <h5 class="mb-2">Task Description</h5>
                <textarea required  class="form-control add-task " name="taskdesc" placeholder="New Description"></textarea>
                <h5 class="mb-2">Task End At</h5>
                <input required  class="form-control" type="datetime-local"  name="endtime">
                
                <h5 class="mb-2">Task Points</h5>
                <input required type="number" class="form-control add-task " name="taskpoints" placeholder="Task Points">
       
            <div class="todo-list">
               
                
                <input type="submit" style="display:none" class="form-control add-task" value="Add To">
           

            </div>

        </div>
    </div>
    

    </div> 
    
   <div class="col-md-7">
    <div class="card card-white">
       
        



        <h5 class="mb-2">Employees</h5>
        <!-- Table -->
         <div class="row">
  
          <div class="col">
            <div style=" padding: 10px; " class="card shadow">
              <div class="card-header border-0">
                <h3 class="mb-0">Employees List</h3>
              </div>
              <div class="table-responsive">
                <table class="table align-items-center table-flush dataTable">
                  <thead class="thead-light">
                      <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Job Title</th>
                          
                        </tr>
                      </thead>
                      <tbody>
  
                        @foreach ($users as $user)
                        <tr class="user_click">
                          <input type="hidden" value="{{$user->id}}" class="userid">
                          <input type="hidden" value="{{$user->name}}" class="username">
                          <th scope="row">
                            <div class="media align-items-center">
                              <a href="#" class="avatar rounded-circle mr-3">
                                <img class="img-icon" alt="Image placeholder" src="{{$user->photo ? asset('storage/' . $user->photo) : 'https://cdn.iconscout.com/icon/free/png-256/laptop-user-1-1179329.png'}}">
                              </a>
                              <div class="media-body">
                                <span class="mb-0 text-sm">{{$user->name}}</span>
                              </div>
                            </div>
                          </th>
                      
                          <td>
                            <div class="avatar-group">
                                 {{$user->job_title}}
                            </div>
                          </td>
                          
                          
                        </tr>
                        @endforeach
         
  
                        
  
  
                  </tbody>
                </table>
              </div>
   
            </div>
          </div>
  
          
  
        </div>










    </div>   
    </div>
</div>
</form>











    </div>
</div>
@endsection


@section('scripts')
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js" integrity="sha512-h9kKZlwV1xrIcr2LwAPZhjlkx+x62mNwuQK5PAu9d3D+JXMNlGx8akZbqpXvp0vA54rz+DrqYVrzUGDMhwKmwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
<script type="text/javascript" src="{{asset('js/tasks.js')}}"></script>
<script>
      $('.dataTable').DataTable();
      setInterval(function(){
        $('.previous a').html('<i class="bi bi-skip-backward"></i>');
      $('.next a').html('<i class="bi bi-skip-forward"></i>');
      },500);
</script>
@endsection








           