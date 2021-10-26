<div style="display: none">
               {{-- Get User Commissions --}}

               @php
                $allincome=0;
                $commission=0;
                $commission_ids='';
           @endphp
                       @forelse ($user->finance() as $finance)
           
           @php
              $allincome+=$finance->commission;
              $commission_ids.=','.$finance->id;
           @endphp
                       @empty
                            {{'No Income Yet.'}}
                       @endforelse 
           
                        <div class="d-flex justify-content-between align-items-center mt-3 text-warning fw-bold"><span>Total User Income</span> </div>
           
           
                        <span class="badge bg-warning btn btn-primary"><h6 class="mb-1 mt-1 fw-bold"><h6 class="mb-1 mt-1 fw-bold">{{$allincome}}</h6></h6></span><br>
           
                        @if ( $allincome >= $user->settings()->target1 && $allincome<$user->settings()->target2 )
                           First Target  The Additional Commission Is : 
                            <h6 style="color:green">{{ $commission=$allincome*$user->settings()->commission1/100 }}</h6>
                        @else
           
                           @if ( $allincome >= $user->settings()->target2 && $allincome<$user->settings()->target3 )
                               Second Target  The Additional Commission Is : 
                               <h6 style="color:green">{{ $commission=$allincome*$user->settings()->commission2/100 }}</h6>
                           @else
                           
                               @if ( $allincome >= $user->settings()->target3  )
                                   Third Target The Additional Commission Is : 
                                   <h6 style="color:green">{{ $commission=$allincome*$user->settings()->commission3/100 }}</h6>
                               @else
                               
                               @endif
                           @endif
                        @endif
                        


{{-- End Of Get User Commissions --}}
</div>


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
                
                <label for="come">Commission</label>
                <h4 class="text-success fw-bold">${{$commission}}</h4>
                <input  type="hidden" value="{{$commission}}" name="commission" id="salary">
                <input  type="hidden" value="{{$commission_ids}}" name="commission_ids" id="salary">
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Withdraw</button>
              </div>
           </form>
      </div> 
    </div>
  </div>