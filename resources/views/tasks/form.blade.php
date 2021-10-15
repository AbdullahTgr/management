<form action="{{route($form_route)}}" method="post">
   @isset($task)
       <input type="hidden" value="{{$task->id}}" name="task_id">
   @endisset
   <label for="name">Task Name</label>
   <input type="text" class="form-control" name="name" id="name">
</form>