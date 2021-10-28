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
               
   <h2 class="mb-2 {{isset($api) ? 'd-none' : ''}}">Reservations</h2>
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
                      <th scope="col">#ReqNum</th>
                      <th scope="col">Agent</th>
                      {{-- <th scope="col">Date & Time </th> --}}
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
                      {{-- <th scope="col">Availbility</th> 
                      <th scope="col">FROM</th> 
                      <th scope="col">TO</th>  --}}
                      <th scope="col">Rooms</th> 
                      <th scope="col">Included</th> 
                      <th scope="col">Confirmation</th> 
                      <th scope="col">Payment Option Date</th> 
                      <th scope="col">Cash In</th> 
                      <th scope="col">Cash Out</th> 
                      <th scope="col">Bank</th> 
                      <th scope="col">Comment</th> 
                      <th scope="col">Send Mail</th>
                      <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
               
                      @foreach ($reservations as $sale)
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
                            <a class="text-capitalize" href="{{isset($api) ? '#' : route('profile',$sale->agent_res->id)}}">{{$sale->agent_res->name}}</a>
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
                        </div>
                        </th>
                        <th scope="row" style=" text-align: center; ">
                          <a href="#" data-bs-toggle="modal" data-bs-target="#include{{$sale->id}}" class="includes{{$sale->id}}">{{$sale->included_id ? $sale->included->include : 'No thing included.'}}</a>
                        </th>
                        <th scope="row" style=" text-align: center; ">
                            <div class="badge bg-{{$sale->confirmation == 1 ? 'success' : 'danger'}}">{{$sale->confirmation == 1 ? 'Confirmed' : 'Not Confirmed'}}</div>
                        </th>
                        <th scope="row" style=" text-align: center; ">
                          <a href="#" data-bs-toggle="modal" data-bs-target="#payment{{$sale->id}}" class="badge bg-dark"><i class="bi bi-calendar2-day-fill"></i> <span class="payments{{$sale->id}}">{{$sale->payment_option_date ? \Carbon\Carbon::parse($sale->payment_option_date)->format('Y-m-d') : 'N/A'}}</span></a>
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
                            <a  data-bs-toggle="modal" data-bs-target="#sendemail" class="btn btn-primary getmail_modat" href="#"><input type="hidden" value="{{$sale->agent_sales->email}}" class="u_mail"> Email</a>
                          </td>

                        <td class="text-right">
                          {{$sale->finance ? 'Added to finance' : ''}}
                          <div class="dropdown {{$sale->finance ? 'd-none' : ''}}">
                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              Options
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit{{$sale->id}}" href="#">Confirm</a></li>
                              <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addFinance{{$sale->id}}" href="#">Add to finance</a></li>
                              

                                {{-- @if (Auth::user()->role == 1)
                                 <li class="d-none"><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#delete{{$sale->id}}" href="#">Delete</a></li>
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

@include('reservations.sendemail')
 
@forelse ($reservations as $sale)
{{-- @include('reservations.delete') --}}
@if ($sale->finance)
    
@else 
@include('reservations.edit')
@include('reservations.rooms')
@include('reservations.include')
@include('reservations.payment_date')
@include('reservations.cashin')
@include('reservations.cashout')
@include('reservations.bank')
@include('reservations.comments')
@include('reservations.add_finance')







@endif 

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
    
    

      $(document).on('click', '#add_cash' , function() {
      var count = Number($(this).parent().parent().find('#count').val())+1;
      $(this).parent().parent().find('#cashList').append('<div class="col-md-4"><label for="cashout">Price</label>'
          + '<input class="form-control" type="number" step="0.1" name="cashout_' + count + '" id="cashout_' + count + '">'
          + '</div>'
          + '<div class="col-md-4"><label for="name">Name</label>'
          + '<input class="form-control" type="text" name="name_' + count + '" id="name_' + count + '">'
          + '</div>'
          + '<div class="col-md-4">'
          + ' <label for="photo_'+ count +'">Photo</label>'
          + '<input accept="image/png, image/gif, image/jpeg" type="file" class="form-control"  type="file"  name="photo_' + count + '" id="photo_' + count + '">'
          + '</div>'
          );
          $(this).parent().parent().find('#count').val(count); 
        count +=1;
    });

    $(document).on('click', '#add_bank' , function() {
      var count = Number($(this).parent().parent().find('#bank_count').val())+1;
      $(this).parent().parent().find('#bankList').append(
            '<div class="col-md-4"><label for="photo_1">Photo</label>'
          + '<input class="form-control"  type="file" name="photo_' + count + '" id="photo_' + count + '">'
          + '</div>'
          + '<div class="col-md-4"><label for="name">Bank</label>'
          + '<input class="form-control" type="text" name="name_' + count + '" id="name_' + count + '">'
          + '</div>'
          + '<div class="col-md-4"><label for="account">Account Num</label>'
          + '<input class="form-control" type="text" name="account_' + count + '" id="account_' + count + '">'
          + '</div>'
          );
          $(this).parent().parent().find('#bank_count').val(count); 
        count +=1;
    });

    $(document).on('click', '#add_comment' , function() {
      var count = Number($(this).parent().parent().find('#count').val())+1;
      $(this).parent().parent().find('#commentList').append('<div class="col-md-6"><label for="price_">Price</label>'
          + '<input class="form-control" type="number" step="0.1" name="price_' + count + '" id="price_' + count + '">'
          + '</div>'
          + '<div class="col-md-6"><label for="comment_">Comment</label>'
          + '<input class="form-control" type="text" name="comment_' + count + '" id="comment_' + count + '">'
          + '</div>'
          );
          $(this).parent().parent().find('#count').val(count); 
        count +=1;
    });

    $(document).on('click', '#view_comment' , function() {
       var c_id = $(this).attr('c_id');
       var total = $('#comment'+c_id).find('#total').val();
       var count = $('#comment'+c_id).find('#count').val();
        
       for (var i=1;i <= count;i++)
       {
         total =  Number(total) + Number(parseInt($('#comment'+c_id).find('#price_'+i).val()));
       }
       $('#comment'+c_id).find('#total').val(total);
    });




    $(document).ready(function (e) {

      // Rooms Ajax Request 

 $(".updateRooms").on('submit',(function(e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  e.preventDefault();
  form = $(this);
  $.ajax({
    url:"{{isset($api) ? route('update_rooms_api') : route('update_rooms')}}",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
   cache: false,
   processData:false,
   beforeSend : function()
   {
       var load = '{{asset("imgs/load.gif")}}';
       form.find('#update_user').html('<span>Saving... </span> <img style=" width: 15px; transform: scale(1.5); " src="' + load + '">');
       form.find('#update_user').attr('disabled' , true);
   },
   success: function(data)
      {
        console.log(form[0].sale_id.value);
        $('.chalet'+form[0].sale_id.value).text(form[0].chalet.value + ' Chalet');
        $('.single'+form[0].sale_id.value).text(form[0].single.value + ' Single');
        $('.double'+form[0].sale_id.value).text(form[0].double.value + ' Double');
        $('.triple'+form[0].sale_id.value).text(form[0].triple.value + ' Triple');
        $('.modal').modal('hide');
        form.find('#update_user').text('Save');
        form.find('#update_user').attr('disabled' , false);
      },
     error: function(e) 
      {
        $('#ErrliveToast').show();
      }          
    });
 }));


 $(".updateIncludes").on('submit',(function(e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  e.preventDefault();
  form = $(this);
  $.ajax({
    url:"{{isset($api) ? route('update_include_api') : route('update_include')}}",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
   cache: false,
   processData:false,
   beforeSend : function()
   {
       var load = '{{asset("imgs/load.gif")}}';
       form.find('#update_user').html('<span>Saving... </span> <img style=" width: 15px; transform: scale(1.5); " src="' + load + '">');
       form.find('#update_user').attr('disabled' , true);
   },
   success: function(data)
      {
        console.log(form[0].sale_id.value);
        $('.includes'+ form[0].sale_id.value).text(form[0].included_id.options[form[0].included_id.selectedIndex].text);
        $('.modal').modal('hide');
        form.find('#update_user').text('Save');
        form.find('#update_user').attr('disabled' , false);
      },
     error: function(e) 
      {
        $('#ErrliveToast').show();
      }          
    });
 }));

 $(".updatePayment").on('submit',(function(e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  e.preventDefault();
  form = $(this);
  $.ajax({
    url:"{{isset($api) ? route('update_payment_api') : route('update_payment')}}",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
   cache: false,
   processData:false,
   beforeSend : function()
   {
       var load = '{{asset("imgs/load.gif")}}';
       form.find('#update_user').html('<span>Saving... </span> <img style=" width: 15px; transform: scale(1.5); " src="' + load + '">');
       form.find('#update_user').attr('disabled' , true);
   },
   success: function(data)
      {
        console.log(form[0].sale_id.value);
        $('.payments'+ form[0].sale_id.value).text(form[0].payment_option_date.value);
        $('.modal').modal('hide');
        form.find('#update_user').text('Save');
        form.find('#update_user').attr('disabled' , false);
      },
     error: function(e) 
      {
        $('#ErrliveToast').show();
      }          
    });
 }));

 $(".updateCashin").on('submit',(function(e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  e.preventDefault();
  form = $(this);
  $.ajax({
    url:"{{isset($api) ? route('update_cashin_api') : route('update_cashin')}}",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
   cache: false,
   processData:false,
   beforeSend : function()
   {
       var load = '{{asset("imgs/load.gif")}}';
       form.find('#update_user').html('<span>Saving... </span> <img style=" width: 15px; transform: scale(1.5); " src="' + load + '">');
       form.find('#update_user').attr('disabled' , true);
   },
   success: function(data)
      {
        console.log(form[0].sale_id.value);
        $('.cashins'+ form[0].sale_id.value).text(form[0].cashin.value);
        $('.modal').modal('hide');
        form.find('#update_user').text('Save');
        form.find('#update_user').attr('disabled' , false);
 
      },
     error: function(e) 
      {
        $('#ErrliveToast').show();
      }          
    });
 }));

 
 $(".updateCashout").on('submit',(function(e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  e.preventDefault();
  form = $(this);
  $.ajax({
    url:"{{isset($api) ? route('update_cashout_api') : route('update_cashout')}}",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
   cache: false,
   processData:false,
   beforeSend : function()
   {
       var load = '{{asset("imgs/load.gif")}}';
       form.find('#update_user').html('<span>Saving... </span> <img style=" width: 15px; transform: scale(1.5); " src="' + load + '">');
       form.find('#update_user').attr('disabled' , true);
   },
   success: function(data)
      {
        console.log(form[0].sale_id.value);
        $('.cashouts'+ form[0].sale_id.value).text(form[0].cashout.value);
        $('.modal').modal('hide');
        form.find('#update_user').text('Save');
        form.find('#update_user').attr('disabled' , false);
      },
     error: function(e) 
      {
        $('#ErrliveToast').show();
      }          
    });
 }));

 $(".updateBank").on('submit',(function(e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  e.preventDefault();
  form = $(this);
  $.ajax({
    url:"{{isset($api) ? route('update_bank_api') : route('update_bank')}}",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
   cache: false,
   processData:false,
   beforeSend : function()
   {
       var load = '{{asset("imgs/load.gif")}}';
       form.find('#update_user').html('<span>Saving... </span> <img style=" width: 15px; transform: scale(1.5); " src="' + load + '">');
       form.find('#update_user').attr('disabled' , true);
   },
   success: function(data)
      {
        console.log(form[0].sale_id.value);
       // $('.cashouts'+ form[0].sale_id.value).text(form[0].cashout.value);
        $('.modal').modal('hide');
        form.find('#update_user').text('Save');
        form.find('#update_user').attr('disabled' , false);
      },
     error: function(e) 
      {
        $('#ErrliveToast').show();
      }          
    });
 }));


 $(".updateComment").on('submit',(function(e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  e.preventDefault();
  form = $(this);
  $.ajax({
    url:"{{isset($api) ? route('update_comment_api') : route('update_comment')}}",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
   cache: false,
   processData:false,
   beforeSend : function()
   {
       var load = '{{asset("imgs/load.gif")}}';
       form.find('#update_user').html('<span>Saving... </span> <img style=" width: 15px; transform: scale(1.5); " src="' + load + '">');
       form.find('#update_user').attr('disabled' , true);
   },
   success: function(data)
      {
        console.log(form[0].sale_id.value);
        $('.comments'+ form[0].sale_id.value).text(data.success);
        $('.modal').modal('hide');
        form.find('#update_user').text('Save');
        form.find('#update_user').attr('disabled' , false);
      },
     error: function(e) 
      {
        $('#ErrliveToast').show();
      }          
    });
 }));


 $(document).on('click', '#confirm_sale', function(){
  var c_in = $('.cashins'+$(this).attr('sale')).text();
  var c_out = $('.cashouts'+$(this).attr('sale')).text();
  console.log(c_in);
   
  if (c_in == ' N/A N/A')
  {
    alert('you cannot left cash in empty');
    return false;
  }
  if (c_out == ' N/A N/A')
  {
    alert('you cannot left cash out empty');
    return false;
  }
 });

});

</script>
@endsection