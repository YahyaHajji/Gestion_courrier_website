@extends('layout')

@section('title','Bureau d\'ordre |contact')

@section('content')


@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
        </button>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
        </button>
</div>
@endif


@if (session('deleted'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('deleted') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
        </button>
</div>
@endif

@if (session('deletederror'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('deletederror') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
        </button>
</div>
@endif


@if (session('UpdateStatus'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('UpdateStatus') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (session('successUpdate'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ session('successUpdate') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif

@if (session('errorUpdate'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
{{ session('errorUpdate') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif

<div class="card mt-5 border border-info w-100">
    <div class="card-header bg bg-info">
        <div class="row">
            <div class="col-md-11 text-light">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                  </svg>
                  Contact
            </div>

            <div class="col">
                <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                      </svg>
                ajouter</a>
                 <!-- The Modal -->
                 <div class="modal" id="myModal">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header text-primary align-middle">
                          <h3 class="modal-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-check" viewBox="0 0 16 16">
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                              </svg>
                              Ajouter Nouveau Contact
                            </h3>
                          
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                          <form action="{{ route('app.add_C') }}" method="post">
                              @csrf
                              <div class="form-group row">
                                <label for="Raison" class="col-sm-3 col-form-label">Raison Social</label>
                                <div class="col-sm-9">
                                  <input type="text" name="Raison" class="form-control" id="Raison" placeholder="Nom & Prenom || Raison social">
                                </div>
                              </div>
                              
                              <div class="form-group row">
                                <label for="Organisme" class="col-sm-3 col-form-label">Organisme</label>
                                    <div class="col-sm-9"> 
                                        <select name="Organisme" class="custom-select" id="Organisme">
                                          <option value=""selected>Choisir...</option>
                                          <option value="Al wilaya">Al wilaya</option>
                                          <option value="Autre">Autre</option>
                                        </select>
                                    </div>
                              </div>
                              <div class="form-group row">
                                <label for="type" class="col-sm-3 col-form-label">Type Contact</label>
                                <div class="col-sm-9"> 
                                    <select name="type" class="custom-select" id="type">
                                        <option value=""selected>Choisir...</option>
                                      <option value="1">One</option>
                                      <option value="2">Two</option>
                                      <option value="3">Three</option>
                                    </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="Activité" class="col-sm-3 col-form-label">Activité</label>
                                <div class="col-sm-9"> 
                                    <select name="Activité" class="custom-select" id="Activité">
                                        <option value=""selected>Choisir...</option>
                                      <option value="1">One</option>
                                      <option value="2">Two</option>
                                      <option value="3">Three</option>
                                    </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="Adresse" class="col-sm-3 col-form-label">Adresse</label>
                                <div class="col-sm-9">
                                  <input type="text" name="Adresse" class="form-control" id="Adresse" placeholder="Adresse">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="Ville" class="col-sm-3 col-form-label">Ville</label>
                                <div class="col-sm-9">
                                  <input type="text" name="Ville" class="form-control" id="Ville" placeholder="Ville">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="Email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                  <input type="email" name="Email" class="form-control" id="Email" placeholder="Email">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="number" class="col-sm-3 col-form-label">Téléphone</label>
                                <div class="col-sm-9">
                                  <input type="number" name="number" class="form-control" id="Etat" placeholder="number">
                                </div>
                              </div>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success">Sauvegarder</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                        </div>
                    </form>
                        </div>
                    </div>
                  </div>
                </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('app.search_C') }}" method="post" class="form-inline d-flex justify-content-center">
          @csrf
          @method('get')
            <div class="form-group">
        <input type="text" name="search" placeholder="Entrer code contact OU Raison social" class="form-control mr-5" 
        style="width: 900px" autocomplete="off">
        <button type="submit" class="btn btn-info">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
              </svg>
              chercher
        </button>
    </div>
    @error('search')
    <span class="text-danger"> {{ $message }}</span>
@enderror
    </form>
         <table class="table table-bordered mt-5">
            <tr>
                <th>Code</th>
                <th>Raison Social</th>
                <th>Organisme</th>
                <th>Type de contact</th>
                <th>Activité</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Email</th>
                <th>Télephone</th>
                <th>Action</th>
            </tr>
            				
            @forelse($data as $d)
            <tr>
                <td>{{ $d->code }}</td>
                <td>{{ $d->raison_social }}</td>
                <td>{{ $d->organisme }}</td>
                <td>{{ $d->type }}</td>
                <td>{{ $d->activite }}</td>
                <td>{{ $d->adresse }}</td>
                <td>{{ $d->ville }}</td>
                <td>{{ $d->email }}</td>
                <td>{{ $d->tel }}</td>
                <td>
                    <a href="{{ route('app.edit_C',$d->code) }}" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                    </a>

                    <a href={{ route('app.delete_C', $d->code ) }} class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path
                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                        </svg>
                    </a>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="10" class="text-center">No Data Found !!!</td>
            </tr>
        @endforelse
    </table>
</div>
{{ $data->links() }}
</div>

</div>
    
@endsection