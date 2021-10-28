<div class="modal fade" id="bank{{$sale->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form enctype="multipart/form-data" class="updateBank" method="post">
               @csrf
               <input type="hidden" name="sale_id" value="{{$sale->id}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bank Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="row">

                      <div class="col-md-1">
                         <div id="add_bank" style=" position: relative; padding: 0px; margin-top: 35px; width: 29px; margin-left: -7px; font-size: 22px; " class="btn btn-info btn-sm {{isset($finance) ? 'd-none' : ''}}">+</div>
                      </div>
                      <div class="col-md-12">
                          <input type="hidden"   id="bank_count" value="{{count($sale->banks()) >0  ? count($sale->banks()) : 1}}" name="count">
                          <div id="bankList" class="row">
                           @forelse ($sale->banks() as $key => $bank)
                            <div class="col-md-4">
                                <input type="hidden" value="{{$bank->id}}" name="bank_id_{{$key+1}}">
                                <label for="photo_{{$key+1}}">Photo</label>
                                <img src="{{asset('storage/' . $bank->photo)}}" class="img-fluid" alt="" srcset="">
                                @if ($bank->photo)
                                <a download="{{$bank->id . '_' . $bank->name}}" href="{{asset('storage/'. $bank->photo)}}">Download</a>
                                 @endif
                                <input {{isset($finance) ? 'disabled' : ''}} class="form-control"  type="file" name="photo_{{$key+1}}" id="photo_{{$key+1}}">
                            </div>
                            <div class="col-md-4">
                                <label for="name_{{$key+1}}">Bank</label>
                                <input {{isset($finance) ? 'disabled' : ''}} class="form-control" value="{{$bank->name}}" type="text"  name="name_{{$key+1}}" id="name_{{$key+1}}">
                            </div>
                            <div class="col-md-4">
                                <label for="account_{{$key+1}}">Account Num</label>
                                <input {{isset($finance) ? 'disabled' : ''}} class="form-control" value="{{$bank->account}}" type="text"  name="account_{{$key+1}}" id="account_{{$key+1}}">
                            </div>
                            @empty
                            <div class="col-md-4 {{isset($finance) ? 'd-none' : ''}}">
                                <label for="photo_1">Photo</label>
                                <input class="form-control"  type="file" name="photo_1" id="photo_1">
                            </div>
                            <div class="col-md-4 {{isset($finance) ? 'd-none' : ''}}">
                                <label for="name_1">Bank</label>
                                <input class="form-control" value="" type="text"  name="name_1" id="name_1">
                            </div>
                            <div class="col-md-4 {{isset($finance) ? 'd-none' : ''}}">
                                <label for="account_1">Account Num</label>
                                <input class="form-control" value="" type="text"  name="account_1" id="account_1">
                            </div>
                            @endforelse
                             

                          </div>
                      </div>
                  </div>
             
                 <br>
               
 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{isset($finance) ? 'Close' : 'No'}}</button>
                <button type="submit"  id="update_user" class="btn btn-primary {{isset($finance) ? 'd-none' : ''}}">Save</button>
              </div>
           </form>
      </div>
    </div>
  </div>