@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
               
   <h2 class="mb-2">transportations</h2>
      <!-- Table -->
       <div class="row">
 
        <div class="col-12">
          <div style=" padding: 10px; " class="card shadow">


            <div class="card-header border-0">
              <h4 class="mb-0">transportation List</h4>
              <br>
            </div> 
            <a data-bs-toggle="modal" data-bs-target="#add" href="#"><button class="btn" style="    height: 30px;
              border: 1px solid #ddd;
              padding: 0 30px; 
              color: white;
              background: #000000;
              background-image: linear-gradient(
           310deg
           ,#cb0c9f,#cb0c9f);
              margin-left: 23px;
              border-radius: 1px;">+</button></a>
            <div class="table-responsive" style=" min-height: 400px; ">
              <table class="table align-items-center table-flush dataTable">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">transportation Name</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($transportations as $transportation) 
                      <tr>
                        <th scope="row">
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <a href="{{route('profile',$transportation->id)}}" class="mb-0 text-sm">{{$transportation->transportation}}</a>
                            </div>
                          </div>
                        </th>
                        <td class="text-right">
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              Options
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              @if (Auth::user()->role == 1)
                                <li><a class="dropdown-item del"  data-bs-toggle="modal" data-bs-target="#delete" href="#"><input type="hidden" class="id" value="{{$transportation->id}}" >Delete</a></li>
                                <li><a class="dropdown-item getid" data-bs-toggle="modal" data-bs-target="#edit" href="#"><input type="hidden" class="id" value="{{$transportation->id}}" ><input type="hidden" class="name" value="{{$transportation->transportation}}" >Edit</a></li>
                              @endif
                             </ul>
                          </div>
 
                        </td>
                      </tr>
                      @endforeach

                </tbody>
              </table>
            </div>
 
          </div>
        </div>








      </div>
   
   
 
   
        </div>
    </div>
</div>

@include('transportations.delete')
@include('transportations.edit')
@include('transportations.add')




@endsection


@section('scripts')
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js" integrity="sha512-h9kKZlwV1xrIcr2LwAPZhjlkx+x62mNwuQK5PAu9d3D+JXMNlGx8akZbqpXvp0vA54rz+DrqYVrzUGDMhwKmwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
<script type="text/javascript" src="{{asset('js/tasks.js')}}"></script>
<script>
     
     $(document).on('keyup', '#discount', function(){
      $(this).parent().find('#after_salary').val(Number( $(this).parent().find('#current_salary').val()) - Number($(this).val()));
     });

      $('.dataTable').DataTable();
      setInterval(function(){
        
        $('.previous a').html('<i class="bi bi-skip-backward"></i>');
      $('.next a').html('<i class="bi bi-skip-forward"></i>');
      },500);
    
</script>
@endsection