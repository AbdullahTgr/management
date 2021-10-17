<div class="modal fade" id="approve{{$sale->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form action="{{route('approve_reservation')}}" method="post">
               @csrf
               <input type="hidden" name="sale_id" value="{{$sale->id}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Approve Reservation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <label for="avalability">AVAILABILITY</label>
                    <select name="avalability" class="form-control" id="avalability">
                    <option value="1">AVAILABLE</option>
                    <option value="2">NOT AVAILABLE</option>
                </select>
                <br>
                 <div class="row">
                     <label for="">AVAILABLITY DATE</label>
                     <div class="col-md-6">
                        <label for="from">From</label>
                       <input type="date" name="from" id="from" class="form-control">
                   </div>
                   <div class="col-md-6">
                    <label for="to">To</label>
                   <input type="date" name="to" id="to" class="form-control">
                   </div>
                 </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Reserve</button>
              </div>
           </form>
      </div>
    </div>
  </div>