@extends('indexLayout')
<?php
/**
 * a function to manage the length of the text shown in the table cells.
*/
function custom_echo($x, $length)
{
    if (strlen($x) <= $length) {
        echo $x;
    } else {
        $y = substr($x, 0, $length) . '...';
        echo $y;
    }
}
?>
@section('content')
    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>
    <div class="push-top">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br/>
        @endif
        <table id="table"
               data-id-field="ref"
               data-unique-id="ref"
               data-escape="false"
               data-show-fullscreen="true"
               buttonsToolbar="true"
               data-show-pagination-switch="true"
               data-pagination="true"
               data-pagination-loop="true"
               show-button-icons="true"
               data-toggle="table"
               data-search="true"
               data-filter-control="true"
               data-show-export="true"
               data-click-to-select="false"
               data-toolbar="#toolbar"
               class="table-responsive">
            <thead class="thead-dark">
            <tr>
                <th data-field="state" data-checkbox="true">State</th>
                <th data-field="ref" data-filter-control="input" data-sortable="true" scope="col">REF</th>
                <th data-field="sender" data-filter-control="input" scope="col">Expediteur</th>
                <th data-field="receiver" data-filter-control="input" scope="col">Recepteur</th>
                <th data-field="subject" data-filter-control="input" scope="col">Sujet</th>
                <th data-field="object" data-filter-control="input" scope="col">Objet</th>
                <th data-field="traiter" data-filter-control="input" scope="col">Traiter par</th>
                <th data-field="urgency" data-filter-control="select" data-sortable="true" scope="col">Urgence</th>
                <th data-field="status" data-filter-control="select" data-sortable="true" scope="col">Statut</th>
                <th data-field="receptionDate" data-filter-control="input" data-sortable="true" scope="col">
                    Date de reception
                </th>
                <th data-field="action" scope="col" class="text-center w-100">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 0; ?>
            @foreach($courrier as $courriers)
                @if(Auth()->user()->role != 'dv')
                    @if($courriers->statut < 4 and $courriers->type == 'in')
                        <tr>
                            <td class="bs-checkbox">
                                <label>
                                    <input data-index="{{$i++}}" name="btSelectItem" type="checkbox">
                                </label>
                            </td>
                            <td>{{ $courriers->id }}</td>
                            <td>{{ custom_echo( $courriers->expediteur, 12) }}</td>
                            <td>{{ custom_echo( $courriers->recepteur, 12) }}</td>
                            <td>{{ custom_echo( $courriers->sujet, 12) }}</td>
                            <td>{{ custom_echo( $courriers->objet, 12) }}</td>
                            <td>{{ custom_echo( $courriers->traiterPar, 12) }}</td>
                            <td>
                                @switch($courriers->urgence)
                                    @case(1) <span class="badge badge-pill badge-danger w-100">Urgent</span>
                                    @break
                                    @case(2) <span class="badge badge-pill badge-secondary w-100">M'en parler</span>
                                    @break
                                    @case(3) <span class="badge badge-pill badge-light w-100">A classer</span>
                                    @break
                                    @default ''
                                    @break
                                @endswitch
                            </td>
                            <td>
                                @switch($courriers->statut)
                                    @case(1) <span class="badge badge-pill badge-info w-100">Saisi</span>
                                    @break
                                    @case(2) <span class="badge badge-pill badge-success w-100">Verifier</span>
                                    @break
                                    @case(3) <span class="badge badge-pill badge-primary w-100">Traiter</span>
                                    @break
                                    @case(4) <span class="badge badge-pill badge-secondary w-100">Cloturé</span>
                                    @break
                                    @default ''
                                    @break
                                @endswitch
                            </td>

                            <td>{{ custom_echo( $courriers->dateReception, 12) }}</td>
                            <td>
                                <a href="{{ route('courriers_'.Auth()->user()->role.'.show', $courriers->id)}}"
                                   class="btn btn-primary btn-sm"><i class="far fa-eye"></i></a>
                                <a href="{{ route('courriers_'.Auth()->user()->role.'.edit', $courriers->id)}}"
                                   class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                @if(Auth()->user()->role == 'admin')
                                    <form action="{{ route('courriers_admin.destroy', $courriers->id)}}" method="post"
                                          style="display: inline-block" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                @endif

                                @if(Auth()->user()->role == 'dr' or Auth()->user()->role == 'admin')
                                    <form method="post"
                                          action="{{ route('courriers_'.Auth()->user()->role.'.cloture', $courriers->id) }}"
                                          style="display: inline-block" onsubmit="return confirm('Are you sure?');">
                                        <div class="form-group hide">
                                            @csrf
                                            @method('PATCH')
                                            <label for="expediteur" hidden>
                                                <input type="hidden" class="form-control" name="expediteur"
                                                       value="{{ $courriers->expediteur }}"/>
                                            </label>
                                        </div>
                                        <div class="form-group hide">
                                            <label for="recepteur" hidden>
                                                <input type="hidden" class="form-control" name="recepteur"
                                                       value="{{ $courriers->recepteur }}"/>
                                            </label>
                                        </div>
                                        <div class="form-group hide">
                                            <label for="sujet" hidden>
                                                <input type="hidden" class="form-control" name="sujet"
                                                       value="{{ $courriers->sujet }}"/>
                                            </label>
                                        </div>
                                        <div class="form-group hide">
                                            <label for="corps" hidden>
                                            <textarea rows="8" cols="50" class="form-control" placeholder="corps"
                                                      name="corps" hidden>{{ $courriers->corps }}</textarea>
                                            </label>
                                        </div>
                                        <div class="form-group hide">
                                            <label for="commentaires" hidden>
                                            <textarea rows="8" cols="50" class="form-control" placeholder="commentaires"
                                                      name="commentaires"
                                                      hidden>{{ $courriers->commentaires }}</textarea>
                                            </label>
                                        </div>
                                        <div class="form-group hide">
                                            <label for="objet" hidden>
                                                <input type="hidden" class="form-control" name="objet"
                                                       value="{{ $courriers->objet }}"/>
                                            </label>
                                        </div>
                                        @if( strpos($courriers->traiterPar , 'DEU') !== false )
                                            <div class="custom-control custom-checkbox col-md-3 hide" hidden>
                                                <input type="hidden" class="custom-control-input" id="DEU"
                                                       name="traiterPar[]"
                                                       value="DEU"
                                                       checked>
                                                <label class="custom-control-label" for="DEU" hidden>DEU</label>
                                            </div>@endif
                                        @if( strpos($courriers->traiterPar , 'DGU') !== false )
                                            <div class="custom-control custom-checkbox col-md-3 hide" hidden>
                                                <input type="hidden" class="custom-control-input" id="DGU"
                                                       name="traiterPar[]"
                                                       value="DGU"
                                                       checked>
                                                <label class="custom-control-label" for="DGU" hidden>DGU</label>
                                            </div> @endif
                                        @if( strpos($courriers->traiterPar , 'DAJF,') !== false )
                                            <div class="custom-control custom-checkbox col-md-3 hide" hidden>
                                                <input type="hidden" class="custom-control-input" id="DAJF"
                                                       name="traiterPar[]"
                                                       value="DAJF"
                                                       checked>
                                                <label class="custom-control-label" for="DAJF" hidden>DAJF</label>
                                            </div>@endif
                                        @if( strpos($courriers->traiterPar , 'DAF') !== false )
                                            <div class="custom-control custom-checkbox col-md-3 hide" hidden>
                                                <input type="hidden" class="custom-control-input" id="DAF"
                                                       name="traiterPar[]"
                                                       value="DAF"
                                                       checked>
                                                <label class="custom-control-label" for="DAF" hidden>DAF</label>
                                            </div> @endif
                                        @if( strpos($courriers->traiterPar , 'Mr.Chafki') !== false )
                                            <div class="custom-control custom-checkbox col-md-3 hide" hidden>
                                                <input type="hidden" class="custom-control-input" id="Mr.Chafki"
                                                       name="traiterPar[]" value="Mr.Chafki"
                                                       checked>
                                                <label class="custom-control-label" for="Mr.Chafki"
                                                       hidden>Mr.Chafki</label>
                                            </div>@endif
                                        @if( strpos($courriers->traiterPar , 'Mr.Abdouh') !== false )
                                            <div class="custom-control custom-checkbox col-md-3 hide" hidden>
                                                <input type="hidden" class="custom-control-input" id="Mr.Abdouh"
                                                       name="traiterPar[]" value="Mr.Abdouh"
                                                       checked>
                                                <label class="custom-control-label" for="Mr.Abdouh"
                                                       hidden>Mr.Abdouh</label>
                                            </div>@endif
                                        @if( strpos($courriers->traiterPar , 'SI') !== false )
                                            <div class="custom-control custom-checkbox col-md-3 hide" hidden>
                                                <input type="hidden" class="custom-control-input" id="SI"
                                                       name="traiterPar[]"
                                                       value="SI"
                                                       checked>
                                                <label class="custom-control-label" for="SI" hidden>SI</label>
                                            </div>@endif
                                        @if( strpos($courriers->traiterPar , 'SD') !== false )
                                            <div class="custom-control custom-checkbox col-md-3 hide" hidden>
                                                <input type="hidden" class="custom-control-input" id="SD"
                                                       name="traiterPar[]"
                                                       value="SD"
                                                       checked>
                                                <label class="custom-control-label" for="SD" hidden>SD</label>
                                            </div>@endif
                                        <div class="form-group hide" hidden>
                                            <label for="urgence" hidden>
                                                <input type="hidden" max="3" min="1"
                                                       class="form-control"
                                                       name="urgence"
                                                       value="{{ $courriers->urgence }}"/>
                                            </label>
                                        </div>
                                        <div class="form-group hide" hidden>
                                            <label for="dateReception" hidden>
                                                <input type="hidden" class="form-control" name="dateReception"
                                                       value="{{ $courriers->dateReception }}"/>
                                            </label>
                                        </div>
                                        <div class="form-group hide" hidden>
                                            <label for="traitement" hidden>
                                            <textarea rows="8" cols="50" class="form-control" placeholder="traitement"
                                                      name="traitement" hidden>{{ $courriers->traitement }}</textarea>
                                            </label>
                                        </div>
                                        <div class="form-group hide" hidden>
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" value="4" name="statut"/>
                                        </div>
                                        <button type="submit" class="btn btn-info"><i class="fas fa-box-open"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endif
                @else
                    @if( strpos($courriers->traiterPar, Auth()->user()->name) !== false and $courriers->statut < 4 and $courriers->type == 'in')
                        <tr>
                            <td class="bs-checkbox">
                                <label>
                                    <input data-index="{{$i++}}" name="btSelectItem" type="checkbox">
                                </label>
                            </td>
                            <td>{{ $courriers->id }}</td>
                            <td>{{ custom_echo( $courriers->expediteur, 12) }}</td>
                            <td>{{ custom_echo( $courriers->recepteur, 12) }}</td>
                            <td>{{ custom_echo( $courriers->sujet, 12) }}</td>
                            <td>{{ custom_echo( $courriers->objet, 12) }}</td>
                            <td>{{ custom_echo( $courriers->traiterPar, 12) }}</td>
                            <td>
                                @switch($courriers->urgence)
                                    @case(1) <span class="badge badge-pill badge-danger w-100">Urgent</span>
                                    @break
                                    @case(2) <span class="badge badge-pill badge-secondary w-100">M'en parler</span>
                                    @break
                                    @case(3) <span class="badge badge-pill badge-light w-100">A classer</span>
                                    @break
                                    @default ''
                                    @break
                                @endswitch
                            </td>
                            <td>
                                @switch($courriers->statut)
                                    @case(1) <span class="badge badge-pill badge-info w-100">Saisi</span>
                                    @break
                                    @case(2) <span class="badge badge-pill badge-success w-100">Verifier</span>
                                    @break
                                    @case(3) <span class="badge badge-pill badge-primary w-100">Traiter</span>
                                    @break
                                    @case(4) <span class="badge badge-pill badge-secondary w-100">Cloturé</span>
                                    @break
                                    @default ''
                                    @break
                                @endswitch
                            </td>
                            <td>{{ custom_echo( $courriers->dateReception, 12) }}</td>
                            <td>
                                <a href="{{ route('courriers_'.Auth()->user()->role.'.show', $courriers->id)}}"
                                   class="btn btn-primary btn-sm"><i class="far fa-eye"></i></a>
                                <a href="{{ route('courriers_'.Auth()->user()->role.'.edit', $courriers->id)}}"
                                   class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    @endif
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
