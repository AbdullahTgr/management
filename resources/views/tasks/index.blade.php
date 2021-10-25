@extends('layouts.app')

@section('content')

<?php

    $role = Auth::user()->role;
    $myid = Auth::user()->id;

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
               
   <h2 class="mb-2">Tasks</h2>
   <a href="{{route('add')}}"><button class="btn" style="    height: 30px;
   border: 1px solid #ddd;
   padding: 0 30px;
   color: white;
   background: #000000;

   background-image: linear-gradient(
310deg
,#cb0c9f,#cb0c9f);


   margin-left: 23px;
   border-radius: 1px;">+</button></a>
      <!-- Table -->
 
      <div class="container" style="
      margin-top: 50px;
  ">
        <div class="row">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab" role="tabpanel">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" >Completed Tasks</a></li>
                                <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab">Not Completed Yet</a></li>
                                <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Late Tasks</a></li>
                                <li role="presentation"><a href="#Section4" aria-controls="accepted" role="tab" data-toggle="tab">Accepted Tasks</a></li>
                                <li role="presentation"><a href="#Section5" aria-controls="rejected" role="tab" data-toggle="tab">Rejected Tasks</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabs">
                                <div role="tabpanel" class="tab-pane fade in active show" id="Section1">
                                    @include('tasks.completed')
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="Section2">
                                    @include('tasks.late')
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="Section3">
                                    @include('tasks.notyet')
                                 </div>
                                 <div role="tabpanel" class="tab-pane fade" id="Section4">
                                     @include('tasks.accepted')
                                 </div>
                                 <div role="tabpanel" class="tab-pane fade" id="Section5">
                                     @include('tasks.rejected')
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


























       
        </div>
    </div>

    </div>
</div>
@include('tasks.delete')
@endsection


@section('scripts')
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js" integrity="sha512-h9kKZlwV1xrIcr2LwAPZhjlkx+x62mNwuQK5PAu9d3D+JXMNlGx8akZbqpXvp0vA54rz+DrqYVrzUGDMhwKmwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('js/tasks.js')}}"></script>
<script>
      $('.dataTable').DataTable();
      setInterval(function(){
        $('.previous a').html('<i class="bi bi-skip-backward"></i>');
      $('.next a').html('<i class="bi bi-skip-forward"></i>');
      },500);
</script>
@endsection