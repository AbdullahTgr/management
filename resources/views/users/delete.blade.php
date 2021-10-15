  <div class="modal fade" id="delete{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form action="{{route('delete_user')}}" method="post">
               @csrf
               <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Employer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  Are you sure to delete this employer?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger">Yes</button>
              </div>
           </form>
      </div>
    </div>
  </div>