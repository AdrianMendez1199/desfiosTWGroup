@extends('layouts.app')

@section('content')
@include('task.create')

<div class="container">

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Crear Nueva Tarea
    </button>
    
    <div class="row justify-content-center" id="draggable">
    
    @php
      $id = auth()->user()->id;
    @endphp

     @foreach($tasks as $key => $task)
      <div class="col-sm-4">
        <div @class([
          'card',
          'mt-5',
          'border',
          'border-danger' => $task->expiration_date->lt(now())
          ])>
            <div class="card-header">Tarea: {{ $task->id }}</div>
              <div class="card-body">
                <div>Descripción: {{ $task->description }}</div>
                <div>Asignada: {{ $task->user->name }}</div>
                <div><b>Finaliza:</b> {{ $task->expiration_date }}</div>
                <div><b>Estado:</b> {{ $task->completed }}</div>
                <div>Creada por: {{ $task->createdBy->name }}</div>
                <div>{{ $task->created_at->diffForHumans() }}</div>
                  @if($task->user->id === $id)
                    <a href="{{route('logs', ['taskId' => $task->id])}}" class="btn btn-info btn-sm mt-4">Ver Más ...</a>
                  @endif
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