@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Modules de conception</div>
                <div class="panel-body">
                    <h1>Liste des modules</h1>


                    <a class="btn btn-primary pull-right" href="{{ route('modules.create') }}" role="button">
                        <span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"> </span>
                        Crée un module
                    </a>

                    <table class="table table-striped table-bordered crud" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Intitulé</th>
                            <th>Prix €</th>
                            <th>Description</th>
                            <th>Nombre article</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($modules as $item)
                            <tr>
                                <td>{{ $item->nom }}</td>
                                <td>{{ $item->prix}}</td>
                                <td>{{  str_limit($item->description,100) }}</td>
                                <td>{{ $item->articles()->count() }}</td>
                                <td style="text-align: center">
                                    <a href="{{ route('modules.edit', $item->id) }}">
                                        <button type="button" class="btn btn-primary btn-xs">Editer</button>
                                    </a>
                                </td>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
