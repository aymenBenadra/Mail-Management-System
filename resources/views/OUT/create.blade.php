@extends('layout')

@section('content')

    <div class="card push-top push-bottom">
        <div class="card-header text-center">
            <div class="row text-center">
                <a href="{{ route('courriers_OUT.index') }}" class="card-link col-md-4">Retourner à l'index</a>
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
            <form method="post" action="{{ route('courriers_OUT.store') }}">
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
                            <label for="dateEnvoi">Date d'envoi<span style="color: darkred">*</span></label>
                            <input type="date" class="form-control" name="dateEnvoi" id="dateEnvoi"/>
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
                <div class="form-group">
                    <input type="hidden" value="out" name="type"/>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Créer un nouveau courrier</button>
            </form>
        </div>
        <div class="card-footer text-muted">
            <div class="row text-center">
                <a href="{{ route('courriers_OUT.index') }}"
                   class="card-link col-md-4 d-inline-block">Retourner à l'index</a>
                <p class="col-md-4">Créer des courriers</p>
            </div>
        </div>
    </div>
@endsection
