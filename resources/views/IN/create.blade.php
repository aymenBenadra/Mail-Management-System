@extends('layout')

@section('content')

    <div class="card push-top push-bottom">
        <div class="card-header text-center">
            <div class="row text-center">
                <a href="{{ route('courriers_'.Auth()->user()->role.'.index') }}" class="card-link col-md-4">Retourner à
                    l'index</a>
                <p class="col-md-4">Créer des courriers</p>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form method="post" action="{{ route('courriers_'.Auth()->user()->role.'.store') }}">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            @csrf
                            <label for="expediteur">Expediteur<span style="color: darkred">*</span></label>
                            <input type="text" class="form-control" name="expediteur" id="expediteur"/>
                        </div>
                        <div class="form-group">
                            <label for="recepteur">Recepteur<span style="color: darkred">*</span></label>
                            <input type="text" class="form-control" name="recepteur" id="recepteur"/>
                        </div>
                        <div class="form-group">
                            <label for="sujet">Sujet<span style="color: darkred">*</span></label>
                            <input type="text" class="form-control" name="sujet" id="sujet"/>
                        </div>
                        <div class="form-group">
                            <label for="objet">Objet<span style="color: darkred">*</span></label>
                            <input type="text" class="form-control" name="objet" id="objet"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="corps">Corps</label>
                            <textarea rows="12" cols="50" class="form-control" placeholder="corps"
                                      name="corps" id="corps"></textarea>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-row push-top">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Traiter par(treater 1, treater 2...)</label><br>
                            <div class="container">
                                <div class="form-row ml-2">
                                    <div class="custom-control custom-checkbox col-md-3">
                                        <input type="checkbox" class="custom-control-input" id="DEU" name="traiterPar[]"
                                               value="DEU">
                                        <label class="custom-control-label" for="DEU">DEU</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-md-3">
                                        <input type="checkbox" class="custom-control-input" id="DGU" name="traiterPar[]"
                                               value="DGU">
                                        <label class="custom-control-label" for="DGU">DGU</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-md-3">
                                        <input type="checkbox" class="custom-control-input" id="DAJF"
                                               name="traiterPar[]"
                                               value="DAJF">
                                        <label class="custom-control-label" for="DAJF">DAJF</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-md-3">
                                        <input type="checkbox" class="custom-control-input" id="DAF" name="traiterPar[]"
                                               value="DAF">
                                        <label class="custom-control-label" for="DAF">DAF</label>
                                    </div>
                                </div>
                                <div class="form-row ml-2">
                                    <div class="custom-control custom-checkbox col-md-3">
                                        <input type="checkbox" class="custom-control-input" id="Mr.Chafki"
                                               name="traiterPar[]" value="Mr.Chafki">
                                        <label class="custom-control-label" for="Mr.Chafki">Mr.Chafki</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-md-3">
                                        <input type="checkbox" class="custom-control-input" id="Mr.Abdouh"
                                               name="traiterPar[]" value="Mr.Abdouh">
                                        <label class="custom-control-label" for="Mr.Abdouh">Mr.Abdouh</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-md-3">
                                        <input type="checkbox" class="custom-control-input" id="SI" name="traiterPar[]"
                                               value="SI">
                                        <label class="custom-control-label" for="SI">SI</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-md-3">
                                        <input type="checkbox" class="custom-control-input" id="SD" name="traiterPar[]"
                                               value="SD">
                                        <label class="custom-control-label" for="SD">SD</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="urgence">Urgence<span style="color: darkred">*</span></label>
                            <input type="number" max="3" min="1" class="form-control"
                                   name="urgence" id="urgence"/>
                        </div>
                        <div class="form-group">
                            <label for="dateReception">Date reception<span style="color: darkred">*</span></label>
                            <input type="date" class="form-control" name="dateReception" id="dateReception"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="commentaires">Commentaires</label>
                            <textarea rows="9" cols="50" class="form-control" placeholder="comments"
                                      name="commentaires" id="commentaires"></textarea>
                        </div>
                    </div>
                </div>
                <hr>
                @if(Auth()->user()->role == 'bo')
                    <div class="form-group">
                        <input type="hidden" value="1" name="statut"/>
                    </div>
                @elseif(Auth()->user()->role == 'admin')
                    <div class="form-row push-top">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="traitement">Traitement</label>
                                <textarea rows="8" cols="50" class="form-control" placeholder="traitment"
                                          name="traitement" id="traitement"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="statut">Statut<span style="color: darkred">*</span></label>
                                <input type="number" max="3" min="1" class="form-control"
                                       name="statut" id="statut"/>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <input type="hidden" value="in" name="type"/>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Créer un nouveau courrier</button>
            </form>
        </div>
        <div class="card-footer text-muted">
            <div class="row text-center">
                <a href="{{ route('courriers_'.Auth()->user()->role.'.index') }}"
                   class="card-link col-md-4 d-inline-block">Retourner à l'index</a>
                <p class="col-md-4">Créer des courriers</p>
            </div>
        </div>
    </div>
@endsection
