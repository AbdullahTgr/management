<div class="modal fade" id="payment{{$sale->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form class="updatePayment"  method="post">
               @csrf
               <input type="hidden" name="sale_id" value="{{$sale->id}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payment Option Date</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                    <label for="payment_option_date">Payment Option Date</label>
                    <input class="form-control" value="{{\Carbon\Carbon::parse($sale->payment_option_date)->format('Y-m-d')}}" type="datetime" name="payment_option_date" id="payment_option_date">
                 <br>
               
 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button  id="update_user" type="submit" class="btn btn-primary">Save</button>
              </div>
           </form>
      </div>
    </div>
  </div>