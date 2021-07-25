
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div class="modal-body">              

                  @if (session('success'))
                      <div class="alert alert-success" role="alert">
                          {{ session('success') }}
                      </div>
                  @endif

                  <form method="POST" action="{{ route('createTask')}}" >

                    @csrf
                      <input 
                        class="form-control @error('description') is-invalid @enderror" 
                        placeholder="Descripción" 
                        name="description" 
                        value="{{ old('description') }}"
                        />

                          @error('description')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror

                        <select name="user_id" class="custom-select mt-2 @error('user_id') is-invalid @enderror">
                          @foreach ($users as $user)
                              <option value="{{ $user->id }}">{{ $user->name }}</option>
                          @endforeach
                        </select>

                          @error('user_id')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror

                        <input type="text" class="datepicker form-control mt-2 @error('expiration_date') is-invalid @enderror" placeholder="Fecha expiración tarea" name="expiration_date" value=""/>

                          @error('expiration_date')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror

                      <button class="btn btn-primary mt-2" type="submit">Crear Tarea</button>
                  </form>
          </div>
  
      </div>
    
    </div>
  </div>

</div>
