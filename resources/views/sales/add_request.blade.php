
<div class="modal fade" id="addrequest" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form action="" method="post">
               @csrf
               <input type="hidden" name="res_id" value="">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                    <label>Requset Details</label>
                    <input type="hidden" class="form-control" name="agent_id" value="">
                    
                    <label>Clint_name</label>
                    <input type="text" class="form-control" name="clint_name" value="">
                    
                    <label>Phone_number</label>
                    <input type="text" class="form-control" name="phone_number" value="">
                    
                    <label>Adults</label>
                    <input type="text" class="form-control" name="adults" value="">
                    
                    <label>Kids</label>
                    <input type="text" class="form-control" name="kids" value="">
                    
                    <label>Kids_age</label>
                    <input type="text" class="form-control" name="kids_age" value="">
                    
                    <label>Salescomments</label>
                    <input type="text" class="form-control" name="salescomments" value="">

                    <label>Hotel Name</label>
                    <select class="form-control" name="hotel_id">
                      @foreach ($hotel as $hotel)
                         <option value="{{$hotel->id}}">{{$hotel->type}}<option>
                      @endforeach
                    </select>
                    <label>Trip Type</label>
                    <select class="form-control" name="triptype_id">
                      @foreach ($triptype as $triptype)
                         <option value="{{$triptype->id}}">{{$triptype->type}}<option>
                      @endforeach
                    </select>
                    <label>View</label>
                    <select class="form-control" name="view_id">
                      @foreach ($view as $view)
                         <option value="{{$view->id}}">{{$view->view}}<option>
                      @endforeach
                    </select>
                    <label>Included</label>
                    <select class="form-control" name="included_id">
                      @foreach ($included as $included)
                         <option value="{{$included->id}}">{{$included->included}}<option>
                      @endforeach
                    </select>
                    <label>Transportation</label>
                    <select class="form-control" name="transportation_id">
                      @foreach ($transportation as $transportation)
                         <option value="{{$transportation->id}}">{{$transportation->transportation}}<option>
                      @endforeach
                    </select>
                    <label>Gateway</label>
                    <select class="form-control" name="gateway_id">
                      @foreach ($gateway as $gateway)
                         <option value="{{$gateway->id}}">{{$gateway->gateway}}<option>
                      @endforeach
                    </select>
                    

                    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
           </form>
      </div>
    </div>
  </div>
  
{{-- 
  

                    <label>Destination</label>
                    <select class="form-control" name="hotel">
                      @foreach ($included as $included)
                         <option value="{{$included->id}}">{{$included->included}}<option>
                      @endforeach
                    </select>
excursion


//////////////








days_night

month
checkin
checkout
received_time
response_time





--}}