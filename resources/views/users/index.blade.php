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
              <h3 class="mb-0">Employees List</h3>
              <br>
              <a data-bs-toggle="modal" data-bs-target="#send" class="btn btn-primary btn-sm ml-0 text-white">Send Notification for all <i class="bi bi-bell-fill"></i></a>

            </div>
            <div class="table-responsive">
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
                          <div class="media align-items-center">
                            <a href="{{route('profile',$user->id)}}" class="avatar rounded-circle mr-3">
                              <img class="img-icon" alt="Image placeholder" src="{{$user->photo ? asset('storage/' . $user->photo) : 'https://cdn.iconscout.com/icon/free/png-256/laptop-user-1-1179329.png'}}">
                            </a>
                            <div class="media-body">
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
                            <span class="badge text-warning badge-dot mr-4">
                              <i class="bg-{{$user->status == null ? 'warning' : 'success'}}"></i> {{$user->status == null ? 'pendding' : 'approved'}}
                            </span>
                          </td>
                        <td>
                          <div class="d-flex align-items-center">
                            <span class="mr-2">%{{floatval($user->task_rate())}}</span>
                            <div>
                              <div class="progress">
                                <div class="progress-bar bg-{{$user->task_rate() < 30 ? 'danger' : ($user->task_rate() <= 65 ? 'warning' : 'success')}}" role="progressbar" aria-valuenow="{{floatval($user->task_rate())}}" aria-valuemin="0" aria-valuemax="100" style="width: {{floatval($user->task_rate())}}%;"></div>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="text-right">
                           <form action="{{route('attend_user')}}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <button type="submit" class="btn btn-primary btn-sm">Attending <i class="bi bi-calendar-check-fill"></i></button>
                           </form>
                          <div class="dropdown">
                            <a style="color: #000!important;" class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                              <a class="dropdown-item" href="{{route('profile', $user->id)}}">Profile</a>
                              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#withdraw{{$user->id}}" href="#">Withdraw</a>
                              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#discount{{$user->id}}" href="#">Discount</a>
                              @if (Auth::user()->role == 1)
                              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#delete{{$user->id}}" href="#">Delete</a>
                              @endif
                            </div>
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
              <h3 class="mb-0">Employees Attending and leaving</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush dataTable">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Attending</th>
                        <th scope="col">leaving</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody> 

                      @foreach ($user_attendings as $user)
                      <tr>
                        <th scope="row">
                          <div class="media align-items-center">
                            <a href="#" class="avatar rounded-circle mr-3">
                              <img class="img-icon" alt="Image placeholder" src="{{$user->user->photo ? asset('storage/' . $user->user->photo) : 'https://cdn.iconscout.com/icon/free/png-256/laptop-user-1-1179329.png'}}">
                            </a>
                            <div class="media-body">
                              <span class="mb-0 text-sm">{{$user->user->name}}</span>
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
 
                        <td class="text-right">
                            <div data-bs-toggle="modal" data-bs-target="#edit{{$user->id}}" class="btn btn-dark btn-sm">change <i class="bi bi-pen"></i></div>
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

      $('.dataTable').DataTable();
      setInterval(function(){
        
        $('.previous a').html('<i class="bi bi-skip-backward"></i>');
      $('.next a').html('<i class="bi bi-skip-forward"></i>');
      },500);
    
</script>
@endsection