<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
         <form action="{{route('editview')}}" method="post">
             @csrf
              <div class="modal-header">
                <input type="hidden" name="view_id" class="modaledit_id" value="" >
                <input type="text" name="view_name" class="modaledit_name" value="">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-dark">Save</button>
              </div>
         </form>
    </div>
  </div>
</div>
