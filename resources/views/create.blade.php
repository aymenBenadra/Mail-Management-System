@extends('layout')

@section('content')

    <div class="card push-top push-bottom">
        <div class="card-header text-center">
            Add Courrier
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
                            <label for="sender">Sender</label>
                            <input type="text" class="form-control" name="sender" id="sender"/>
                        </div>
                        <div class="form-group">
                            <label for="receiver">Receiver</label>
                            <input type="text" class="form-control" name="receiver" id="receiver"/>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject"/>
                        </div>
                        <div class="form-group">
                            <label for="object">Object</label>
                            <input type="text" class="form-control" name="object" id="object"/>
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
                            <label for="treater">Traiter (treater 1, treater 2...)</label><br>
                            <div class="container">
                                <div class="form-row ml-2">
                                    <div class="custom-control custom-checkbox col-md-3">
                                        <input type="checkbox" class="custom-control-input" id="DEU" name="treater[]"
                                               value="DEU">
                                        <label class="custom-control-label" for="DEU">DEU</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-md-3">
                                        <input type="checkbox" class="custom-control-input" id="DGU" name="treater[]"
                                               value="DGU">
                                        <label class="custom-control-label" for="DGU">DGU</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-md-3">
                                        <input type="checkbox" class="custom-control-input" id="DAJF" name="treater[]"
                                               value="DAJF">
                                        <label class="custom-control-label" for="DAJF">DAJF</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-md-3">
                                        <input type="checkbox" class="custom-control-input" id="DAF" name="treater[]"
                                               value="DAF">
                                        <label class="custom-control-label" for="DAF">DAF</label>
                                    </div>
                                </div>
                                <div class="form-row ml-2">
                                    <div class="custom-control custom-checkbox col-md-3">
                                        <input type="checkbox" class="custom-control-input" id="Mr.Chafki"
                                               name="treater[]" value="Mr.Chafki">
                                        <label class="custom-control-label" for="Mr.Chafki">Mr.Chafki</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-md-3">
                                        <input type="checkbox" class="custom-control-input" id="Mr.Abdouh"
                                               name="treater[]" value="Mr.Abdouh">
                                        <label class="custom-control-label" for="Mr.Abdouh">Mr.Abdouh</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-md-3">
                                        <input type="checkbox" class="custom-control-input" id="SI" name="treater[]"
                                               value="SI">
                                        <label class="custom-control-label" for="SI">SI</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-md-3">
                                        <input type="checkbox" class="custom-control-input" id="SD" name="treater[]"
                                               value="SD">
                                        <label class="custom-control-label" for="SD">SD</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="urgency">Urgency</label>
                            <input type="number" max="3" min="1" placeholder="1" class="form-control"
                                   name="urgency" id="urgency"/>
                        </div>
                        <div class="form-group">
                            <label for="receptionDate">Reception date</label>
                            <input type="date" class="form-control" name="receptionDate" id="receptionDate"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="comments">Comments</label>
                            <textarea rows="9" cols="50" class="form-control" placeholder="comments"
                                      name="comments" id="comments"></textarea>
                        </div>
                    </div>
                </div>
                <hr>
                @if(Auth()->user()->role == 'bo')
                    <div class="form-group">
                        <input type="hidden" value="1" name="status"/>
                    </div>
                @elseif(Auth()->user()->role == 'admin')
                    <div class="form-row push-top">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="traitment">Traitment</label>
                                <textarea rows="8" cols="50" class="form-control" placeholder="traitment"
                                          name="traitment" id="traitment"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="number" max="3" min="1" class="form-control" placeholder="1"
                                       name="status" id="status"/>
                            </div>
                        </div>
                    </div>
                @endif
                <button type="submit" class="btn btn-block btn-primary">Create Courrier</button>
            </form>
        </div>
    </div>
@endsection
