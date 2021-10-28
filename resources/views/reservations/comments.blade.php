<div class="modal fade" id="comment{{$sale->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form enctype="multipart/form-data" class="updateComment" method="post">
               @csrf
               <input type="hidden" name="sale_id" value="{{$sale->id}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-3">
                        <label for="total">Total</label>
                        <input disabled class="form-control" type="number" step="0.1" name="total" id="total">
                      </div>
                      <div class="col-md-1">
                         <div id="add_comment" style=" position: relative; padding: 0px; margin-top: 35px; width: 29px; margin-left: -7px; font-size: 22px; " class="btn btn-info btn-sm">+</div>
                      </div>
                      <div class="col-md-8">
                          <input type="hidden" id="count" value="{{count($sale->comments()) >0  ? count($sale->comments()) : 1}}" name="count">
                          <div id="commentList" class="row">
                           @forelse ($sale->comments() as $key => $comment)
                            <div class="col-md-6">
                              <input type="hidden" value="{{$comment->id}}" name="comment_id_{{$key+1}}">
                              <label for="price_1">Price</label>
                              <input class="form-control" value="{{$comment->price}}" type="number" step="0.1" name="price_{{$key+1}}" id="price_{{$key+1}}">
                            </div>
                            <div class="col-md-6">
                              <label for="comment_1">Comment</label>
                              <input class="form-control" value="{{$comment->comment}}" type="text"  name="comment_{{$key+1}}" id="comment_{{$key+1}}">
                            </div>
                            @empty
                            <div class="col-md-6">
                              <label for="price_1">Price</label>
                              <input class="form-control" value="" type="number" step="0.1" name="price_1" id="price_1">
                            </div>
                            <div class="col-md-6">
                              <label for="name_1">Comment</label>
                              <input class="form-control" value="" type="text"  name="comment_1" id="comment_1">
                            </div>
                            @endforelse
                             

                          </div>
                      </div>
                  </div>
             
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