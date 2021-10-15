<div class="modal fade" id="edit{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form action="{{route('update_user_time')}}" method="post">
               @csrf
               <input type="hidden" name="time_id" value="{{$user->id}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Attending & Leaving</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <label for="come">Attending</label>
                
                <input class="form-control" type="datetime-local" value="{{$user->come ? \Carbon\Carbon::parse($user->come)->format('Y-m-d').'T'.\Carbon\Carbon::parse($user->come)->format('H:i:s') : '' }}" name="come" id="come">
                <label for="leave">Leaving</label>
                <input class="form-control" type="datetime-local" value="{{ $user->leave ? \Carbon\Carbon::parse($user->leave)->format('Y-m-d').'T'.\Carbon\Carbon::parse($user->leave)->format('H:i:s') : '' }}" name="leave" id="leave">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark">Save</button>
              </div>
           </form>
      </div>
    </div>
  </div>