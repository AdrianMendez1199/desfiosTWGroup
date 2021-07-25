@extends('layouts.app')

@section('content')

    <div class="container">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Crear nuevo Comentario
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Crear Comentario</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('log') }}">
                @csrf
                 <input placeholder="Comentario" name="comment" class="form-control @error('comment') is-invalid @enderror" />
                  @error('comment')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                 <button class="btn btn-primary mt-2">Guardar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

         @foreach($logs as $key => $log)
          <div class="card mt-2 col col-sm-4">
            <div class="card-body">
              <div> Comentario: {{ $log->comment; }} </div>
              <div> {{ $log->created_at->diffForHumans(); }} </div>
            </div>
          </div>
         @endforeach 
     
    </div>

@endsection