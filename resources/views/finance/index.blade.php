@extends('layouts.app')

@section('content')
<div class="container" style=" max-width: 1465px; ">
    <div class="row">
        <div class="col-md-12">
               
   <h2 class="mb-2">Finance</h2>
      <!-- Table -->
       <div class="row">

        <div class="col-12">
          <div style=" padding: 10px; " class="card shadow">
            <div class="card-header border-0">
              <h4 class="mb-0">Finance List</h4>
              @php
                  if (isset($_GET['month']))
                  {
                    $selected_month = $_GET['month'];
                  }else
                  {
                    $selected_month = Carbon\Carbon::now()->month;
                  }
                    $current_finance = \App\Models\Finance::whereMonth('created_at', $selected_month)->whereYear('created_at', \Carbon\Carbon::now()->year)->get();

              @endphp
                @foreach ($finance[0]->months() as $key => $month)
                    <a href="?month={{$key}}" class="btn btn-{{$key == $selected_month ? 'dark' : 'primary'}}"><i class="fas fa-calendar"></i> {{$key}}</a>
                @endforeach
            </div>
            <div class="table-responsive" style=" min-height: 400px; ">
              <table class="table align-items-center table-flush dataTable">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Agent</th>
                        <th scope="col">Client Name</th>
                        <th scope="col">Hotel</th> 
                        <th scope="col">Days/Night</th> 
                        <th scope="col">Check In</th> 
                        <th scope="col">Transportation</th> 
                        <th scope="col">Excursion</th> 
                        <th scope="col">Cash In</th> 
                        <th scope="col">Cash Out</th> 
                        <th scope="col">Bank</th> 
                        <th scope="col">Notes</th> 
                        <th scope="col">Commission</th> 
 
                      </tr>
                    </thead>
                    <tbody>
               
                      @foreach ($current_finance as $sale)
                      
                      <tr>
                          <th>
                            <span class="badge bg-dark" >{{$sale->created_at}}</span>
                          </th>
                        <th scope="row">
                            <a class="text-capitalize" href="{{route('profile',$sale->agent->id)}}">{{$sale->agent->name}}</a>
                        </th>
                        <th scope="row">
                          {{$sale->client_name}}
                        </th>
                        <th scope="row" style=" text-align: center; ">
                          {{$sale->hotel_id ? $sale->hotel->type : 'no hotel'}}
                        </th>
                        <th scope="row" style=" text-align: center; ">
                          <div class="badge bg-info">{{$sale->days_nights}}</div>
                        </th>
                        <th scope="row" style=" text-align: center; ">
                          <div class="badge bg-dark">{{$sale->checkin}}</div>
                        </th>
                        <th scope="row" style=" text-align: center; ">
                            {{$sale->transportation_id ? $sale->transport->transportation : 'not selected'}} 
                         </th>
                        <th scope="row" style=" text-align: center; ">
                          {{$sale->excursion_id ? $sale->exc->excursion : 'no excursion'}}
                        </th>
                        <th scope="row">
                            {{$sale->cashin}}
                          </th>
                          <th scope="row">
                            <a href="#" data-bs-toggle="modal" class="cashouts{{$sale->id}}" data-bs-target="#cashout{{$sale->id}}"> {{$sale->cashout ?  $sale->cashout  : 'N/A'}}</a>
                        </th>
                          <th scope="row" style=" text-align: center; ">
                            <a href="#" class="badge bg-primary" data-bs-toggle="modal" data-bs-target="#bank{{$sale->id}}">Bank Details</a>
                          </th>
                          <th scope="row" style=" text-align: center; ">
                            {{$sale->notes}}
                          </th>
                          <th scope="row" style=" text-align: center; ">
                            {{$sale->commission}}
                          </th>


                        
 
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

 
@forelse ($finance as $sale)
{{-- @include('reservations.delete') --}}
@include('reservations.cashout',['finance'=>1])
@include('reservations.bank',['finance'=>1])
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
     
 
      $('.dataTable').DataTable();
      setInterval(function(){
        
        $('.previous a').html('<i class="bi bi-skip-backward"></i>');
      $('.next a').html('<i class="bi bi-skip-forward"></i>');
      },500);
    
</script>
@endsection