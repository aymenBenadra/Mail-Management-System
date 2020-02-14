@extends('layout')

@section('content')

    <div class="card push-top push-bottom">
        <div class="card-header">
            <div class="row text-center">
                <a href="{{ route('courriers_'.Auth()->user()->role.'.index') }}" class="card-link col-md-4">Retourner à
                    l'index</a>
                <p class="col-md-4">Montrer un courrier</p>
                @if(Auth()->user()->role == 'admin' or Auth()->user()->role == 'bo')
                    <a href="{{ route('courriers_'.Auth()->user()->role.'.create') }}" class="card-link col-md-4">Créer
                        un nouveau courrier</a>
                @endif
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
            <form>
                @if(Auth()->user()->role == 'admin' or Auth()->user()->role == 'bo' or Auth()->user()->role == 'dr')
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                @csrf
                                @method('PATCH')
                                <label for="expediteur">Expediteur</label>
                                <input type="text" class="form-control" name="expediteur" id="expediteur"
                                       value="{{ $courrier->expediteur }}" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="recepteur">Recepteur</label>
                                <input type="text" class="form-control" name="recepteur" id="recepteur"
                                       value="{{ $courrier->recepteur }}" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="sujet">Sujet</label>
                                <input type="text" class="form-control" name="sujet" id="sujet"
                                       value="{{ $courrier->sujet }}" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="objet">Objet</label>
                                <input type="text" class="form-control" name="objet" id="objet"
                                       value="{{ $courrier->objet }}" readonly/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="corps">Corps</label>
                                <textarea rows="12" cols="50" class="form-control" placeholder="corps"
                                          name="corps" id="corps" readonly>{{ $courrier->corps }}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row push-top">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="treater">Traiter par(treater 1, treater 2...)</label><br>
                                <div class="container">
                                    <div class="form-row ml-2">
                                        <div class="custom-control custom-checkbox col-md-3">
                                            <input type="checkbox" class="custom-control-input" id="DEU"
                                                   name="traiterPar[]"
                                                   value="DEU" disabled
                                                   @if( strpos($courrier->traiterPar , 'DEU') !== false ) checked @endif >
                                            <label class="custom-control-label" for="DEU">DEU</label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-3">
                                            <input type="checkbox" class="custom-control-input" id="DGU"
                                                   name="traiterPar[]"
                                                   value="DGU" disabled
                                                   @if( strpos($courrier->traiterPar , 'DGU') !== false ) checked @endif>
                                            <label class="custom-control-label" for="DGU">DGU</label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-3">
                                            <input type="checkbox" class="custom-control-input" id="DAJF"
                                                   name="traiterPar[]"
                                                   value="DAJF" disabled
                                                   @if( strpos($courrier->traiterPar , 'DAJF') !== false ) checked @endif>
                                            <label class="custom-control-label" for="DAJF">DAJF</label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-3">
                                            <input type="checkbox" class="custom-control-input" id="DAF"
                                                   name="traiterPar[]"
                                                   value="DAF" disabled
                                                   @if( strpos($courrier->traiterPar , 'DAF') !== false ) checked @endif>
                                            <label class="custom-control-label" for="DAF">DAF</label>
                                        </div>
                                    </div>
                                    <div class="form-row ml-2">
                                        <div class="custom-control custom-checkbox col-md-3">
                                            <input type="checkbox" class="custom-control-input" id="Mr.Chafki"
                                                   name="traiterPar[]" value="Mr.Chafki" disabled
                                                   @if( strpos($courrier->traiterPar , 'Mr.Chafki') !== false ) checked @endif>
                                            <label class="custom-control-label" for="Mr.Chafki">Mr.Chafki</label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-3">
                                            <input type="checkbox" class="custom-control-input" id="Mr.Abdouh"
                                                   name="traiterPar[]" value="Mr.Abdouh" disabled
                                                   @if( strpos($courrier->traiterPar , 'Mr.Abdouh') !== false ) checked @endif>
                                            <label class="custom-control-label" for="Mr.Abdouh">Mr.Abdouh</label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-3">
                                            <input type="checkbox" class="custom-control-input" id="SI"
                                                   name="traiterPar[]"
                                                   value="SI" disabled
                                                   @if( strpos($courrier->traiterPar , 'SI') !== false ) checked @endif>
                                            <label class="custom-control-label" for="SI">SI</label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-3">
                                            <input type="checkbox" class="custom-control-input" id="SD"
                                                   name="traiterPar[]"
                                                   value="SD" disabled
                                                   @if( strpos($courrier->traiterPar , 'SD') !== false ) checked @endif>
                                            <label class="custom-control-label" for="SD">SD</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="urgence">Urgence</label>
                                <input type="number" max="3" min="1" placeholder="1" class="form-control"
                                       name="urgence" id="urgence" value="{{ $courrier->urgence }}" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="dateReception">Date de reception</label>
                                <input type="date" class="form-control" name="dateReception" id="dateReception"
                                       value="{{ $courrier->dateReception }}" readonly/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="commentaires">Commentaires</label>
                                <textarea rows="9" cols="50" class="form-control" placeholder="commentaires"
                                          name="commentaires" id="commentaires"
                                          readonly>{{ $courrier->commentaires }}</textarea>
                            </div>
                        </div>
                    </div>
                @endif
                @if(Auth()->user()->role == 'admin' or Auth()->user()->role == 'dv')
                    <?php if (Auth()->user()->role == 'admin') {
                        echo('<hr><div class="form-row push-top"><div class="col-md-6">');
                    }?>
                    <div class="form-group">
                        @if(Auth()->user()->role == 'dv')
                            @csrf
                            @method('PATCH')
                        @endif
                            <label for="traitement">Traitement</label>
                            <textarea rows="8" cols="50" class="form-control" placeholder="traitement"
                                      name="traitement" id="traitement" readonly>{{ $courrier->traitement }}</textarea>
                    </div>
                    <?php if (Auth()->user()->role == 'admin') {
                        echo('</div>');
                    }?>
                @endif
                @if(Auth()->user()->role == 'dv')
                    <div class="form-group">
                        <input type="hidden" value="2" name="statut"/>
                    </div>
                @elseif(Auth()->user()->role == 'admin')
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="statut">Statut</label>
                            <input type="number" class="form-control" id="statut" max="3" min="1"
                                   value="{{ $courrier->statut }}" name="statut" readonly/>
                        </div>
                    </div>
                    <?php if (Auth()->user()->role == 'admin') {
                        echo('</div>');
                    }?>
                @else
                    <div class="form-group">
                        <input type="hidden" value="1" name="statut" readonly/>
                    </div>
                @endif
            </form>
            <div class="card-footer text-muted">
                <div class="row text-center">
                    <a href="{{ route('courriers_'.Auth()->user()->role.'.index') }}"
                       class="card-link col-md-4 d-inline-block">Retourner à l'index</a>
                    <p class="col-md-4">Montrer un courrier</p>
                    @if(Auth()->user()->role == 'admin' or Auth()->user()->role == 'bo')
                        <a href="{{ route('courriers_'.Auth()->user()->role.'.create') }}"
                           class="card-link col-md-4 d-inline-block">Créer un nouveau courrier</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
