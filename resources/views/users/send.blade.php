<div class="modal fade" id="send" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form action="{{isset($all) ? route('send_all_notification') : route('send_notification')}}" method="post">
               @csrf
               <input type="hidden" name="user_id" value="{{isset($all) ? '' : $user->id}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Send notification to {{$user->first_name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
              <div class="modal-body">
                <label for="message">Message body</label>
                <textarea class="form-control" id="message" name="message"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark">Send</button>
              </div>
           </form>
      </div>
    </div>
  </div>