<div class="modal fade" id="edit{{$hotel->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form action="{{route('update_hotel_time')}}" method="post">
               @csrf
               <input type="hidden" name="time_id" value="{{$hotel->id}}">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Attending & Leaving</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-dark">Save</button>
                </div>
           </form>
      </div>
    </div>
  </div>