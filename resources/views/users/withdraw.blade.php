<div class="modal fade" id="withdraw{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form action="{{route('withdraw_salary')}}" method="post">
               @csrf
               <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Withdraw {{$user->first_name}} salary</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <label for="come">Salary</label>
                <h4 class="text-success fw-bold">${{$user->salary()}}</h4>
                <input  type="hidden" value="{{$user->salary()}}" name="salary" id="salary">
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Withdraw</button>
              </div>
           </form>
      </div>
    </div>
  </div>