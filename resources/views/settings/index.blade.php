@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form enctype="multipart/form-data" style="display: flex;" action="{{route('update_setting')}}" method="post">
        @csrf
         <input type="hidden" name="id" value="{{$setting->id}}">
        <div class="col-md-6 border-right">
            
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Task Rate Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="labels">Total Monthly Points</label>
                        <input type="number" step="0.1" name="complete_rate" class="form-control" placeholder="how many points you need your employees do per month?" value="{{$setting->complete_rate}}">
                    </div>
                    {{-- <div class="col-md-12">
                        <label class="labels">Late Tasks</label>
                        <input type="number" step="0.1" name="late_rate" class="form-control" placeholder="Enter Task Rate from 1 - 100" value="{{$setting->late_rate}}">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Rejacted</label>
                        <input type="number" step="0.1" name="reject_rate" class="form-control" placeholder="Enter Task Rate from 1 - 100" value="{{$setting->reject_rate}}">
                    </div>
                  --}}
                </div>
                
            </div>
            
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">The Commissions And Targets </h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Target 1</label>
                        <input type="number" step="0.1" name="tr1" class="form-control"  value="{{$setting->target1}}">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Commission For Target 1</label>
                        <input type="number" step="0.1" name="com1" class="form-control"  value="{{$setting->commission1}}">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Target 2</label>
                        <input type="number" step="0.1" name="tr2" class="form-control"  value="{{$setting->target2}}">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Commission For Target 2</label>
                        <input type="number" step="0.1" name="com2" class="form-control"  value="{{$setting->commission2}}">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Target 3</label>
                        <input type="number" step="0.1" name="tr3" class="form-control"  value="{{$setting->target3}}">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Commission For Target 3</label>
                        <input type="number" step="0.1" name="com3" class="form-control"  value="{{$setting->commission3}}">
                    </div>
                </div>
 
 
                <div class="mt-5 text-center"><button class="btn btn-dark profile-button" type="submit">Save</button></div>
            </div>

        </div>
 
    </form>
    </div>
</div>
</div>
</div>

@endsection


@section('scripts')
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js" integrity="sha512-h9kKZlwV1xrIcr2LwAPZhjlkx+x62mNwuQK5PAu9d3D+JXMNlGx8akZbqpXvp0vA54rz+DrqYVrzUGDMhwKmwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
 


@endsection