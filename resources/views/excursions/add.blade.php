<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form action="{{route('insertexcursion')}}" method="post">
               @csrf
                <div class="modal-header">
                </div>
                <div class="modal-body">
                  
                  
                  <div class="col-xs-12">
                    Type Excursion Name
                  </div>
                  <div class="col-xs-12">
                    <input type="text" name="excursion_name" value="">
                  </div>
                  <div class="col-xs-12">
                    Select Destination
                  </div>
                  <div class="col-xs-12">
                    <select name="dest_id" required="required">
                      @foreach ($destinations as $destination) 
                        <option selected value="{{$destination->id}}">{{$destination->destination}}</option> 
                      @endforeach
                  </select>
                  </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-dark hide">Add</button>
                </div>

    
           </form> 
      </div>
    </div>
  </div>

  