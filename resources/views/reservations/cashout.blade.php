<div class="modal fade" id="cashout{{$sale->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form enctype="multipart/form-data" class="updateCashout"  method="post">
               @csrf
               <input type="hidden" name="sale_id" value="{{$sale->id}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cash Out</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-3">
                        <label for="cashout">Total Price</label>
                        <input class="form-control" value="{{$sale->cashout}}" type="number" step="0.1" name="cashout" id="cashout">
                      </div>
                      <div class="col-md-1">
                         <div id="add_cash" style=" position: relative; padding: 0px; margin-top: 35px; width: 29px; margin-left: -7px; font-size: 22px; " class="btn btn-info btn-sm">+</div>
                      </div>
                      <div class="col-md-8">
                          <input type="hidden" id="count" value="{{count($sale->cashouts()) >0  ? count($sale->cashouts()) : 1}}" name="count">
                          <div id="cashList" class="row">
                           @forelse ($sale->cashouts() as $key => $cash)
                            <div class="col-md-6">
                              <input type="hidden" value="{{$cash->id}}" name="cash_id_{{$key+1}}">
                              <label for="cashout_1">Price</label>
                              <input class="form-control" value="{{$cash->price}}" type="number" step="0.1" name="cashout_{{$key+1}}" id="cashout_{{$key+1}}">
                            </div>
                            <div class="col-md-6">
                              <label for="name_1">Name</label>
                              <input class="form-control" value="{{$cash->name}}" type="text"  name="name_{{$key+1}}" id="name_{{$key+1}}">
                            </div>
                            @empty
                            <div class="col-md-6">
                              <label for="cashout_1">Price</label>
                              <input class="form-control" value="" type="number" step="0.1" name="cashout_1" id="cashout_1">
                            </div>
                            <div class="col-md-6">
                              <label for="name_1">Name</label>
                              <input class="form-control" value="" type="text"  name="name_1" id="name_1">
                            </div>
                            @endforelse
                             

                          </div>
                      </div>
                  </div>
             
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