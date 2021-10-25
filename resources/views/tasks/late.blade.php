<div class="col-md-12">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <div class="container mt-3 mb-4">
    <div class="col-lg-12 mt-4 mt-lg-0">
        <div class="row">
          <div class="col-md-12">
            <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
              <table class="table manage-candidates-top mb-0">
                <thead>
                  <tr>
                    <th>Task </th>
                    <th class="text-center">Employee Name</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)   
                    <?php
                    $endyear=substr($user->end_at,0,4);
                    $endmonth=substr($user->end_at,5,2);
                    $endday=substr($user->end_at,8,2);

                    
                    $finishedyear=substr($user->finished_at,0,4);
                    $finishedmonth=substr($user->finished_at,5,2);
                    $finishedday=substr($user->finished_at,8,2);

$year="0";
$month="0";
$day="0";
?>

                    @if ( $role==3 || $role==4)

                      @if ( $user->userid == $myid )

                   
{{-- /////////  if year late  /////////// --}}
@if ($endyear>=$finishedyear)
<?php $year="0"; ?>
@else
<?php $year="1"; ?> 
@endif
{{-- //////////  if month late ////////// --}}
@if ($endmonth>=$finishedmonth)
 <?php $month="0";?> 
@else
  <?php  $month="1"; ?> 
@endif

{{-- ///////////  if day late ///////// --}}

@if ($endday>=$finishedday)
<?php  $day="0"; ?>
@else
<?php  $day="1"; ?>
@endif
@if($user->status =="0")

                    @if ( $year=="1"||$month=="1"||$day=="1" and $user->status !=1)
    <tr class="candidates-list">
                    <td class="title">
                      <div class="candidate-list-details">
                        <div class="candidate-list-info">
                          <div class="candidate-list-title">
                            <h5 class="mb-0"><a href="#">{{ $user->task_name }}</a></h5>
                          </div>
                          <div class="candidate-list-option">
                            <ul class="list-unstyled">
                              <li>{{ $user->description }}</li>
                            </ul>
                          </div>
                        </div>
                        <div class="candidate-list-info">
                            Start At:
                            {{ $user->start_at }}
                        </div>
                        <div class="candidate-list-info">
                            End At:
                            {{ $user->end_at }}
                        </div>
                        <div class="candidate-list-info">
                            Finished At:
                            {{ $user->finished_at }}
                        </div>

 
</div>

                    </td>
                    <td class="candidate-list-favourite-time text-center">
                      <a class="candidate-list-favourite order-2 text-danger" href="#"><i class="fas fa-user"></i></a>
                      <span class="candidate-list-time order-1">{{ $user->username }}</span>
                      
                      <div class="candidate-list-info">
                        This task has 
                        {{ $user->points }} Points
                    </div>

                     
                    <form action="{{route('accept_task')}}" method="post">
                      @csrf
                     
                      <input type="hidden" name="task_id" value="{{ $user->task_id }}">
                      <button type="submit" class="btn" style="    height: 30px;
                                            border: 1px solid #ddd;
                                          padding: 0 30px;
                                          color: white;
                                          background: #cb0c9f;
                                          margin-left: 23px;
                                          border-radius: 1px;"  name="action" value="1"    >Dlever</button>

                    </form>

                    


@if ($user->end_at<$user->finished_at)
  <div style="color: red">Task is not counted</div>
@endif
                    </td>
                  </tr>                        
                  @endif                 
                  @endif

                      @endif
                      @else
                   
{{-- /////////  if year late  /////////// --}}
@if ($endyear>=$finishedyear)
<?php $year="0"; ?>
@else
<?php $year="1"; ?> 
@endif
{{-- //////////  if month late ////////// --}}
@if ($endmonth>=$finishedmonth)
 <?php $month="0";?> 
@else
  <?php  $month="1"; ?> 
@endif

{{-- ///////////  if day late ///////// --}}

@if ($endday>=$finishedday)
<?php  $day="0"; ?>
@else
<?php  $day="1"; ?>
@endif
@if($user->status =="0")

                    @if ( $year=="1"||$month=="1"||$day=="1" )
    <tr class="candidates-list">
                    <td class="title">
                      <div class="candidate-list-details">
                        <div class="candidate-list-info">
                          <div class="candidate-list-title">
                            <h5 class="mb-0"><a href="#">{{ $user->task_name }}</a></h5>
                          </div>
                          <div class="candidate-list-option">
                            <ul class="list-unstyled">
                              <li>{{ $user->description }}</li>
                            </ul>
                          </div>
                        </div>
                        <div class="candidate-list-info">
                            Start At:
                            {{ $user->start_at }}
                        </div>
                        <div class="candidate-list-info">
                            End At:
                            {{ $user->end_at }}
                        </div>
                        <div class="candidate-list-info">
                            Finished At:
                            {{ $user->finished_at }}
                        </div>

 
</div>

                    </td>
                    <td class="candidate-list-favourite-time text-center">
                      <a class="candidate-list-favourite order-2 text-danger" href="#"><i class="fas fa-user"></i></a>
                      <span class="candidate-list-time order-1">{{ $user->username }}</span>
                      
                      <div class="candidate-list-info">
                        This task has 
                        {{ $user->points }} Points
                    </div>

                    <form action="{{route('accept_task')}}" method="post">
                      @csrf
                      <div class="candidate-list-info">
                      <textarea style="
                      border-radius: 5px;
                      border: 1px solid #ddd;
                      width: 100%;
                      " class="col-xs-12" name="admin_comment"></textarea>
                      </div>
                      <input type="hidden" name="task_id" value="{{ $user->task_id }}">
                                      <div class="candidate-list-info">
                                          @if ( $role==1)
                         <button type="submit" class="btn" style="    height: 30px;
                                          border: 1px solid #ddd;
                                          padding: 0 30px;
                                          color: white;
                                          background: #cb0c9f;
                                          margin-left: 23px;
                                          border-radius: 1px;"  name="action" value="4"    >Accept</button>
                  
                                          <button type="submit" class="btn" style="    height: 30px;
                                          border: 1px solid #ddd;
                                          padding: 0 30px;
                                          color: white;
                                          background: #454545;
                                          margin-left: 23px;
                                          border-radius: 1px;"   name="action" value="5"  >Reject</button>
                                       
                  
                                          @else
                                              not admin
                                          @endif
                                      </div>
                                     
                  </form>        
                    


@if ($user->end_at<$user->finished_at)
  <div style="color: red">Task is not counted</div>
@endif
                    </td>
                   
                    <td>
                      <div class="candidate-list-info">
       <a class="dropdown-item del" style="@endphp
       color: #ff0202;
border: 1px solid #ddd;
text-align: center;
font-weight: bold;
       "  data-bs-toggle="modal" data-bs-target="#delete" href="#"><input type="hidden" class="id" value="{{$user->task_id}}" >Delete</a>
     </div>
                   </td>
                  </tr>                        
                  @endif                 
                  @endif
                    @endif

 
              
                    @endforeach
                 


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>