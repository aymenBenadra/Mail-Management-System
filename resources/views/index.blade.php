@extends('indexLayout')
<?php
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
                <th data-field="sender" data-filter-control="input" scope="col">sender</th>
                <th data-field="receiver" data-filter-control="input" scope="col">receiver</th>
                <th data-field="subject" data-filter-control="input" scope="col">subject</th>
                <th data-field="object" data-filter-control="input" scope="col">object</th>
                <th data-field="traiter" data-filter-control="input" scope="col">treater</th>
                <th data-field="urgency" data-filter-control="select" data-sortable="true" scope="col">urgency</th>
                <th data-field="status" data-filter-control="select" data-sortable="true" scope="col">status</th>
                <th data-field="receptionDate" data-filter-control="input" data-sortable="true" scope="col">
                    receptionDate
                </th>
                <th data-field="action" scope="col" class="text-center w-100">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 0; ?>
            @foreach($courrier as $courriers)
                @if($courriers->status < 3)
                    <tr>
                        <td class="bs-checkbox">
                            <label>
                                <input data-index="{{$i++}}" name="btSelectItem" type="checkbox">
                            </label>
                        </td>
                        <td>{{ custom_echo( $courriers->id, 12) }}</td>
                        <td>{{ custom_echo( $courriers->sender, 2) }}</td>
                        <td>{{ custom_echo( $courriers->receiver, 12) }}</td>
                        <td>{{ custom_echo( $courriers->subject, 12) }}</td>
                        <td>{{ custom_echo( $courriers->object, 12) }}</td>
                        <td>{{ custom_echo( $courriers->treater, 12) }}</td>
                        <td>{{ custom_echo( $courriers->urgency, 12) }}</td>
                        <td>{{ custom_echo( $courriers->status, 12) }}</td>
                        <td>{{ custom_echo( $courriers->receptionDate, 12) }}</td>
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
                                        <label for="name" hidden>
                                            <input type="hidden" class="form-control" name="sender"
                                                   value="{{ $courriers->sender }}"/>
                                        </label>
                                    </div>
                                    <div class="form-group hide">
                                        <label for="receiver" hidden>
                                            <input type="hidden" class="form-control" name="receiver"
                                                   value="{{ $courriers->receiver }}"/>
                                        </label>
                                    </div>
                                    <div class="form-group hide">
                                        <label for="subject" hidden>
                                            <input type="hidden" class="form-control" name="subject"
                                                   value="{{ $courriers->subject }}"/>
                                        </label>
                                    </div>
                                    <div class="form-group hide">
                                        <label for="corps" hidden>
                                            <textarea rows="8" cols="50" class="form-control" placeholder="corps"
                                                      name="corps" hidden>{{ $courriers->corps }}</textarea>
                                        </label>
                                    </div>
                                    <div class="form-group hide">
                                        <label for="comments" hidden>
                                            <textarea rows="8" cols="50" class="form-control" placeholder="comments"
                                                      name="comments" hidden>{{ $courriers->comments }}</textarea>
                                        </label>
                                    </div>
                                    <div class="form-group hide">
                                        <label for="object" hidden>
                                            <input type="hidden" class="form-control" name="object"
                                                   value="{{ $courriers->object }}"/>
                                        </label>
                                    </div>
                                    <div class="form-group hide">
                                        <label for="treater" hidden>
                                            <input type="hidden" class="form-control" name="treater"
                                                   value="{{ $courriers->treater }}"/>
                                        </label>
                                    </div>
                                    <div class="form-group hide">
                                        <label for="urgency" hidden>
                                            <input type="hidden" max="3" min="1" placeholder="1" class="form-control"
                                                   name="urgency"
                                                   value="{{ $courriers->urgency }}"/>
                                        </label>
                                    </div>
                                    <div class="form-group hide">
                                        <label for="receptionDate" hidden>
                                            <input type="hidden" class="form-control" name="receptionDate"
                                                   value="{{ $courriers->receptionDate }}"/>
                                        </label>
                                    </div>
                                    <div class="form-group hide">
                                        <label for="traitment" hidden>
                                            <textarea rows="8" cols="50" class="form-control" placeholder="traitment"
                                                      name="traitment" hidden>{{ $courriers->traitment }}</textarea>
                                        </label>
                                    </div>
                                    <div class="form-group hide">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" value="3" name="status"/>
                                    </div>
                                    <button type="submit" class="btn btn-info"><i class="fas fa-box-open"></i></button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
