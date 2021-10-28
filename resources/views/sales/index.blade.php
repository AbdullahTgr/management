@php
    if (isset($api))
    {
        $nav = false;
    }
@endphp
@extends('layouts.app')

@section('content')
<div class="container" style=" max-width: 1465px; ">
    <div class="row">
        <div class="col-md-12">
               
   <h2 class="mb-2  {{isset($api) ? 'd-none' : ''}} ">Sales Agent</h2>

   <button class="btn btn-primary  {{isset($api) ? 'd-none' : ''}} btn-sm" type="button" data-bs-target="#addrequest" data-bs-toggle="modal" >
    Add Request
  </button>
  
  
      <!-- Table -->
       <div class="row">

        <div class="col-12">
          <div style=" padding: 10px; " class="card shadow">
            <div class="card-header border-0">
              <h4 class="mb-0">Sales List</h4>
  
            </div>
            <div class="table-responsive" style=" min-height: 400px; ">
              <table class="table align-items-center table-flush dataTable">
                <thead class="thead-light">
                    <tr>
                      <th scope="col">#ReqNum</th>
                      <th scope="col">Agent</th>
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
                        <th scope="col">Rooms</th> 
                        <th scope="col">Included</th> 
                        <th scope="col">Confirmation</th> 
                        <th scope="col">Payment Option Date</th> 
                        <th scope="col">Cash In</th> 
                        <th scope="col">Cash Out</th> 
                        <th scope="col">Bank</th> 
                        <th scope="col">Comment</th> 
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
               
                      @foreach ($sales as $sale)
                      
                      <tr>
                        <th style="text-align: center;" scope="row">
                          {{$sale->id}}
                        </th>
                        <th scope="row">
                            <a class="text-capitalize" href="{{isset($api) ? '#' : route('profile',$sale->agent_sales->id)}}">{{$sale->agent_sales->name}}</a>
                        </th>
                        {{-- <th scope="row">
                          <span style=" font-size: 12px; " class="badge bg-primary">  <i class="bi bi-calendar2-day-fill"></i> {{ \Carbon\Carbon::parse($sale->created_at)->format('d/m/Y')}} <i class="bi bi-clock-fill"></i> {{ \Carbon\Carbon::parse($sale->created_at)->format('g:i A')}}</span>
                         </th> --}}
                        <th scope="row">
                          {{$sale->clint_name}}
                        </th>
                        <th scope="row">
                          {{$sale->phone_number}}
                        </th>
                        <th scope="row" style=" text-align: center; ">
                          <span class="badge bg-dark">{{$sale->adults ? $sale->adults . ' Adults' : '0 Adults'}}</span>
                          <span class="badge bg-dark">{{$sale->kids ? $sale->kids . ' Kids' : '0 Kids'}}</span>
                          <span class="badge bg-dark">{{$sale->kids_age ? $sale->kids_age . ' Age' : '0 Age'}}</span>
                        </th>
                        <th scope="row" style=" text-align: center; ">
                          {{$sale->hotel_name ? $sale->hotel_name : 'no hotel'}}
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
                          {{$sale->triptype_id ? $sale->trip->type : 'no type'}} 
                        </th>
                        <th scope="row" style=" text-align: center; ">
                          {{$sale->destination_id ? $sale->destination->destination : 'no destination'}}
                        </th>
                        <th scope="row" style=" text-align: center; ">
                          {{$sale->view_id ? $sale->view->view : 'no view'}}
                        </th>
                        <th scope="row" style=" text-align: center; ">
                           {{$sale->transportations ? $sale->transport->transportation : 'not selected'}} 
                        </th>
                        <th scope="row" style=" text-align: center; ">
                            {{$sale->excursion ?  $sale->exc->excursion : 'no excursion'}} 
                         </th>
                         <th scope="row" style=" text-align: center; ">
                          <div class="badge bg-info">{{$sale->gateway ? $sale->gate->gateway : 'no gateway'}}</div>
                        </th>
                        <th scope="row" style=" text-align: center; ">
                          {{$sale->salescomments}}
                        </th>


                          <th scope="row">
                              <a class="text-capitalize" href="{{isset($api) ? '#' : route('profile',$sale->res_agent_id ? $sale->agent_res->id : '../sales')}}">{{$sale->res_agent_id ? $sale->agent_res->name : 'N/A'}}</a>
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
                          {{-- <th scope="row" style=" text-align: center; ">
                              <div class="badge bg-{{$sale->avaliability == 1 ? 'success' : 'warning'}}">{{$sale->avaliability == 1 ? 'Avaliabale' : 'Not Avaliabale'}}</div>
                          </th>
                          <th scope="row" style=" text-align: center; ">
                              <div class="badge bg-dark"><i class="bi bi-calendar2-day-fill"></i> {{$sale->from}}</div>
                          </th>
                          <th scope="row" style=" text-align: center; ">
                            <div class="badge bg-dark"><i class="bi bi-calendar2-day-fill"></i> {{$sale->to}}</div>
                          </th> --}}
                          <th scope="row" style=" text-align: center; ">
                            <a href="#">
                              <div data-bs-toggle="modal" data-bs-target="#rooms{{$sale->id}}" class="badge bg-info chalet{{$sale->id}}">{{$sale->chalet ? $sale->chalet . ' Chalet' : ' 0 Chalet'}}</div>
                              <div data-bs-toggle="modal" data-bs-target="#rooms{{$sale->id}}" class="badge bg-info single{{$sale->id}}">{{$sale->single ? $sale->single . ' Single' : ' 0 Single'}}</div>
                              <div data-bs-toggle="modal" data-bs-target="#rooms{{$sale->id}}" class="badge bg-info double{{$sale->id}}">{{$sale->double ? $sale->double . ' Double' : ' 0 Double'}}</div>
                              <div data-bs-toggle="modal" data-bs-target="#rooms{{$sale->id}}" class="badge bg-info triple{{$sale->id}}">{{$sale->triple ? $sale->triple . ' Triple' : ' 0 Triple'}}</div>
                            </a>
                          </th>
                          <th scope="row" style=" text-align: center; ">
                            <div class="">{{$sale->include_id ? $sale->included->include : 'No thing included.'}}</div>
                          </th>
                          <th scope="row" style=" text-align: center; ">
                              <div class="badge bg-{{$sale->confirmation == 1 ? 'success' : 'danger'}}">{{$sale->confirmation == 1 ? 'Confirmed' : 'Not Confirmed'}}</div>
                          </th>
                          <th scope="row" style=" text-align: center; ">
                              <div class="badge bg-dark"><i class="bi bi-calendar2-day-fill"></i> {{$sale->payment_option_date}}</div>
                          </th>
                          <th scope="row" style=" text-align: center; ">
                            <a href="#" data-bs-toggle="modal" class="cashins{{$sale->id}}" data-bs-target="#cashin{{$sale->id}}"> {{$sale->cashin ?  $sale->cashin  : 'N/A'}}</a>
                        </th>
                        <th scope="row" style=" text-align: center; ">
                          <a href="#" data-bs-toggle="modal" class="cashouts{{$sale->id}}" data-bs-target="#cashout{{$sale->id}}"> {{$sale->cashout ?  $sale->cashout  : 'N/A'}}</a>
                        </th>
                        <th scope="row" style=" text-align: center; ">
                          <a href="#" class="badge bg-primary" data-bs-toggle="modal" data-bs-target="#bank{{$sale->id}}">Bank Details</a>
                        </th>
                            <th scope="row" style=" text-align: center; ">
                              <a href="#" id="view_comment" c_id="{{$sale->id}}" class="comments{{$sale->id}}" data-bs-toggle="modal" data-bs-target="#comment{{$sale->id}}">
                                 @php
                                     $total = null;
                                 @endphp
                                 @forelse ($sale->comments() as $key=> $comment)
                                 @php
                                     
                                     $total = $total + $comment->price;
                                 @endphp
                                      @if ($key+1 < count($sale->comments()))
                                      {{$comment->comment . ' + ' }}
                                      @else
                                      {{$comment->comment}}
                                      @endif
                                 @empty
                                     {{'No comments.'}}
                                 @endforelse
                                     {{$total ? ' = ' . $total : ''}}
                              </a>
                            </th>


                        <td class="text-right">
                          {{$sale->res_agent_id ? 'Approved' : ''}}
                          <div class="dropdown {{$sale->res_agent_id ? 'd-none' : ''}}">
                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              Options
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                 <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#approve{{$sale->id}}" href="#">Approve</a></li>

                                {{-- @if (Auth::user()->role == 1)
                                 <li class="d-none"><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#delete{{$sale->id}}" href="#">Delete</a></li>
                                @endif --}}
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

 
@forelse ($sales as $sale)
@include('sales.approve')
@include('sales.delete')
 @empty
@endforelse
@if (!isset($api))
@include('sales.add_request')
@endif
@endsection 




@section('scripts')
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js" integrity="sha512-h9kKZlwV1xrIcr2LwAPZhjlkx+x62mNwuQK5PAu9d3D+JXMNlGx8akZbqpXvp0vA54rz+DrqYVrzUGDMhwKmwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="{{asset('js/tasks.js')}}"></script>
<script>
     
 
      $('.dataTable').DataTable({
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );
      setInterval(function(){
        
        $('.previous a').html('<i class="bi bi-skip-backward"></i>');
      $('.next a').html('<i class="bi bi-skip-forward"></i>');
      },500);
    
</script>
@endsection