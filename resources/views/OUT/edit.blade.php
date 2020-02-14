@extends('layout')

@section('content')

    <div class="card push-top push-bottom">
        <div class="card-header text-center">
            <div class="row text-center">
                <a href="{{ route('courriers_OUT.index') }}" class="card-link col-md-4">Retourner à l'index</a>
                <p class="col-md-4">Mettre à jour des courriers</p>
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
            <form method="post" action="{{ route('courriers_OUT.update', $courrier->id) }}">
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
                            <div class="form-group">
                                <label for="dateReception">Date d'envoi<span style="color: darkred">*</span></label>
                                <input type="date" class="form-control" name="dateReception" id="dateReception"
                                       value="{{ $courrier->dateEnvoi }}"/>
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
                <div class="form-group">
                    <input type="hidden" value="out" name="type"/>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Mettre à jour courrier</button>
            </form>
        </div>
        <div class="card-footer text-muted">
            <div class="row text-center">
                <a href="{{ route('courriers_OUT.index') }}" class="card-link col-md-4">Retourner à l'index</a>
                <p class="col-md-4">Mettre à jour des courriers</p>
                @if(Auth()->user()->role == 'admin' or Auth()->user()->role == 'bo')
                    <a href="{{ route('courriers_OUT.create') }}" class="card-link col-md-4">Créer un nouveau
                        courrier</a>
                @endif
            </div>

        </div>
@endsection
