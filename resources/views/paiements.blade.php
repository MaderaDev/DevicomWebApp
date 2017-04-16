@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Gestion des devis</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered crud" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Intitulé</th>
                                <th>Montant total</th>
                                <th>Date de creation</th>
                                <th>Date de modification</th>
                                <th>Status</th>
                                <th>Client</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($devis as $item)
                            <tr>
                            <td>{{ $item->nom }}</td>
                            <td>{{ $item->montant }}</td>
                            <td>{{ $item->date_creation }}</td>
                            <td>{{ $item->date_modification }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->client->prenom." ".$item->client->nom }}</td>
                            <td style="text-align: center">
                                <a href="{{route('devis', ['id' => $item->id])}}">
                                    <button type="button" class="btn btn-primary btn-xs">Afficher</button>
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
