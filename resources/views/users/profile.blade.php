@extends('layouts.app')

@section('content')
<style>
    .dataTables_length, .dataTables_filter, .dataTables_info
    {
        display: none;
    }
</style>
<div style=" max-width: 1315px; " class="container">
    <div class="">
        <form class="row" enctype="multipart/form-data" id="userForm">
        @csrf
        <input type="hidden" value="{{$user->id}}" name="user_id">
         <div class="col-md-6 border-right">
             <div class="row">
                 <div class="col-md-12">
             {{-- Start Image Upload --}}
             <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <div class="image-section">
                   <img id="userphoto" class="rounded-circle mt-5" width="150px" src="{{$user->photo ? asset('storage/' . $user->photo) : 'https://cdn.iconscout.com/icon/free/png-256/laptop-user-1-1179329.png'}}">
                   <label class="select-photo" for="photo"><i class="bi bi-camera"></i></label>
                  <input type="file"  accept="image/png, image/gif, image/jpeg"  oninput="userphoto.src=window.URL.createObjectURL(this.files[0])" name="photo" id="photo" style="display: none;">
                </div>
               <span class="font-weight-bold">{{$user->name}}</span>
               <span class="text-black-50">{{$user->job_title}}</span>
               <a href="#"  data-bs-toggle="modal" data-bs-target="#salaryHistory" class="text-success fw-bold">${{$user->salary()}}</a>
           

               {{-- Get User Commissions --}}

               @php
               $allincome=0;
           $commission=0;
           @endphp
                       @forelse ($user->finance() as $finance)
           
           @php
           $allincome+=$finance->commission;
           @endphp
                       @empty
                            {{'No Income Yet.'}}
                       @endforelse 
           
                        <div class="d-flex justify-content-between align-items-center mt-3 text-warning fw-bold"><span>Total User Income</span> </div>
           
           
                        <span class="badge bg-warning btn btn-primary"><h6 class="mb-1 mt-1 fw-bold"><h6 class="mb-1 mt-1 fw-bold">{{$allincome}}</h6></h6></span><br>
           
                        @if ( $allincome >= $user->settings()->target1 && $allincome<$user->settings()->target2 )
                           First Target  The Additional Commission Is : 
                            <h6 style="color:green">{{ $commission=$allincome*$user->settings()->commission1/100 }}</h6>
                        @else
           
                           @if ( $allincome >= $user->settings()->target2 && $allincome<$user->settings()->target3 )
                               Second Target  The Additional Commission Is : 
                               <h6 style="color:green">{{ $commission=$allincome*$user->settings()->commission2/100 }}</h6>
                           @else
                           
                               @if ( $allincome >= $user->settings()->target3  )
                                   Third Target The Additional Commission Is : 
                                   <h6 style="color:green">{{ $commission=$allincome*$user->settings()->commission3/100 }}</h6>
                               @else
                               
                               @endif
                           @endif
                        @endif
                        


{{-- End Of Get User Commissions --}}















               <p>${{$user->hourly_rate()}}/Hour </p>
               <hr>
               <div class="row">
                   <div class="col-md-12" style=" padding: 0; ">
                       <a class="btn btn-primary btn-sm ml-0 text-white" href="{{route('add',$user->id)}}">New Task <i class="bi bi-list-check"></i></a>
                   </div>
                   <div class="col-md-12" style=" padding: 0; ">
                       <a data-bs-toggle="modal" data-bs-target="#send" class="btn btn-primary btn-sm ml-0 text-white">Notify <i class="bi bi-bell-fill"></i></a>
                   </div>
               </div>
             </div>
             {{-- End Image Upload --}}
             {{-- Start Task Rate --}}
            <div class="align-items-center">
                <label for="">Task Rate</label>
               <span class="mr-2">%{{floatval($user->task_rate())}}</span>
               <div>
                 <div class="progress">
                   <div class="progress-bar bg-{{$user->task_rate() < 30 ? 'danger' : ($user->task_rate() <= 65 ? 'warning' : 'success')}}" role="progressbar" aria-valuenow="{{floatval($user->task_rate())}}" aria-valuemin="0" aria-valuemax="100" style="width: {{floatval($user->task_rate())}}%;"></div>
                 </div>
               </div>
             </div>
             {{-- End Task Rate --}}
             <hr>
                 </div>
                 <div class="col-md-12">
            {{-- Start User Attending --}}
                <h4 class="mb-1"> Attending and leaving</h4>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Day</th>
                            <th scope="col">Attending</th>
                            <th scope="col">leaving</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach ($user->attends() as $attend)
                            <tr>
                            <th scope="row">
                                <span style=" font-size: 12px; " class="badge bg-dark"><i class="bi bi-calendar2-day-fill"></i> {{$attend->come ? \Carbon\Carbon::parse($attend->come)->format('d/m/Y') : 'Not Comming yet'}}</span>
                            </th>
                            <td>
                                <span style=" font-size: 12px; " class="badge bg-{{$attend->come ? 'primary' : 'secondary'}}"><i class="bi bi-clock-fill"></i> {{$attend->come ? \Carbon\Carbon::parse($attend->come)->format('g:i A') : 'Not Comming yet'}}</span>
                            </td>
                        
                            <td>
                                <div class="avatar-group">
                                <span style=" font-size: 12px; " class="badge bg-{{$attend->leave ? 'danger' : 'secondary'}}"><i class="bi bi-clock-fill"></i> {{$attend->leave ? \Carbon\Carbon::parse($attend->leave)->format('g:i A') : 'Not leaving yet'}}</span>
                                </div>
                            </td>
                            </tr>
                            @endforeach
                    </tbody>
                    </table>
            </div>
            {{-- End User Attending --}}
                 </div>
                 <div class="col-md-12">
                    <div class="p-3 py-5">
        
                       
        
                        <div class="d-flex justify-content-between align-items-center mt-3 text-warning fw-bold"><span>Incomplete Tasks</span> </div>
                        <hr>
                         <div class="col-md-12">
                            <ol class="list-group list-group-numbered">
                             @forelse ($user->incomplete_tasks() as $task)
                             <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class=" w-100 justify-content-between">
                                    <small style="font-size: 11px;padding: 5px;font-weight: bold;color: #878080;"><i class="bi bi-calendar2-day-fill"></i> {{\Carbon\Carbon::parse($task->end_at)->format('y/m/d')}} <i class="bi bi-clock-fill"></i> {{\Carbon\Carbon::parse($task->end_at)->format('g:i A')}}</small>
                                    <h6 class="mb-1 mt-1 fw-bold">{{$task->name}}</h6>
                                </div>
                                  {{mb_substr($task->description,0,100)}}...
                                </div>
                                <span class="badge bg-warning rounded-pill">{{0}}</span>
                              </li>
                             @empty
                                 {{'No Tasks Incomplete.'}}
                             @endforelse 
                            </ol>
                         </div>
        
                        <div class="d-flex justify-content-between align-items-center mt-3 text-success fw-bold"><span>Completed Tasks</span> </div>
                        <hr>
                         <div class="col-md-12">
                            <ol class="list-group list-group-numbered">
                                @forelse ($user->tasks() as $task)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class=" w-100 justify-content-between">
                                    <small style="font-size: 11px;padding: 5px;font-weight: bold;color: #878080;"><i class="bi bi-calendar2-day-fill"></i> {{\Carbon\Carbon::parse($task->finished_at)->format('y/m/d')}} <i class="bi bi-clock-fill"></i> {{\Carbon\Carbon::parse($task->finished_at)->format('g:i A')}}</small>
                                    <h6 class="mb-1 mt-1 fw-bold">{{$task->name}}</h6>
                                </div>
                                  {{mb_substr($task->description,0,100)}}...
                                </div>
                                <span class="badge bg-success rounded-pill">{{$task->points}} Point</span>
                              </li>
                              @empty
                              {{'No Tasks Completed.'}}
                          @endforelse                     
                        </ol>
                         </div>
                    </div>
                </div>
             </div>
             @include('users.user_completed_requests')
        </div>
        
        {{-- Start Profile Info --}}
        <div class="col-md-6 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" name="first_name" class="form-control" placeholder="first name" value="{{$user->first_name}}"></div>
                    <div class="col-md-6"><label class="labels">Surname</label><input type="text" name="last_name" class="form-control" value="{{$user->last_name}}" placeholder="surname"></div>
                    <div class="col-md-12">
                        <label class="labels" for="description">Job Description</label>
                        <textarea class="form-control" name="job_description" id="description" rows="3">{{$user->job_description}}</textarea>
                     </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Mobile Number</label>
                        <input type="text" name="phone" class="form-control" placeholder="enter phone number" value="{{$user->phone}}">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Job Title</label>
                        <input type="text" name="job_title" class="form-control" placeholder="enter job title" value="{{$user->job_title}}">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Role</label>
                        <select class="form-control" name="role" id="role">
                            <option {{$user->role == 3 ? 'selected' : ''}} value="3">Seller</option>
                            <option {{$user->role == 2 ? 'selected' : ''}} value="2">Accounter</option>
                            <option {{$user->role == 1 ? 'selected' : ''}} value="1">Super Admin</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Status</label>
                        <select style="color:  {{$user->status == 1 ? 'green' : 'red'}}" class="form-control" name="status" id="status">
                            <option style="color:green"  {{$user->status == 1 ? 'selected' : ''}} value="1">Approved</option>
                            <option style="color:red" {{$user->status == null ? 'selected' : ''}} value="">Pendding</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Salary</label>
                        <input type="number" name="salary" step="0.1" class="form-control" placeholder="enter salary" value="{{$user->salary}}">
                    </div>
                  
                    <div class="col-md-12">
                        <label class="labels">Email ID</label>
                        <input type="text" class="form-control" name="email" placeholder="enter email id" value="{{$user->email}}">
                    </div>
                    <div class="d-flex justify-content-between align-items-center experience"><span>Documents</span> </div>
                    <br>
                 <div class="col-md-12">
                    <label class="labels">ID Card</label>
                    <img src="{{$user->id_photo ? asset('storage/' . $user->id_photo) : 'https://mswordidcards.com/wp-content/uploads/2017/12/Employee-id-50-CRC.jpg'}}" alt="" class="img-fluid">
                 </div> 
                 
                </div>
               
                <div class="mt-5 text-center"><button type="submit" class="btn btn-primary " id="update_user">Save Profile</button></div>
            </div>
        </div>
        {{-- End Profile Info --}}

    </form>
    </div>
</div>
</div>
</div>

@include('users.send')
@include('users.salary_history')



<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast hide bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
         <strong class="me-auto">Saved</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" id="close-toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
         Profile Updated Successfully
      </div>
    </div>
  </div>

  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="ErrliveToast" class="toast hide bg-danger text-white" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
         <strong class="me-auto">Error</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" id="close-err-toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
         Can't Update this profile
      </div>
    </div>
  </div>
@endsection


@section('scripts')
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js" integrity="sha512-h9kKZlwV1xrIcr2LwAPZhjlkx+x62mNwuQK5PAu9d3D+JXMNlGx8akZbqpXvp0vA54rz+DrqYVrzUGDMhwKmwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>


<script>
    $(document).on('change', '#status', function(){
        if ($(this).val() == 1)
        {
            $(this).attr('style', 'color:green');
        }else
        {
            $(this).attr('style', 'color:red');
        }
    });

    $(document).on('click', '#close-toast', function(){
        $('#liveToast').hide();
    });
    $(document).on('click', '#close-err-toast', function(){
        $('#ErrliveToast').hide();
    });
    
    
    $(document).ready(function (e) {
 $("#userForm").on('submit',(function(e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  e.preventDefault();
  $.ajax({
    url:"{{route('update_user')}}",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
   cache: false,
   processData:false,
   beforeSend : function()
   {
      $('#update_user').text('Saving..');
      $('#update_user').attr('disabled' , true);
   },
   success: function(data)
      {
    if(data.success)
    {
        $('#update_user').text('Save Profile');
        $('#update_user').attr('disabled' , false);
        $('#liveToast').show();
    }
    else
    {
        $('#ErrliveToast').show();

    }
      },
     error: function(e) 
      {
        $('#ErrliveToast').show();
      }          
    });
 }));
});




</script>
<script>

    
    $('.dataTable').DataTable();
$('.dataTable2').DataTable({
    "order": [[0, 'desc']]
});
    setInterval(function(){
      $('.previous a').html('<i class="bi bi-skip-backward"></i>');
    $('.next a').html('<i class="bi bi-skip-forward"></i>');
    },500);
  
</script>
@endsection