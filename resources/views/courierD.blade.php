@extends('layout')

@section('title', 'Bureau d\'ordre |courier depart')

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
                <div class="col-md-10 text-light">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                    Courier Depart
                </div>

                <div class="col">
                    <a class="btn btn-success" data-toggle="modal" data-target="#myModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-envelope-plus-fill" viewBox="0 0 16 16">
                            <path
                                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 4.697v4.974A4.491 4.491 0 0 0 12.5 8a4.49 4.49 0 0 0-1.965.45l-.338-.207L16 4.697Z" />
                            <path
                                d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                        </svg>
                        ajouter</a>
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header text-primary align-middle">
                                    <h3 class="modal-title">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                            <path
                                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                        </svg>
                                        Ajouter Nouveau Courier
                                    </h3>

                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <form action="{{ route('app.add_D') }}" method="post">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="form-group row">
                                            <label for="date" class="col-sm-3 col-form-label">Date envoi</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control"name="date" id="date"
                                                    placeholder="Date envoi">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="Destinataire" class="col-sm-3 col-form-label">Destinataire</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="Destinataire" id="Destinataire"
                                                placeholder=" Nom & Prenom ">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Moyen" class="col-sm-3 col-form-label">Moyen</label>
                                            <div class="col-sm-9">
                                                <select class="custom-select" name="Moyen" id="Moyen">
                                                    <option value="32" selected>32</option>
                                                    <option value="Accord">Accord</option>
                                                    <option value="Amana">Amana</option>
                                                    <option value="Attestation">Attestation</option>
                                                    <option value="Autorisation">Autorisation</option>
                                                    <option value="Autres">Autres</option>
                                                    <option value="BC">BC</option>
                                                    <option value="BE">BE</option>
                                                    <option value="Bulletin">Bulletin</option>
                                                    <option value="certificat">certificat</option>
                                                    <option value="CN">CN</option>
                                                    <option value="CTM">CTM</option>
                                                    <option value="Decision">Decision</option>
                                                    <option value="Demande">Demande</option>
                                                    <option value="Dossier de presse">Dossier de presse</option>
                                                    <option value="Email">Email</option>
                                                    <option value="Facture">Facture</option>
                                                    <option value="Fax">Fax</option>
                                                    <option value="Lettre">Lettre</option>
                                                    <option value="Mail">Mail</option>
                                                    <option value="Message">Message</option>
                                                    <option value="Nantissement">Nantissement</option>
                                                    <option value="Navette">Navette</option>
                                                    <option value="Note">Note</option>
                                                    <option value="Ordonnance">Ordonnance</option>
                                                    <option value="Quitus">Quitus</option>
                                                    <option value="Recommandee">Recommandee</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="réfèrence" class="col-sm-3 col-form-label">Réfèrence</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="réfèrence"
                                                    id="réfèrence" placeholder="réfèrence">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="Frais" class="col-sm-3 col-form-label">Frais</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="Frais" id="Frais"
                                                    placeholder="Frais">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="objet" class="col-sm-3 col-form-label">Objet</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="objet" id="objet"
                                                    placeholder="objet">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="observation" class="col-sm-3 col-form-label">Observation</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="observation"
                                                    id="observation" placeholder="observation">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Sauvegarder</button>
                                        <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">Annuler</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <a href="" class="btn btn-warning" id="printButton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-printer-fill" viewBox="0 0 16 16">
                            <path
                                d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                            <path
                                d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                        </svg>
                        imprimer</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="/search" method="POST" class="form-inline d-flex justify-content-center">
                @csrf
                @method('get')
                <div class="form-group">
                    <input type="text" name="search"
                        placeholder="Entrer Numero OU objet OU Destinataire OU Date d'envoi OU réfèrence"
                        class="form-control mr-5" style="width: 900px" autocomplete="off">
                    <button type="submit" class="btn btn-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                        chercher
                    </button>
                </div>
                @error('search')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror
            </form>
            <div id="printTable">
                <table class="table table-bordered mt-5">
                    <tr>
                        <th>Numero courier</th>
                        <th>Date d'envoi</th>
                        <th>Destinataire</th>
                        <th>Moyen</th>
                        <th>Référence</th>
                        <th>Frais</th>
                        <th>Objet</th>
                        <th>Observation</th>
                        <th>Action</th>
                    </tr>

                    @forelse($data as $d)
                        <tr>
                            <td>{{ $d->numero }}</td>
                            <td>{{ $d->date_env }}</td>
                            <td>{{ $d->destinataire }}</td>
                            <td>{{ $d->moyen }}</td>
                            <td>{{ $d->reference }}</td>
                            <td>{{ $d->frais }}</td>
                            <td>{{ $d->objet }}</td>
                            <td>{{ $d->observation }}</td>
                            <td>
                                <a href="{{ route('app.edit_D',$d->numero) }}" class="btn btn-success editbtn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
                                <a href="{{ route('app.delete_D', $d->numero ) }}" class="btn btn-danger">
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
                            <td colspan="9" class="text-center"> Aucune courier !!!</td>
                        </tr>
                    @endforelse
                </table>
            </div>
            {{ $data->links() }}
        </div>

    </div>
    <script src="App.js"></script>
@endsection