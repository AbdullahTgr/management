<div class="modal fade" id="addFinance{{$sale->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form action="{{isset($api) ? route('add_to_finance_api') : route('add_to_finance')}}" method="post">
               @csrf
               <input type="hidden" name="res_id" value="{{$sale->id}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add to finance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                    <label for="notes">Notes</label>
                    <input type="hidden" name="agent_id" value="{{$sale->res_agent_id}}">
                    <input type="hidden" name="hotel_id" value="{{$sale->hotel_id}}">
                    <input type="hidden" name="client_name" value="{{$sale->clint_name}}">
                    <input type="hidden" name="days_nights" value="{{$sale->days_night}}">
                    <input type="hidden" name="checkin" value="{{$sale->checkin}}">
                    <input type="hidden" name="transportation_id" value="{{$sale->transportations}}">
                    <input type="hidden" name="excursion_id" value="{{$sale->excursion}}">
                    <input type="hidden" name="cashin" value="{{$sale->cashin}}">
                    <input type="hidden" name="cashout" value="{{$sale->cashout}}">
                    <input type="hidden" name="bank_id" value="{{$sale->bank_id}}">
  
                    <textarea name="notes" id="notes" cols="30" rows="10" class="form-control"></textarea>
             
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" id="confirm_sale" sale='{{$sale->id}}' class="btn btn-primary">Add</button>
              </div>
           </form>
      </div>
    </div>
  </div>