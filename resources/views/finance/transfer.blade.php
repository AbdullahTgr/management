<div class="modal fade" id="newTransfer{{$sale->res_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form enctype="multipart/form-data" action="{{isset($api) ? route('add_to_transfer_api') : route('add_to_transfer')}}" method="post">
               @csrf
               <input type="hidden" name="res_id" value="{{$sale->res_id}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Transfer Photo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <label for="photo">Transfer Photo</label>
                  <input required class="form-control" type="file" name="photo" id="photo">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
           </form>
      </div>
    </div>
  </div>