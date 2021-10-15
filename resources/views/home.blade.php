@extends('layouts.app')

@section('content')
<style>
    .card {
    border: none;
    -webkit-box-shadow: 0 0 35px 0 rgba(154,161,171,.15);
    box-shadow: 0 0 35px 0 rgba(154,161,171,.15);
    margin-bottom: 24px
}

.card .header-title {
    margin-bottom: .5rem;
    text-transform: uppercase;
    letter-spacing: .02em;
    font-size: .9rem;
    margin-top: 0
}

.card .card-drop {
    font-size: 20px;
    line-height: 0;
    color: inherit
}

.card .card-widgets {
    float: right;
    height: 16px
}

.card .card-widgets>a {
    color: inherit;
    font-size: 18px;
    display: inline-block;
    line-height: 1
}

.card .card-widgets>a.collapsed i:before {
    content: "\F0415"
}

.card-header,.card-title {
    margin-top: 0
}

.card-disabled {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    border-radius: .25rem;
    background: rgba(255,255,255,.8);
    cursor: progress
}

.card-disabled .card-portlets-loader {
    background-color: #313a46;
    -webkit-animation: rotatebox 1.2s infinite ease-in-out;
    animation: rotatebox 1.2s infinite ease-in-out;
    height: 30px;
    width: 30px;
    position: absolute;
    left: 50%;
    top: 50%;
    margin-left: -12px;
    margin-top: -12px
}
.widget-flat {
    position: relative;
    overflow: hidden
}

 
</style>
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12">

            <div class="row">
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <a href="{{route('users')}}">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="bi bi-people widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Employees</h5>
                                <h3 class="mt-3 mb-3">{{$users}}</h3>
     
                            </div>
                        </a>
                         <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-6">
                    <div class="card widget-flat">
                       <a href="{{route('tasks')}}">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="bi bi-card-checklist widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Completed Tasks</h5>
                            <h3 class="mt-3 mb-3">{{$completed_tasks}}</h3>
                          
                        </div>
                       </a>
                         <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row -->

            <div class="row">
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <a href="{{route('tasks')}}">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="bi bi-card-list widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Incomplete Tasks</h5>
                                <h3 class="mt-3 mb-3">{{$incomplete_tasks}}</h3>
                              
                            </div>
                          </a>
                         <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <a href="{{route('tasks')}}">
                            <div class="card-body">
                            <div class="float-end">
                                <i class="bi bi-list-ol widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Growth">Total Tasks</h5>
                            <h3 class="mt-3 mb-3">{{$tasks}}</h3>
                          
                        </div> 
                       </a>
                        
                        <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row -->

        </div>
    </div>
</div>
@endsection


@section('scripts')
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
@endsection