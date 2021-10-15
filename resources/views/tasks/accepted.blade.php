
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
{{-- Start check role --}}
                  @if ( $role==3 || $role==4)

                      @if ( $user->userid == $myid )
                  
                  @if ( $user->status==4)
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
                      <?php
                      $endyear=substr($user->end_at,0,4);
                      $endmonth=substr($user->end_at,5,2);
                      $endday=substr($user->end_at,8,2);

                      
                      $finishedyear=substr($user->finished_at,0,4);
                      $finishedmonth=substr($user->finished_at,5,2);
                      $finishedday=substr($user->finished_at,8,2);


?>
@if ($endyear>=$finishedyear)

@if ($endmonth>=$finishedmonth)


@if ($endday>=$finishedday)
<div style="color: rgb(6, 240, 41)"> task is completed on time </div>

@else
<div style="color: rgb(240, 224, 6)"> task is late </div>
@endif
@else
<div style="color: rgb(204, 99, 13)"> task is late </div>
@endif
@else
<div style="color: red"> task is late about 1 year</div>
@endif
                    </div>

                  </td>
                  <td class="candidate-list-favourite-time text-center">
                    <a class="candidate-list-favourite order-2 text-danger" href="#"><i class="fas fa-user"></i></a>
                    <span class="candidate-list-time order-1">{{ $user->username }}</span>
                    
                    <div class="candidate-list-info">
                      This task has 
                      {{ $user->points }} Points
                  </div>
                  

                  
@if ($user->end_at<$user->finished_at)
<div style="color: red">Task is not counted</div>
@endif
                  </td>
                </tr>                        
                  @endif       
                      @endif

                   {{-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
                   {{-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
                   {{-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
                   {{-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
                 @else
                  
                 @if ( $user->status==4)
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
                                     <?php
                                     $endyear=substr($user->end_at,0,4);
                                     $endmonth=substr($user->end_at,5,2);
                                     $endday=substr($user->end_at,8,2);
             
                                     
                                     $finishedyear=substr($user->finished_at,0,4);
                                     $finishedmonth=substr($user->finished_at,5,2);
                                     $finishedday=substr($user->finished_at,8,2);
             
             
             ?>
             @if ($endyear>=$finishedyear)
             
             @if ($endmonth>=$finishedmonth)
             
             
             @if ($endday>=$finishedday)
             <div style="color: rgb(6, 240, 41)"> task is completed on time </div>
             
             @else
              <div style="color: rgb(240, 224, 6)"> task is late </div>
             @endif
             @else
             <div style="color: rgb(204, 99, 13)"> task is late </div>
             @endif
             @else
             <div style="color: red"> task is late about 1 year</div>
             @endif
                                   </div>
             
                                 </td>
                                 <td class="candidate-list-favourite-time text-center">
                                   <a class="candidate-list-favourite order-2 text-danger" href="#"><i class="fas fa-user"></i></a>
                                   <span class="candidate-list-time order-1">{{ $user->username }}</span>
                                   
                                   <div class="candidate-list-info">
                                     This task has 
                                     {{ $user->points }} Points
                                 </div>
                                 
                                 {{ $user->admin_comment }} 
                                 
                                 
             @if ($user->end_at<$user->finished_at)
             <div style="color: red">Task is not counted</div>
             @endif
                                 </td>
                                 
                               </tr>                        
                                 @endif       
                  @endif

            {{-- End check role --}}
                  @endforeach
               


              </tbody>
            </table>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>