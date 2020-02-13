@extends('layout')

@section('content')

    <div class="card push-top push-bottom">
        <div class="card-header text-center">
            <div class="row text-center">
                <a href="{{ route('courriers_'.Auth()->user()->role.'.index') }}" class="card-link col-md-4">Return to
                    index</a>
                <p class="col-md-4">Edit & Update</p>
                @if(Auth()->user()->role == 'admin' or Auth()->user()->role == 'bo')
                    <a href="{{ route('courriers_'.Auth()->user()->role.'.create') }}" class="card-link col-md-4">Create
                        new courrier</a>
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
            <form method="post" action="{{ route('courriers_admin.update', $courrier->id) }}">
                @if(Auth()->user()->role == 'admin' or Auth()->user()->role == 'bo' or Auth()->user()->role == 'dr')
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                @csrf
                                @method('PATCH')
                                <label for="expediteur">Sender</label>
                                <input type="text" class="form-control" name="expediteur" id="expediteur"
                                       value="{{ $courrier->expediteur }}"/>
                            </div>
                            <div class="form-group">
                                <label for="recepteur">Receiver</label>
                                <input type="text" class="form-control" name="recepteur" id="recepteur"
                                       value="{{ $courrier->recepteur }}"/>
                            </div>
                            <div class="form-group">
                                <label for="sujet">Subject</label>
                                <input type="text" class="form-control" name="sujet" id="sujet"
                                       value="{{ $courrier->sujet }}"/>
                            </div>
                            <div class="form-group">
                                <label for="objet">Object</label>
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
                            <div class="form-group">
                                <label for="traiterPar">Traiter (treater 1, treater 2...)</label><br>
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
                            <div class="form-group">
                                <label for="urgence">Urgency</label>
                                <input type="number" max="3" min="1" placeholder="1" class="form-control"
                                       name="urgence" id="urgence" value="{{ $courrier->urgence }}"/>
                            </div>
                            <div class="form-group">
                                <label for="dateReception">Reception date</label>
                                <input type="date" class="form-control" name="dateReception" id="dateReception"
                                       value="{{ $courrier->dateReception }}"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="commentaires">Comments</label>
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
                        <label for="traitement">Traitment</label>
                        <textarea rows="8" cols="50" class="form-control" placeholder="traitment"
                                  name="traitement" id="traitement">{{ $courrier->traitement }}</textarea>
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
                            <label for="statut">Status</label>
                            <input type="number" class="form-control" id="statut" max="3" min="1"
                                   value="{{ $courrier->statut }}" name="statut"/>
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
                <button type="submit" class="btn btn-block btn-primary">Update Courrier</button>
            </form>
        </div>
        <div class="card-footer text-muted">
            <div class="row text-center">
                <a href="{{ route('courriers_'.Auth()->user()->role.'.index') }}"
                   class="card-link col-md-4 d-inline-block">Return to
                    index</a>
                <p class="col-md-4">Edit & Update</p>
                <a href="{{ route('courriers_'.Auth()->user()->role.'.create') }}"
                   class="card-link col-md-4 d-inline-block">Create new
                    courrier</a>
            </div>
        </div>

    </div>
@endsection
