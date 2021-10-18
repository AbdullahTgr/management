<div class="modal fade" id="cashin{{$sale->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form enctype="multipart/form-data" action="{{route('update_cashin')}}" method="post">
               @csrf
               <input type="hidden" name="sale_id" value="{{$sale->id}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cash In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <label for="cashin">Cash In</label>
                  <input class="form-control" value="{{$sale->cashin}}" type="number" step="0.1" name="cashin" id="cashin">
                  <label for="cashin_photo">Photo</label>
                  <img src="{{asset('storage/'. $sale->cashin_photo)}}" id="cashin_photo" class="img-fluid" alt="" srcset="">
                  <input class="form-control" accept="image/png, image/gif, image/jpeg" type="file"  oninput="cashin_photo.src=window.URL.createObjectURL(this.files[0])" name="cashin_photo" id="cashin_photo">
                 <br>
               
 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
           </form>
      </div>
    </div>
  </div>