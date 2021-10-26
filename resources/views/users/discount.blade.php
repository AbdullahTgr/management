<div class="modal fade" id="discount{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form action="{{route('update_user_discount')}}" method="post">
               @csrf
               <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Discount from {{$user->name}} salary</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="come">Current salary</label>
                        <input disabled class="form-control" type="text" id="current_salary" value="{{$user->salary()}}" >
                    </div>
                    <div class="col-md-6">
                        <label for="222">After Discount</label>
                        <input disabled class="form-control" type="text" id="after_salary" value="{{$user->salary()}}" >
                    </div>
                </div>
                <label for="discount">Discount</label>
                <input class="form-control" type="number" step="0.1" name="discount" id="discount">
                <div class="mb-3">
                  <label for="comment" class="form-label">Comment</label>
                  <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark">Discount</button> 
              </div>
           </form>
      </div>
    </div>
  </div> 