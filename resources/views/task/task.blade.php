@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" id="draggable">
     @foreach($tasks as $key => $task)
      <div class="col-sm-4">
        <div class="card mt-5">
            <div class="card-header">Tarea: {{ $task->id }}</div>
              <div class="card-body">
  
                <div>Descripción: {{ $task->description }}</div>
                <div>Asignada: {{ $task->user->name }}</div>
                <div><b>Finaliza:</b> {{ $task->expiration_date }}</div>
                <div><b>Estado:</b> {{ $task->completed }}</div>
                <div>Creada por: {{ $task->createdBy->name }}</div>
                <div>{{ $task->created_at->diffForHumans() }}</div>
              </div>
        </div>
      </div>
      @endforeach
    </div>
</div>

<script>
    $('.datepicker').datepicker({
        minDate: 0,
        beforeShowDay: $.datepicker.noWeekends,
        dateFormat: 'yy-mm-dd'
    });

    $("#draggable .card").each(function(index, item) {
      $(item).draggable()
    });

</script>

@endsection