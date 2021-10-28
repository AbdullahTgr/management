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
               
   <h2 class="mb-2 {{isset($api) ? 'd-none' : ''}}">Finance</h2>
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
              @if (count($finance) > 0)
                @foreach ($finance[0]->months() as $key => $month)
                 <a href="?month={{$key}}{{isset($api) ? '&key=LIZefNAEYFEsrr6w7fmVF34qJnP841qqLz5YE9qWMwbhutlEr2nq0CrsdC75ao7Q' : ''}}" class="btn btn-{{$key == $selected_month ? 'dark' : 'primary'}}"><i class="fas fa-calendar"></i> {{$key}}</a>
                @endforeach
              @endif

            </div>
            <div class="table-responsive" style=" min-height: 400px; ">
              <table class="table align-items-center table-flush dataTable">
                <thead class="thead-light">
                    <tr>
                      <th scope="col">#ReqNum</th>
                        <th scope="col">Agent</th>
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
                        <th scope="col"></th> 
 
                      </tr>
                    </thead>
                    <tbody>
                
                      @foreach ($current_finance as $sale)
                      
                      <tr>
                          <th>
                            <span>{{$sale->res_id}} - {{$sale->res()}} </span>
                          </th>
                        <th scope="row">
                            <a class="text-capitalize" href="{{isset($api) ? '#' : route('profile',$sale->agent->id)}}">{{$sale->agent->name}}</a>
                        </th>
 
                        <th scope="row" style=" text-align: center; ">
                          {{$sale->hotel_name() ? $sale->hotel_name() : 'no hotel'}}
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
                          <a href="#" data-bs-toggle="modal" class="cashins{{$sale->id}}" data-bs-target="#cashin{{$sale->id}}"> {{$sale->cashin ?  $sale->cashin  : 'N/A'}}</a>
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
                          <th scope="row" style=" text-align: center; ">
                             <div data-bs-toggle="modal" data-bs-target="#newTransfer{{$sale->res_id}}" class="btn btn-primary btn-sm">New transfer</div>
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
@include('reservations.cashin',['finance'=>1])
@include('reservations.bank',['finance'=>1])
@include('finance.transfer',['finance'=>1])
 @empty
@endforelse
  
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