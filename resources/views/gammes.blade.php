@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Gestion des gammes</div>
                <div class="panel-body">
                    <h2>Gammes</h2>
                    <table class="table table-striped table-bordered crud" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($gammes as $gamme)
                            <tr>

                                <td>{{ $gamme->id }}</td>
                                <td>{{ $gamme->nom }}</td>
                                <td>{{  str_limit($gamme->description,100) }}</td>
                                <td style="text-align: center">
                                    <a href="#">
                                        <button type="button" class="btn btn-primary btn-xs">Editer</button>
                                    </a>
                                </td>
                        @endforeach
                        </tbody>
                    </table>


                    <h2>Lignes de produits</h2>
                    <table class="table table-striped table-bordered crud" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Référence gamme</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lignesProduits as $ligne)
                            <tr>

                                <td>{{ $ligne->id }}</td>
                                <td>{{ $ligne->nom }}</td>
                                <td>{{ $ligne->gamme->nom }}</td>
                                <td>{{  str_limit($ligne->description,100) }}</td>
                                <td style="text-align: center">
                                    <a href="#">
                                        <button type="button" class="btn btn-primary btn-xs">Editer</button>
                                    </a>
                                </td>
                        @endforeach
                        </tbody>
                    </table>

                    <h2>Références</h2>
                    <table class="table table-striped table-bordered crud" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Ligne de produit</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($references as $ref)
                            <tr>

                                <td>{{ $ref->id }}</td>
                                <td>{{ $ref->nom }}</td>
                                <td>{{  str_limit($ref->description,100) }}</td>
                                <td>{{ $ref->ligneProduit->nom }}</td>
                                <td style="text-align: center">
                                    <a href="#">
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