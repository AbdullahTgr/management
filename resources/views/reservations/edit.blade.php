<div class="modal fade" id="edit{{$sale->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form action="{{isset($api) ? route('update_reservation_api') : route('update_reservation')}}" method="post">
               @csrf
               <input type="hidden" name="sale_id" value="{{$sale->id}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Reservation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <label for="confirmation">Confirmation</label>
                    <select name="confirmation" class="form-control" id="confirmation">
                    <option {{$sale->confirmation == 1 ? 'selected' : ''}} value="1">Confirmed</option>
                    <option {{$sale->confirmation == 2 ? 'selected' : ''}} value="2">Not Confirmed</option>
                </select>
             
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" id="confirm_sale" sale='{{$sale->id}}' class="btn btn-primary">Save</button>
              </div>
           </form>
      </div>
    </div>
  </div>