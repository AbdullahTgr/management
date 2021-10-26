<div class="col-md-12">
    <div class="p-3 py-5">
        

             <div class="d-flex justify-content-between align-items-center mt-3 text-warning fw-bold"><span>Total User Income</span> </div>


             <span class="badge bg-warning btn btn-primary"><h6 class="mb-1 mt-1 fw-bold"><h6 class="mb-1 mt-1 fw-bold">{{$allincome}}</h6></h6></span><br>
              <h6>Commission Is: {{$commission}}</h6><br>
             

     
             
             
              
             
        <hr> 
         <div class="col-md-12">
            <ol class="list-group list-group-numbered">
             @forelse ($user->finance() as $finance)
             <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class=" w-100 justify-content-between">
                        <small style="font-size: 11px;padding: 5px;font-weight: bold;color: #878080;"><i class="bi bi-calendar2-day-fill"></i> {{\Carbon\Carbon::parse($finance->created_at)->format('y/m/d')}} <i class="bi bi-clock-fill"></i></small>
                        <h6 class="mb-1 mt-1 fw-bold">{{$finance->client_name}}</h6>
                    </div>
                
                </div>
                <span class="badge bg-warning rounded-pill"> <h6 class="mb-1 mt-1 fw-bold"><h6 class="mb-1 mt-1 fw-bold">{{$finance->commission}}</h6></h6></span>
              </li>
             @empty
                 {{'No Money Added Yet.'}}
             @endforelse 
            </ol>
         </div>

         
    </div>
</div>

{{-- $user->finance() --}}