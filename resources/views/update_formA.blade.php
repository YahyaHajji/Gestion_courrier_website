@extends('layout')


@section('title', 'Bureau d\'ordre |Modifier courier')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-white bg-dark mb-3">

                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h4>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path
                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                </svg>

                                Modifier Courier
                            </h4>
                        </div>
                        <div class="col">
                            <a href="{{route('app.courierA')}}" class="btn btn-danger">BACK</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('app.update_A')}}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="Numero" class="col-form-label">Numero</label>
                            <input type="number" name="Numero" class="form-control" id="Numero" value="{{$couriers->numero}}"
                                placeholder="Numero">
                        </div>

                        <div class="form-group mb-3">
                            <label for="date" class="col-form-label">Date d'arrivée </label>
                            <input type="date" class="form-control"name="date" id="date" value="{{$couriers->date_arv}}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="Expiditeur" class="col-form-label">Expiditeur</label>
                            <input type="text" class="form-control" name="Expiditeur" id="Expiditeur" value="{{$couriers->expéditeur}}"
                                placeholder="Nom & Prenom">
                        </div>

                 
                        <div class="form-group mb-3">
                            <label for="Moyen" class="col-form-label">Moyen</label>

                            <select class="custom-select" name="Moyen" id="Moyen">
                                <option value="32">32</option>
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
                        
                        <div class="form-group mb-3">
                            <label for="date_exp" class="col-form-label">Date d'expédition</label>
                            <input type="text" class="form-control" name="date_exp" id="date_exp" value="{{$couriers->date_exp}}"
                                placeholder="Date d'expédition">
                        </div>

                        <div class="form-group mb-3">
                            <label for="réfèrence" class="col-form-label">Réfèrence</label>
                            <input type="text" class="form-control" name="réfèrence" id="réfèrence" value="{{$couriers->reference}}"
                                placeholder="réfèrence">
                        </div>
                        <div class="form-group mb-3">
                            <label for="objet" class="col-form-label">Objet</label>

                            <input type="text" class="form-control" name="objet" id="objet" value="{{$couriers->objet}}"
                                placeholder="objet">

                        </div>

                        <div class="form-group mb-3">
                            <label for="observation" class="col-form-label">Observation</label>

                            <input type="text" class="form-control" name="observation" id="observation"
                                value="{{$couriers->observation}}" placeholder="observation">

                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-success">Sauvegarder courier</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
