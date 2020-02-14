@extends('layout')

@section('content')

    <div class="card push-top push-bottom">
        <div class="card-header">
            <div class="row text-center">
                <a href="{{ route('courriers_OUT.index') }}" class="card-link col-md-4">Retourner à l'index</a>
                <p class="col-md-4">Montrer un courrier</p>
                @if(Auth()->user()->role == 'admin' or Auth()->user()->role == 'bo')
                    <a href="{{ route('courriers_OUT.create') }}" class="card-link col-md-4">Créer un nouveau
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
                                <label for="dateReception">Date de reception</label>
                                <input type="date" class="form-control" name="dateReception" id="dateReception"
                                       value="{{ $courrier->dateEnvoi }}" readonly/>
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
                    <div class="form-row push-top">
                        <ul>
                            @foreach($courrier->documents as $document)
                                <li class="list-group-item w-100">
                                    <label for="filename">Piece joint: {{ $document->filename }}
                                        <a class="btn btn-primary btn-lg form-control"
                                           href="{{ route('download/',$document->filename) }}">Telecharger</a>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
                <div class="card-footer text-muted">
                    <div class="row text-center">
                        <a href="{{ route('courriers_OUT.index') }}"
                           class="card-link col-md-4 d-inline-block">Retourner à l'index</a>
                        <p class="col-md-4">Montrer un courrier</p>
                        @if(Auth()->user()->role == 'admin' or Auth()->user()->role == 'bo')
                            <a href="{{ route('courriers_OUT.create') }}"
                               class="card-link col-md-4 d-inline-block">Créer un nouveau courrier</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
