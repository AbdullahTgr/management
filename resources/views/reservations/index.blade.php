@extends('layouts.app')

@section('content')
<div class="container" style=" max-width: 1465px; ">
    <div class="row">
        <div class="col-md-12">
               
   <h2 class="mb-2">Reservations</h2>
      <!-- Table -->
       <div class="row">

        <div class="col-12">
          <div style=" padding: 10px; " class="card shadow">
            <div class="card-header border-0">
              <h4 class="mb-0">Reservations List</h4>
  
            </div>
            <div class="table-responsive" style=" min-height: 400px; ">
              <table class="table align-items-center table-flush dataTable">
                <thead class="thead-light">
                    <tr>
                      <th scope="col">Agent</th>
                      <th scope="col">Date & Time </th>
                      <th scope="col">Client Name</th>
                      <th scope="col">Phone</th> 
                      <th scope="col">Persons</th> 
                      <th scope="col">Hotel</th> 
                      <th scope="col">Days/Night</th> 
                      <th scope="col">Month</th> 
                      <th scope="col">Check In</th> 
                      <th scope="col">Check Out</th> 
                      <th scope="col">Trip Type</th> 
                      <th scope="col">Destenation</th> 
                      <th scope="col">View</th> 
                      <th scope="col">Transportation</th> 
                      <th scope="col">Excursion</th> 
                      <th scope="col">Gateway</th> 
                      <th scope="col">Sales Comment</th> 

                      <th scope="col">RES.Agent</th>
                      <th scope="col">Date</th>
                      <th scope="col">Received Time</th>
                      <th scope="col">Response Time</th> 
                      <th scope="col">Availbility</th> 
                      <th scope="col">FROM</th> 
                      <th scope="col">TO</th> 
                      <th scope="col">Rooms</th> 
                      <th scope="col">Included</th> 
                      <th scope="col">Confirmation</th> 
                      <th scope="col">Payment Option Date</th> 
                      <th scope="col">Cash In</th> 
                      <th scope="col">Cash Out</th> 
                      <th scope="col">Comment</th> 
                      <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
               
                      @foreach ($reservations as $sale)
                      <tr>
                    <th scope="row">
                        <a class="text-capitalize" href="{{route('profile',$sale->agent_sales->id)}}">{{$sale->agent_sales->name}}</a>
                    </th>
                    <th scope="row">
                      <span style=" font-size: 12px; " class="badge bg-primary">  <i class="bi bi-calendar2-day-fill"></i> {{ \Carbon\Carbon::parse($sale->created_at)->format('d/m/Y')}} <i class="bi bi-clock-fill"></i> {{ \Carbon\Carbon::parse($sale->created_at)->format('g:i A')}}</span>
                     </th>
                    <th scope="row">
                      {{$sale->clint_name}}
                    </th>
                    <th scope="row">
                      {{$sale->phone_number}}
                    </th>
                    <th scope="row" style=" text-align: center; ">
                      {{$sale->adults}}
                    </th>
                    <th scope="row" style=" text-align: center; ">
                      {{$sale->hotel->type}}
                    </th>
                    <th scope="row" style=" text-align: center; ">
                      <div class="badge bg-info">{{$sale->days_night}}</div>
                    </th>
                    <th scope="row" style=" text-align: center; ">
                      <div class="badge bg-dark">{{$sale->month}}</div>
                    </th>
                    <th scope="row" style=" text-align: center; ">
                      <div class="badge bg-dark">{{$sale->checkin}}</div>
                    </th>
                    <th scope="row" style=" text-align: center; ">
                      <div class="badge bg-dark">{{$sale->checkout}}</div>
                    </th>
                    <th scope="row" style=" text-align: center; ">
                      {{$sale->trip->type}}
                    </th>
                    <th scope="row" style=" text-align: center; ">
                      {{$sale->destination->destination}}
                    </th>
                    <th scope="row" style=" text-align: center; ">
                      {{$sale->view->view}}
                    </th>
                    <th scope="row" style=" text-align: center; ">
                       <i class="bi bi-{{$sale->transportations ? 'check-circle-fill text-success' : 'x-circle text-danger'}}"></i> 
                    </th>
                    <th scope="row" style=" text-align: center; ">
                      <i class="bi bi-{{$sale->excursion ? 'check-circle-fill text-success' : 'x-circle text-danger'}}"></i> 
                     </th>
                     <th scope="row" style=" text-align: center; ">
                      <div class="badge bg-info">{{$sale->gateway}}</div>
                    </th>
                    <th scope="row" style=" text-align: center; ">
                      {{$sale->salescomments}}
                    </th>



                        <th scope="row">
                            <a class="text-capitalize" href="{{route('profile',$sale->agent_res->id)}}">{{$sale->agent_res->name}}</a>
                        </th>
                        <th scope="row">
                          <span style=" font-size: 12px; " class="badge bg-primary">  <i class="bi bi-calendar2-day-fill"></i> {{ \Carbon\Carbon::parse($sale->created_at)->format('d/m/Y')}} </span>
                         </th>
                        <th scope="row">
                            <div class="badge bg-dark"><i class="bi bi-clock-fill"></i> {{ \Carbon\Carbon::parse($sale->received_time )->format('g:i A')}}</div>
                        </th>
                        <th scope="row">
                            <div class="badge bg-dark"><i class="bi bi-clock-fill"></i> {{ \Carbon\Carbon::parse($sale->response_time )->format('g:i A')}}</div>
                        </th>
                        <th scope="row" style=" text-align: center; ">
                            <div class="badge bg-{{$sale->avaliability == 1 ? 'success' : 'warning'}}">{{$sale->avaliability == 1 ? 'Avaliabale' : 'Not Avaliabale'}}</div>
                        </th>
                        <th scope="row" style=" text-align: center; ">
                            <div class="badge bg-dark"><i class="bi bi-calendar2-day-fill"></i> {{$sale->from}}</div>
                        </th>
                        <th scope="row" style=" text-align: center; ">
                          <div class="badge bg-dark"><i class="bi bi-calendar2-day-fill"></i> {{$sale->to}}</div>
                        </th>
                        <th scope="row" style=" text-align: center; ">
                          <a href="#">
                            <div data-bs-toggle="modal" data-bs-target="#rooms{{$sale->id}}" class="badge bg-info">{{$sale->chalet ? $sale->chalet . ' Chalet' : ''}}</div>
                            <div data-bs-toggle="modal" data-bs-target="#rooms{{$sale->id}}" class="badge bg-info">{{$sale->single ? $sale->single . ' Single' : ''}}</div>
                            <div data-bs-toggle="modal" data-bs-target="#rooms{{$sale->id}}" class="badge bg-info">{{$sale->double ? $sale->double . ' Double' : ''}}</div>
                            <div data-bs-toggle="modal" data-bs-target="#rooms{{$sale->id}}" class="badge bg-info">{{$sale->triple ? $sale->triple . ' Triple' : ''}}</div>
                          </a>
                        </div>
                        </th>
                        <th scope="row" style=" text-align: center; ">
                          <a href="#" data-bs-toggle="modal" data-bs-target="#include{{$sale->id}}" class="">{{$sale->included_id ? $sale->included->include : 'No thing included.'}}</a>
                        </th>
                        <th scope="row" style=" text-align: center; ">
                            <div class="badge bg-{{$sale->confirmation == 1 ? 'success' : 'danger'}}">{{$sale->confirmation == 1 ? 'Confirmed' : 'Not Confirmed'}}</div>
                        </th>
                        <th scope="row" style=" text-align: center; ">
                          <a href="#" data-bs-toggle="modal" data-bs-target="#payment{{$sale->id}}" class="badge bg-dark"><i class="bi bi-calendar2-day-fill"></i> {{$sale->payment_option_date ? \Carbon\Carbon::parse($sale->payment_option_date)->format('Y-m-d') : 'N/A'}}</a>
                      </th>
                      <th scope="row" style=" text-align: center; ">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#cashin{{$sale->id}}"> {{$sale->cashin ?  $sale->cashin  : 'N/A'}}</a>
                    </th>
                    <th scope="row" style=" text-align: center; ">
                      <a href="#" data-bs-toggle="modal" data-bs-target="#cashout{{$sale->id}}"> {{$sale->cashout ?  $sale->cashout  : 'N/A'}}</a>
                    </th>
                        <th scope="row" style=" text-align: center; ">
                          {{$sale->res_comment}}
                        </th>
 
 
                        <td class="text-right">
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              Options
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                 <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit{{$sale->id}}" href="#">Edit</a></li>

                                @if (Auth::user()->role == 1)
                                 <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#delete{{$sale->id}}" href="#">Delete</a></li>
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

      </div>
   
   
 
   
        </div>
    </div>
</div>

 
@forelse ($reservations as $sale)
{{-- @include('reservations.delete') --}}
@include('reservations.edit')
@include('reservations.rooms')
@include('reservations.include')
@include('reservations.payment_date')
@include('reservations.cashin')
@include('reservations.cashout')
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
    
      var count = 2;

    $(document).on('click', '#add_cashout' , function() {
        $('#cashList').append('<div class="col-md-6"><label for="cashout">Price</label><input class="form-control" value=" " type="number" step="0.1" name="cashout" id="cashout"></div>');
        count +=1;
    });
</script>
@endsection