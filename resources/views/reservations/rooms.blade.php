<div class="modal fade" id="rooms{{$sale->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form  class="updateRooms" method="post">
               @csrf
               <input type="hidden" name="sale_id" value="{{$sale->id}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rooms</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                     <div class="row">
                        <div class="col-md-3">
                            <label for="chalet">Chalet</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control mb-1"  name="chalet" id="chalet">
                                <option value="">Null</option>
                                @for ($i = 1; $i < 20; $i++)
                                  <option {{$sale->chalet == $i ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="single">Single</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control mb-1"  name="single" id="single">
                                <option value="">Null</option>
                                @for ($i = 1; $i < 20; $i++)
                                  <option {{$sale->single == $i ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            </div>
                        <div class="col-md-3">
                            <label for="double">Double</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control mb-1"  name="double" id="double">
                                <option value="">Null</option>
                                @for ($i = 1; $i < 20; $i++)
                                <option {{$sale->double == $i ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            </div>
                        <div class="col-md-3">
                            <label for="triple">Triple</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control mb-1"  name="triple" id="triple">
                                <option value="">Null</option>
                                @for ($i = 1; $i < 20; $i++)
                                  <option {{$sale->triple == $i ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
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