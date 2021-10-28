<div class="modal fade" id="cashin{{$sale->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form enctype="multipart/form-data" class="updateCashin" method="post">
               @csrf
               <input type="hidden" name="sale_id" value="{{$sale->id}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cash In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <label for="cashin">Cash In</label>
                  <input {{isset($finance) ? 'disabled' : ''}} class="form-control" value="{{$sale->cashin}}" type="number" step="0.1" name="cashin" id="cashin">
                  <label for="cashin_photo">Photo</label>
                  <img src="{{asset('storage/'. $sale->cashin_photo)}}" id="cashin_photo" class="img-fluid" alt="" srcset="">
                    @if ($sale->cashin_photo)
                   <a download="{{$sale->id . '_' . $sale->cashin}}" href="{{asset('storage/'. $sale->photo)}}">Download</a>
                    @endif
                  <input {{isset($finance) ? 'disabled' : ''}} class="form-control" accept="image/png, image/gif, image/jpeg" type="file"  oninput="cashin_photo.src=window.URL.createObjectURL(this.files[0])" name="cashin_photo" id="cashin_photo">
                 <br>
               
 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{isset($finance) ? 'Close' : 'No'}}</button>
                <button  type="submit" id="update_user" name="update_user" class="btn btn-primary {{isset($finance) ? 'd-none' : ''}}">Save</button>
              </div>
           </form>
      </div>
    </div>
  </div>