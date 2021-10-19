<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form action="{{route('editexcursion')}}" method="post">
               @csrf
                   <input type="hidden" name="excursion_id" class="modaledit_id" value="" >
                

                <div class="col-xs-12">
                  Type Excursion Name
                </div>
                <div class="col-xs-12">
                  <input type="text" name="excursion_name" class="modaledit_name" value="">
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
                
                <div class="modal-footer">
                  <button type="submit" class="btn btn-dark">Save</button>
                </div>

            






           </form>
      </div>
    </div>
  </div>
  