<div class="modal fade bd-example-modal-lg" id="addrequest"   role="dialog"  >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       <form action="request_hotel" method="post">
               @csrf
               <input required type="hidden" name="sales_agent_id" value="{{Auth::user()->id}}">
               

               
               
             


               




            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row gutters-sm">
                    <input required type="hidden" class="form-control" name="agent_id" value="">
                  
                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                          <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Clint Data</i></h6>
                          <label>Clint Name</label>
                              <input required type="text" class="form-control" name="clint_name" value="">
                              <label>Phone number</label>
                              <input required type="text" class="form-control" name="phone_number" value="">
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                          <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Persons</i></h6>
                             
                              <label>Adults</label>
                              <input required type="text" class="form-control" name="adults" value="">
                              
                              <label>Kids</label>
                              <input required type="text" class="form-control" name="kids" value="">
                              
                              <label>Kids_age</label>
                              <input required type="text" class="form-control" name="kids_age" value="">
                        </div>
                      </div>
                    </div>
                    

                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                          <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Days/Night</i></h6>
                             
                            <label>Days/Night</label>
                            <select class="form-control" name="days_night">
                              @for ($i=1; $i<=31;$i++)
                                <option value="{{$i}} Days/{{$i-1}} Nights">{{$i}} Days/{{$i-1}} Nights</option>
                              @endfor
                              
                            </select>
                            

                            <label>Month</label>
                              <select class="form-control" name="month">
                                @for ($i=1; $i<=12;$i++)
                                  <option value="{{$i}}">{{$i}}</option>
                                @endfor
                                
                              </select>

                              <label>Check in</label>

                              <select class="form-control" name="checkin">
                                @for ($i=1; $i<=31;$i++)
                                  <option value="{{$i}}">{{$i}}</option>
                                @endfor
                                 
                              </select>
                              <label>Check out</label>
                              <select class="form-control" name="checkout">
                                @for ($i=1; $i<=31;$i++)
                                  <option value="{{$i}}">{{$i}}</option>
                                @endfor
                                 
                              </select>

                              
                              
                        </div>
                      </div>
                    </div>












                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                          <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Hotel</i></h6>
                             
                    <label>Hotel Name</label>
                    <select class="form-control" name="hotel_id">
                      @foreach ($hotel as $hotel)
                         <option value="{{$hotel->id}}">{{$hotel->type}}</option>
                      @endforeach
                    </select>
                    <label>Trip Type</label>
                    <select class="form-control" name="triptype_id">
                      @foreach ($triptype as $triptype)
                         <option value="{{$triptype->id}}">{{$triptype->type}}</option>
                      @endforeach
                    </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                          <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Trip Type</i></h6>
                        
                            <label>View</label>
                            <select class="form-control" name="view_id">
                              @foreach ($view as $view)
                                <option value="{{$view->id}}">{{$view->view}}</option>
                              @endforeach
                            </select>
                            <label>Included</label>
                            <select class="form-control" name="included_id">
                              @foreach ($included as $included) 
                                <option value="{{$included->id}}">{{$included->include}}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                    </div> 
                    
                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                          <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Details</i></h6>
                        
                    <label>Transportation</label>
                    <select class="form-control" name="transportations">
                      @foreach ($transportation as $transportation)
                         <option value="{{$transportation->id}}">{{$transportation->transportation}}</option>
                      @endforeach
                    </select>
                          
                    <label>Gateway</label>
                    <select class="form-control" name="gateway">
                      @foreach ($gateway as $gateway)
                         <option value="{{$gateway->id}}">{{$gateway->gateway}}</option> 
                      @endforeach
                    </select>
                        </div>
                      </div>
                    </div> 
                    
                    
                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                          <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Sales Comments</i></h6>
                          <textarea type="text" class="form-control" name="salescomments" ></textarea>

                        </div>
                      </div>
                    </div> 

                    
                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                          <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Destination</i></h6>
                          <select class="form-control dist_select" name="destination_id">
                            <option>Select Destination ...</option>
                            @foreach ($destinations as $destination)
                               <option  value="{{$destination->id}}">{{$destination->destination}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div> 

                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body ">
                          <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Excursions</i></h6>
                          <select class="form-control excursions_select" name="excursion"></select>
                        </div>
                      </div>
                    </div> 

                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body ">
                          <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Received Time</i></h6>
                          <input required type="date" class="form-control" name="received_time" value="">
                        </div>
                      </div>
                    </div> 
                    

                    <div class="col-sm-6 mb-3">

                      <article class="list-group-item">
                        <header class="filter-header">
                          <a href="" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" class="collapsed">
                            <i class="icon-action fa fa-chevron-down click_sendemail"></i>
                            <h6 class="title click_sendemail">Send Email ?</h6>
                            <input type="hidden" class="sendemail" name="send_email" value="0">
                          </a>
                        </header>
                        <div class="filter-content collapse " id="collapse1" style="">			
                        
                      <div class="card h-100">
                        <div class="card-body">
                          <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Send Email For Customer</i></h6>

                              <label>Clint Email</label>
                              <input  type="email" class="form-control" name="email" value="">
                              <label>Message Title</label>
                              <input  type="text" class="form-control" name="subject" value="">
                              <label>Message Content</label>
                              <textarea   class="form-control" name="message" ></textarea>
                              
                        </div>
                      </div>
                          
                        </div> <!-- collapse -filter-content  .// -->
                      </article>



                    </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
           </form>
    </div>
  </div>
</div>


  
