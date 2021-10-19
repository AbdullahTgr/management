<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form action="{{route('insertgateway')}}" method="post">
               @csrf
                <div class="modal-header">
                  <input type="text" name="gateway_name" value="">
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-dark">Save</button>
                </div>
           </form>
      </div>
    </div>
  </div>
  