@extends('layouts.app')

@section('content')

<?php

    $role = Auth::user()->role;
    $myid = Auth::user()->id;

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
             <h2 class="mb-2">User Pehavior</h2>
             <!------ Include the above in your HEAD tag ---------->
             
             
             <div class="container">
                 <div class="row">
                     
                     
                     <div class="col-md-12">
                     <h4>User action Monitoring</h4>
                     <div class="table-responsive">
             
                             
                           <table id="mytable" class="table table-bordred table-striped">
                                
                                <thead>
                                
                                    <th><input type="checkbox" id="checkall" /></th>
                                    <th>Name</th>
                                    <th>Action</th>
                                    <th>Page</th>
                                    <th>View</th>

                                </thead>
                 <tbody>
                 @forelse ($actions as $action)
                    <tr>
                        <td><input type="checkbox" class="checkthis" /></td>
                        <td>{{$action->name}}</td>
                        <td>{{$action->action}}</td>
                        <td>{{$action->page}}</td>
                        
                        <td class="delac" ><input type="hidden" class="deletelog" value="{{$action->actionid}}" ><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil "   > Delete</span></button></p></td>
                     
                    </tr> 
                 @empty
                 <tr>
                    <td>Nothing Is Monitored Yet ...</td>
                 </tr> 
                 
                 @endforelse
                    
                    
                 
                 </tbody>
                     
             </table>
             
             <div class="clearfix"></div>
            
        </div>       
    </div>
    
</div>
    </div>
             
             
             <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                   <div class="modal-dialog">
                 <div class="modal-content">
                       <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                     <h4 class="modal-title custom_align" id="Heading">Delete</h4>
                   </div>
                      <div class="modal-body">
                    
                      </div>
                       <div class="modal-footer "><a href="">
                     <a class="modalhref" href="#"><button type="button" class="btn btn-danger btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"  ></span>Are you sure you want to delete this Record?</button></a>
                   </div>
                     </div>
                 <!-- /.modal-content --> 
               </div>
                   <!-- /.modal-dialog --> 
                 </div>
                 
                 
                 
             
             
    </div>
</div>
@endsection


@section('scripts')
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js" integrity="sha512-h9kKZlwV1xrIcr2LwAPZhjlkx+x62mNwuQK5PAu9d3D+JXMNlGx8akZbqpXvp0vA54rz+DrqYVrzUGDMhwKmwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script type="text/javascript" src="{{asset('js/userlog.js')}}"></script>


@endsection