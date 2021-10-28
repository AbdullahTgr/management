<div class="modal fade" id="include{{$sale->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form  class="updateIncludes" method="post">
               @csrf
               <input type="hidden" name="sale_id" value="{{$sale->id}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Includes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                              <label for="included_id">Included</label>
                             <select class="form-control"  name="included_id" id="included_id">
                                <option value="">No thing included.</option>
                                @foreach ($sale->includes() as $include)
                                  <option {{$include->id == $sale->included_id ? 'selected' : ''}} value="{{$include->id}}">{{$include->include}}</option>
                                @endforeach
                            </select>
                 <br>
               
 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button  id="update_user" type="submit" class="btn btn-primary">Save</button>
              </div>
           </form>
      </div>
    </div>
  </div>