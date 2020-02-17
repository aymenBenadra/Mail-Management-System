@extends('layout')

@section('content')

    <div class="card push-top push-bottom">
        <div class="card-header text-center">
            <div class="row text-center">
                <a href="{{ route('courriers_'.Auth()->user()->role.'.index') }}" class="card-link col-md-4">Retourner à
                    l'index</a>
                <p class="col-md-4">Mettre à jour des courriers</p>
                @if(Auth()->user()->role == 'admin' or Auth()->user()->role == 'bo')
                    <a href="{{ route('courriers_'.Auth()->user()->role.'.create') }}" class="card-link col-md-4">Créer
                        un nouveau
                        courrier</a>
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
            <form method="post" action="{{ route('courriers_'.Auth()->user()->role.'.update', $courrier->id) }}">
                @if(Auth()->user()->role == 'admin' or Auth()->user()->role == 'bo' or Auth()->user()->role == 'dr')
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                @csrf
                                @method('PATCH')
                                <label for="expediteur">Expediteur<span style="color: darkred">*</span></label>
                                <input type="text" class="form-control" name="expediteur" id="expediteur"
                                       value="{{ $courrier->expediteur }}"/>
                            </div>
                            <div class="form-group">
                                <label for="recepteur">Recepteur<span style="color: darkred">*</span></label>
                                <input type="text" class="form-control" name="recepteur" id="recepteur"
                                       value="{{ $courrier->recepteur }}"/>
                            </div>
                            <div class="form-group">
                                <label for="sujet">Sujet<span style="color: darkred">*</span></label>
                                <input type="text" class="form-control" name="sujet" id="sujet"
                                       value="{{ $courrier->sujet }}"/>
                            </div>
                            <div class="form-group">
                                <label for="objet">Objet<span style="color: darkred">*</span></label>
                                <input type="text" class="form-control" name="objet" id="objet"
                                       value="{{ $courrier->objet }}"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="corps">Corps</label>
                                <textarea rows="12" cols="50" class="form-control" placeholder="corps"
                                          name="corps" id="corps">{{ $courrier->corps }}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row push-top">
                        <div class="col-md-6">
                            @if(Auth()->user()->role == 'dr' or Auth()->user()->role == 'admin' or Auth()->user()->role == 'bo')
                                <div class="form-group">
                                    <label for="traiterPar">Traiter par(treater 1, treater 2...)</label><br>
                                    <div class="container">
                                        <div class="form-row ml-2">
                                            <div class="custom-control custom-checkbox col-md-3">
                                                <input type="checkbox" class="custom-control-input" id="DEU"
                                                       name="traiterPar[]"
                                                       value="DEU"
                                                       @if( strpos($courrier->traiterPar , 'DEU') !== false ) checked @endif >
                                                <label class="custom-control-label" for="DEU">DEU</label>
                                            </div>
                                            <div class="custom-control custom-checkbox col-md-3">
                                                <input type="checkbox" class="custom-control-input" id="DGU"
                                                       name="traiterPar[]"
                                                       value="DGU"
                                                       @if( strpos($courrier->traiterPar , 'DGU') !== false ) checked @endif>
                                                <label class="custom-control-label" for="DGU">DGU</label>
                                            </div>
                                            <div class="custom-control custom-checkbox col-md-3">
                                                <input type="checkbox" class="custom-control-input" id="DAJF"
                                                       name="traiterPar[]"
                                                       value="DAJF"
                                                       @if( strpos($courrier->traiterPar , 'DAJF') !== false ) checked @endif>
                                                <label class="custom-control-label" for="DAJF">DAJF</label>
                                            </div>
                                            <div class="custom-control custom-checkbox col-md-3">
                                                <input type="checkbox" class="custom-control-input" id="DAF"
                                                       name="traiterPar[]"
                                                       value="DAF"
                                                       @if( strpos($courrier->traiterPar , 'DAF') !== false ) checked @endif>
                                                <label class="custom-control-label" for="DAF">DAF</label>
                                            </div>
                                        </div>
                                        <div class="form-row ml-2">
                                            <div class="custom-control custom-checkbox col-md-3">
                                                <input type="checkbox" class="custom-control-input" id="Mr.Chafki"
                                                       name="traiterPar[]" value="Mr.Chafki"
                                                       @if( strpos($courrier->traiterPar , 'Mr.Chafki') !== false ) checked @endif>
                                                <label class="custom-control-label" for="Mr.Chafki">Mr.Chafki</label>
                                            </div>
                                            <div class="custom-control custom-checkbox col-md-3">
                                                <input type="checkbox" class="custom-control-input" id="Mr.Abdouh"
                                                       name="traiterPar[]" value="Mr.Abdouh"
                                                       @if( strpos($courrier->traiterPar , 'Mr.Abdouh') !== false ) checked @endif>
                                                <label class="custom-control-label" for="Mr.Abdouh">Mr.Abdouh</label>
                                            </div>
                                            <div class="custom-control custom-checkbox col-md-3">
                                                <input type="checkbox" class="custom-control-input" id="SI"
                                                       name="traiterPar[]"
                                                       value="SI"
                                                       @if( strpos($courrier->traiterPar , 'SI') !== false ) checked @endif>
                                                <label class="custom-control-label" for="SI">SI</label>
                                            </div>
                                            <div class="custom-control custom-checkbox col-md-3">
                                                <input type="checkbox" class="custom-control-input" id="SD"
                                                       name="traiterPar[]"
                                                       value="SD"
                                                       @if( strpos($courrier->traiterPar , 'SD') !== false ) checked @endif>
                                                <label class="custom-control-label" for="SD">SD</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="urgence">Urgence<span
                                                style="color: darkred">*</span> :</label>
                                    </div>
                                    <select class="custom-select" id="urgence" name="urgence">
                                        <option value="1" @if($courrier->urgence == 1) selected @endif >Urgent</option>
                                        <option value="2" @if($courrier->urgence == 2) selected @endif >M'en parler
                                        </option>
                                        <option value="3" @if($courrier->urgence == 3) selected @endif >A classer
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dateReception">Date de reception<span
                                        style="color: darkred">*</span></label>
                                <input type="date" class="form-control" name="dateReception" id="dateReception"
                                       value="{{ $courrier->dateReception }}"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="commentaires">Commentaires</label>
                                <textarea rows="9" cols="50" class="form-control" placeholder="comments"
                                          name="commentaires" id="commentaires">{{ $courrier->commentaires }}</textarea>
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
                        <label for="traitement">Traitement<span style="color: darkred">*</span></label>
                        <textarea rows="8" cols="50" class="form-control" placeholder="traitment"
                                  name="traitement" id="traitement">{{ $courrier->traitement }}</textarea>
                    </div>
                    <?php if (Auth()->user()->role == 'admin') {
                        echo('</div>');
                    }?>
                @endif
                @if(Auth()->user()->role == 'dr')
                    <div class="form-group">
                        <input type="hidden" value="2" name="statut"/>
                    </div>
                @elseif(Auth()->user()->role == 'dv')
                    <div class="form-group">
                        <input type="hidden" value="3" name="statut"/>
                    </div>
                @elseif(Auth()->user()->role == 'admin')
                    <div class="col-md-6">
                        <div class="form-group push-top">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="statut">Statut<span
                                            style="color: darkred">*</span> :</label>
                                </div>
                                <select class="custom-select" id="statut" name="statut">
                                    <option value="1" @if($courrier->statut == 1) selected @endif >Saisi</option>
                                    <option value="2" @if($courrier->statut == 2) selected @endif >Verifier</option>
                                    <option value="3" @if($courrier->statut == 3) selected @endif >Traiter</option>
                                    <option value="4" @if($courrier->statut == 4) selected @endif >Cloturé</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <?php if (Auth()->user()->role == 'admin') {
                        echo('</div>');
                    }?>
                @else
                    <div class="form-group">
                        <input type="hidden" value="1" name="statut"/>
                    </div>
                @endif
                <button type="submit" class="btn btn-block btn-primary">Mettre à jour courrier</button>
            </form>
        </div>
        <div class="card-footer text-muted">
            <div class="row text-center">
                <a href="{{ route('courriers_'.Auth()->user()->role.'.index') }}" class="card-link col-md-4">Retourner à
                    l'index</a>
                <p class="col-md-4">Mettre à jour des courriers</p>
                @if(Auth()->user()->role == 'admin' or Auth()->user()->role == 'bo')
                    <a href="{{ route('courriers_'.Auth()->user()->role.'.create') }}" class="card-link col-md-4">Créer
                        un nouveau
                        courrier</a>
                @endif
            </div>
        </div>

    </div>
@endsection
