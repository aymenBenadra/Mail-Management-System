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
                                <label for="sender">Sender</label>
                                <input type="text" class="form-control" name="sender" id="sender"
                                       value="{{ $courrier->sender }}"/>
                            </div>
                            <div class="form-group">
                                <label for="receiver">Receiver</label>
                                <input type="text" class="form-control" name="receiver" id="receiver"
                                       value="{{ $courrier->receiver }}"/>
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject"
                                       value="{{ $courrier->subject }}"/>
                            </div>
                            <div class="form-group">
                                <label for="object">Object</label>
                                <input type="text" class="form-control" name="object" id="object"
                                       value="{{ $courrier->object }}"/>
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
                                <label for="treater">Traiter (treater 1, treater 2...)</label><br>
                                <div class="container">
                                    <div class="form-row ml-2">
                                        <div class="custom-control custom-checkbox col-md-3">
                                            <input type="checkbox" class="custom-control-input" id="DEU"
                                                   name="treater[]"
                                                   value="DEU"
                                                   @if( strpos($courrier->treater , 'DEU,') !== false ) checked @endif >
                                            <label class="custom-control-label" for="DEU">DEU</label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-3">
                                            <input type="checkbox" class="custom-control-input" id="DGU"
                                                   name="treater[]"
                                                   value="DGU"
                                                   @if( strpos($courrier->treater , 'DGU,') !== false ) checked @endif>
                                            <label class="custom-control-label" for="DGU">DGU</label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-3">
                                            <input type="checkbox" class="custom-control-input" id="DAJF"
                                                   name="treater[]"
                                                   value="DAJF"
                                                   @if( strpos($courrier->treater , 'DAJF,') !== false ) checked @endif>
                                            <label class="custom-control-label" for="DAJF">DAJF</label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-3">
                                            <input type="checkbox" class="custom-control-input" id="DAF"
                                                   name="treater[]"
                                                   value="DAF"
                                                   @if( strpos($courrier->treater , 'DAF,') !== false ) checked @endif>
                                            <label class="custom-control-label" for="DAF">DAF</label>
                                        </div>
                                    </div>
                                    <div class="form-row ml-2">
                                        <div class="custom-control custom-checkbox col-md-3">
                                            <input type="checkbox" class="custom-control-input" id="Mr.Chafki"
                                                   name="treater[]" value="Mr.Chafki"
                                                   @if( strpos($courrier->treater , 'Mr.Chafki,') !== false ) checked @endif>
                                            <label class="custom-control-label" for="Mr.Chafki">Mr.Chafki</label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-3">
                                            <input type="checkbox" class="custom-control-input" id="Mr.Abdouh"
                                                   name="treater[]" value="Mr.Abdouh"
                                                   @if( strpos($courrier->treater , 'Mr.Abdouh,') !== false ) checked @endif>
                                            <label class="custom-control-label" for="Mr.Abdouh">Mr.Abdouh</label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-3">
                                            <input type="checkbox" class="custom-control-input" id="SI" name="treater[]"
                                                   value="SI"
                                                   @if( strpos($courrier->treater , 'SI,') !== false ) checked @endif>
                                            <label class="custom-control-label" for="SI">SI</label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-3">
                                            <input type="checkbox" class="custom-control-input" id="SD" name="treater[]"
                                                   value="SD"
                                                   @if( strpos($courrier->treater , 'SD,') !== false ) checked @endif>
                                            <label class="custom-control-label" for="SD">SD</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="urgency">Urgency</label>
                                <input type="number" max="3" min="1" placeholder="1" class="form-control"
                                       name="urgency" id="urgency" value="{{ $courrier->urgency }}"/>
                            </div>
                            <div class="form-group">
                                <label for="receptionDate">Reception date</label>
                                <input type="date" class="form-control" name="receptionDate" id="receptionDate"
                                       value="{{ $courrier->receptionDate }}"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="comments">Comments</label>
                                <textarea rows="9" cols="50" class="form-control" placeholder="comments"
                                          name="comments" id="comments">{{ $courrier->comments }}</textarea>
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
                        <label for="traitment">Traitment</label>
                        <textarea rows="8" cols="50" class="form-control" placeholder="traitment"
                                  name="traitment" id="traitment">{{ $courrier->traitment }}</textarea>
                    </div>
                    <?php if (Auth()->user()->role == 'admin') {
                        echo('</div>');
                    }?>
                @endif
                @if(Auth()->user()->role == 'dv')
                    <div class="form-group">
                        <input type="hidden" value="2" name="status"/>
                    </div>
                @elseif(Auth()->user()->role == 'admin')
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="number" class="form-control" id="status" max="3" min="1"
                                   value="{{ $courrier->status }}" name="status"/>
                        </div>
                    </div>
                    <?php if (Auth()->user()->role == 'admin') {
                        echo('</div>');
                    }?>
                @else
                    <div class="form-group">
                        <input type="hidden" value="1" name="status"/>
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
