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
                <th data-field="expediteur" data-filter-control="input" scope="col">Expediteur</th>
                <th data-field="recepteur" data-filter-control="input" scope="col">Recepteur</th>
                <th data-field="subjet" data-filter-control="input" scope="col">Sujet</th>
                <th data-field="objet" data-filter-control="input" scope="col">Objet</th>
                <th data-field="dateEnvoi" data-filter-control="input" data-sortable="true" scope="col">
                    Date d'envoi
                </th>
                <th data-field="action" scope="col" class="text-center w-100">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 0; ?>
            @foreach($courrier as $courriers)
                @if($courriers->statut < 3 and $courriers->type == 'out')
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
                        <td>{{ custom_echo( $courriers->dateEnvoi, 12) }}</td>
                        <td>
                            <a href="{{ route('courriers_OUT.show', $courriers->id)}}"
                               class="btn btn-primary btn-sm"><i class="far fa-eye"></i></a>
                            <a href="{{ route('courriers_OUT.edit', $courriers->id)}}"
                               class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            @if(Auth()->user()->role == 'admin')
                                <form action="{{ route('courriers_OUT.destroy', $courriers->id)}}" method="post"
                                      style="display: inline-block" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                                    </button>
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
