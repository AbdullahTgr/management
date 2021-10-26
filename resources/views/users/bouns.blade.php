<div class="modal fade" id="bouns{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form action="{{route('update_user_bouns')}}" method="post">
               @csrf
               <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bouns To {{$user->name}} salary</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                
                <div class="row">
                    <div class="col-md-6">
                        <label for="bouns_current_salary">Current salary</label>
                        <input disabled class="form-control" type="text" id="bouns_current_salary" value="{{$user->salary()}}" >
                    </div>
                    <div class="col-md-6">
                        <label for="bouns_after_salary">After Bouns</label>
                        <input disabled class="form-control" type="text" id="bouns_after_salary" value="{{$user->salary()}}" >
                    </div>
                </div>

                <label for="bouns">Bouns</label>
                <input class="form-control" type="number" step="0.1" name="bouns" id="bouns">
                <div class="mb-3">
                  <label for="comment" class="form-label">Comment</label>
                  <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark">Bouns</button>
              </div>
           </form>
      </div>
    </div>
  </div>