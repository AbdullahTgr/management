@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
               
   <h2 class="mb-2">Employees</h2>
      <!-- Table -->
       <div class="row">

        <div class="col-12">
          <div style=" padding: 10px; " class="card shadow">
            <div class="card-header border-0">
              <h4 class="mb-0">Employees List</h4>
              <br>
              <a data-bs-toggle="modal" data-bs-target="#send" class="btn btn-primary btn-sm ml-0 text-white">Send Notification for all <i class="bi bi-bell-fill"></i></a>

            </div>
            <div class="table-responsive" style=" min-height: 400px; ">
              <table class="table align-items-center table-flush dataTable">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Job Title</th>
                        <th scope="col">Status</th> 
                        <th scope="col">Task Rate</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
               
                      @foreach ($users as $user)
                      
                      <tr>
                        <th scope="row">
                          <div class="d-flex px-2 py-1">
                            <a href="{{route('profile',$user->id)}}" class="avatar rounded-circle mr-3">
                              <img class="img-icon" alt="Image placeholder" src="{{$user->photo ? asset('storage/' . $user->photo) : 'https://cdn.iconscout.com/icon/free/png-256/laptop-user-1-1179329.png'}}">
                            </a>
                            <div class="d-flex flex-column justify-content-center">
                              <a href="{{route('profile',$user->id)}}" class="mb-0 text-sm">{{$user->name}}</a>
                            </div>
                          </div>
                        </th>
                        <td>
                          ${{$user->salary()}}
                        </td>
                    
                        <td>
                          <div class="avatar-group">
                               {{$user->job_title}}
                          </div>
                        </td>
                        <td>
                            <span class="badge bg-{{$user->status == 1 ? 'success' : 'warning'}} mr-4">
                              <i class="bi bi-"></i> {{$user->status == null ? 'pendding' : 'approved'}}
                            </span>
                          </td>
                        <td>
                          <div class="d-flex align-items-center">
                             <div>
                              <div class="progress-wrapper w-75 mx-auto">
                                <div class="progress-info">
                                  <div class="progress-percentage">
                                    <span class="text-xs font-weight-bold">{{floatval($user->task_rate())}}%</span>
                                  </div>
                                </div>
                                <div class="progress">
                                  <div class="progress-bar bg-gradient-{{$user->task_rate() < 30 ? 'danger' : ($user->task_rate() <= 65 ? 'warning' : 'success')}} w-{{floatval($user->task_rate())}}" role="progressbar" aria-valuenow="{{floatval($user->task_rate())}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </div>
                              
                            </div>
                          </div>
                        </td>
                        <td class="text-right">
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              Options
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li>
                                <form action="{{route('attend_user')}}" method="POST">
                                  @csrf
                                  <input type="hidden" name="user_id" value="{{$user->id}}">
                                  <button type="submit" class="dropdown-item" href="#" >Attending <i class="bi bi-calendar-check-fill" style=" float: right; "></i></button>
                                 </form>
                              </li>
                              <li><a class="dropdown-item" href="{{route('profile', $user->id)}}">Profile</a></li>
                              <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#withdraw{{$user->id}}" href="#">Withdraw</a></li>
                              <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#discount{{$user->id}}" href="#">Discount</a></li>
                              <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#bouns{{$user->id}}" href="#">Bouns</a></li>
                              @if (Auth::user()->role == 1)
                              <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#delete{{$user->id}}" href="#">Delete</a></li>
                              @endif
                             </ul>
                          </div>
 
                        </td>
                      </tr>
                      @endforeach
       

                      


                </tbody>
              </table>
            </div>
 
          </div>
        </div>



        <div class="col-12">
          <div style=" padding: 10px; " class="card shadow">
            <div class="card-header border-0">
              <h4 class="mb-0">Employees Attending and leaving</h4>
            </div>
            <div class="table-responsive" style=" min-height: 400px; ">
              <table class="table align-items-center table-flush dataTable">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Attending</th>
                        <th scope="col">leaving</th>
                        <th scope="col">Hours</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody> 

                      @foreach ($user_attendings as $user)
                      <tr>
                        <th scope="row">
                          <div class="d-flex px-2 py-1">
                            <a href="{{route('profile',$user->user->id)}}" class="avatar rounded-circle mr-3">
                              <img class="img-icon" alt="Image placeholder" src="{{$user->user->photo ? asset('storage/' . $user->user->photo) : 'https://cdn.iconscout.com/icon/free/png-256/laptop-user-1-1179329.png'}}">
                            </a>
                            <div class="d-flex flex-column justify-content-center">
                              <a href="{{route('profile',$user->user->id)}}" class="mb-0 text-sm">{{$user->user->name}}</a>
                            </div>
                          </div>
                        </th>
                        <td>
                          <span style=" font-size: 12px; " class="badge bg-{{$user->come ? 'primary' : 'secondary'}}"><i class="bi bi-clock-fill"></i> {{$user->come ? \Carbon\Carbon::parse($user->come)->format('g:i A') : 'Not Comming yet'}}</span>
                        </td>
                    
                        <td>
                          <div class="avatar-group">
                            <span style=" font-size: 12px; " class="badge bg-{{$user->leave ? 'danger' : 'secondary'}}"><i class="bi bi-clock-fill"></i> {{$user->leave ? \Carbon\Carbon::parse($user->leave)->format('g:i A') : 'Not leaving yet'}}</span>
                          </div>
                        </td>
                        <td>
                          <div class="avatar-group">
                            @php
                                $time1 = new DateTime(\Carbon\Carbon::parse($user->come)->format('g:i'));
                                $time2 = new DateTime(\Carbon\Carbon::parse($user->leave)->format('g:i'));
                                $interval = $time1->diff($time2);
                            @endphp
                            <span style=" font-size: 12px; " class="badge bg-success"><i class="bi bi-clock-fill"></i> {{ $interval->format('%h:%i');}}</span>
                          </div>
                        </td>
 
                        <td class="text-right">
                            <div data-bs-toggle="modal" data-bs-target="#edit{{$user->id}}" class="btn btn-primary btn-sm">change <i class="bi bi-pen"></i></div>
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

@include('users.send',['all'=>1])

@forelse ($users as $user)
  @include('users.delete')
  @include('users.discount')
  @include('users.bouns')
  @include('users.withdraw')
@empty
@endforelse
@forelse ($user_attendings as $user)
    @include('users.edit_time')
@empty
@endforelse


@endsection


@section('scripts')
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js" integrity="sha512-h9kKZlwV1xrIcr2LwAPZhjlkx+x62mNwuQK5PAu9d3D+JXMNlGx8akZbqpXvp0vA54rz+DrqYVrzUGDMhwKmwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>

<script>
     
     $(document).on('keyup', '#discount', function(){
      $(this).parent().find('#after_salary').val(Number( $(this).parent().find('#current_salary').val()) - Number($(this).val()));
     });

     $(document).on('keyup', '#bouns', function(){
      $(this).parent().find('#bouns_after_salary').val(Number( $(this).parent().find('#bouns_current_salary').val()) + Number($(this).val()));
     });
 
      $('.dataTable').DataTable();
      setInterval(function(){
        
        $('.previous a').html('<i class="bi bi-skip-backward"></i>');
      $('.next a').html('<i class="bi bi-skip-forward"></i>');
      },500);
    
</script> 
@endsection