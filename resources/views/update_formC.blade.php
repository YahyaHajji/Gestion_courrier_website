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
                            <a href="{{route('app.contact')}}" class="btn btn-danger">BACK</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('app.update_C',$contact->code)}}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="Raison" class="col-form-label">Raison Social</label>
                            <input type="text" name="Raison" class="form-control" id="Raison" value="{{$contact->raison_social}}"
                                placeholder="Nom & Prenom || Raison social">
                        </div>

                        <div class="form-group mb-3">
                            <label for="Organisme" class="col-form-label">Organisme</label>
                            <div> 
                              @php
                                $myValue = $contact->raison_social;
                              @endphp
                              <select name="Organisme" class="custom-select" id="Organisme">
                                <option value="">Choisir...</option>
                                <option value="Al wilaya" @if($myValue === 'Al wilaya') selected @endif>Al wilaya</option>
                                <option value="Autre"  @if($myValue === 'Autre') selected @endif>Autre</option>
                              </select>
                            </div>
                          </div>
                          

                        <div class="form-group mb-3">
                            <label for="type" class="col-form-label">Type Contact</label>
                                <select name="type" class="custom-select" id="type">
                                    <option value="">Choisir...</option>
                                  <option value="1">One</option>
                                  <option value="2">Two</option>
                                  <option value="3">Three</option>
                                </select>
                    
                        </div>

                 
                        <div class="form-group mb-3">
                            <label for="Activité" class="col-form-label">Activité</label>
              
                                <select name="Activité" class="custom-select" id="Activité">
                                    <option value="">Choisir...</option>
                                  <option value="1">One</option>
                                  <option value="2">Two</option>
                                  <option value="3">Three</option>
                                </select>
                    
                        </div>

                
                        <div class="form-group mb-3">
                            <label for="Adresse" class="col-form-label">Adresse</label>
                              <input type="text" name="Adresse" class="form-control" id="Adresse" value="{{$contact->adresse}}" placeholder="Adresse">
                           
                        </div>

                        <div class="form-group mb-3">
                            <label for="Ville" class="col-form-label">Ville</label>
                           
                                  <input type="text" name="Ville" class="form-control" id="Ville" value="{{$contact->ville}}" placeholder="Ville">
                             
                        </div>
                        <div class="form-group mb-3">
                            <label for="Email" class="col-form-label">Email</label>
                   
                              <input type="email" name="Email" class="form-control" value="{{$contact->email}}" id="Email" placeholder="Email">
                            

                        </div>

                        <div class="form-group mb-3">
                            <label for="number" class="col-form-label">Téléphone</label>
                              <input type="number" name="number" class="form-control" value="{{$contact->tel}}" id="Etat" placeholder="number">
                  

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
