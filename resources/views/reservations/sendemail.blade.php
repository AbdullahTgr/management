<div class="modal fade" id="sendemail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
           <form action="{{route('send_email')}}" method="post">
               @csrf

               <div class="col-sm-12 ">

                <div class="card h-100">
                  <div class="card-body">
                    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Send Email For Customer</i></h6>

                    <label>Clint Email</label>
                    <input  type="email" class="form-control mailmodal" name="email" value="">
                    <label>CC</label>
                    <input  type="email" class="form-control " name="cc" value="">
                        <label>Message Title</label>
                        <input  type="text" class="form-control" name="subject" value="">
                        <label>Message Content</label>
                        <textarea   class="form-control" name="message" ></textarea>
                        <br>
                        <input  type="submit" class="form-control"  value="Send">
                        
                  </div>
                </div>



</div>
           </form>
      </div>
    </div>
  </div> 


  
