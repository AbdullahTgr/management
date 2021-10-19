@extends('layouts.app')

@section('content')

<?php

    $role = Auth::user()->role;
    $myid = Auth::user()->id;

?>

<div class="container">
    <div class="row">
        <h2 class="mb-2">Manage Your Data</h2>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <a href="{{route('hotels')}}"> 
                        <div class="card">
                          <div class="card-body p-3">
                            <div class="row">
                              <div class="col-8">
                                <div class="numbers">
                                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Hotels</p>
                                  <h5 class="font-weight-bolder mb-0">
                                     
                                    <span class="text-success text-sm font-weight-bolder">Add, Edit and Delete Hotels</span>
                                  </h5>
                                </div>
                              </div>
                              <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </a>
        </div>
        
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <a href="{{route('triptype')}}"> 
                        <div class="card">
                          <div class="card-body p-3">
                            <div class="row">
                              <div class="col-8">
                                <div class="numbers">
                                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Trip Type</p>
                                  <h5 class="font-weight-bolder mb-0">
                                     
                                    <span class="text-success text-sm font-weight-bolder">Add, Edit and Delete Trip Type</span>
                                  </h5>
                                </div>
                              </div>
                              <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </a>
        </div>
        
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <a href="{{route('destinations')}}"> 
                        <div class="card">
                          <div class="card-body p-3">
                            <div class="row">
                              <div class="col-8">
                                <div class="numbers">
                                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Destinations</p>
                                  <h5 class="font-weight-bolder mb-0">
                                     
                                    <span class="text-success text-sm font-weight-bolder">Add, Edit and Delete Destinations</span>
                                  </h5>
                                </div>
                              </div>
                              <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </a>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <a href="{{route('views')}}"> 
                        <div class="card">
                          <div class="card-body p-3">
                            <div class="row">
                              <div class="col-8">
                                <div class="numbers">
                                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Views</p>
                                  <h5 class="font-weight-bolder mb-0">
                                     
                                    <span class="text-success text-sm font-weight-bolder">Add, Edit and Delete Views</span>
                                  </h5>
                                </div>
                              </div>
                              <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </a>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <a href="{{route('transportation')}}"> 
                        <div class="card">
                          <div class="card-body p-3">
                            <div class="row">
                              <div class="col-8">
                                <div class="numbers">
                                  <p class="text-sm mb-0 text-capitalize font-weight-bold">transportation</p>
                                  <h5 class="font-weight-bolder mb-0">
                                     
                                    <span class="text-success text-sm font-weight-bolder">Add, Edit and Delete transportation</span>
                                  </h5>
                                </div>
                              </div>
                              <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </a>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <a href="{{route('gateways')}}"> 
                        <div class="card">
                          <div class="card-body p-3">
                            <div class="row">
                              <div class="col-8">
                                <div class="numbers">
                                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Gateways</p>
                                  <h5 class="font-weight-bolder mb-0">
                                    <span class="text-success text-sm font-weight-bolder">Add, Edit and Delete Gateways</span>
                                  </h5>
                                </div>
                              </div>
                              <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </a>
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