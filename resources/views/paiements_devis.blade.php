@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Renseignements du client</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>Civilité</th>
                                    <td>{{$data->client->civilite}}</td>
                                </tr>
                                <tr>
                                    <th>Nom</th>
                                    <td>{{$data->client->nom}}</td>
                                </tr>
                                <tr>
                                    <th>Prenom</th>
                                    <td>{{$data->client->prenom}}</td>
                                </tr>
                                <tr>
                                    <th>Inscription</th>
                                    <td>
                                    {{ is_null($data->client->created_at)  ? 'N/A' :  $data->client->created_at->format('d/m/Y H:i') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Edition profil</th>
                                    <td>
                                        {{ is_null($data->client->updated_at) ? 'N/A' ? $data->client->updated_at->format('d/m/Y H:i') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$data->client->email}}</td>
                                </tr>
                                <tr>
                                    <th>Téléphone</th>
                                    <td>{{$data->client->telephone}}</td>
                                </tr>
                                <tr>
                                    <th>Adresse</th>
                                    <td>{{$data->client->adresse}}</td>
                                </tr>
                                <tr>
                                    <th>Ville</th>
                                    <td>{{$data->client->ville}}</td>
                                </tr>
                                <tr>
                                    <th>Code postal</th>
                                    <td>{{$data->client->codepostal}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Informations du devis</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>Intitulé</th>
                                    <td>{{$data->nom}}</td>
                                </tr>
                                <tr>
                                    <th>Date de création</th>
                                    <td>
                                        {{ is_null($data->created_at) ? 'N/A' : $data->created_at->format('d/m/Y H:i')  }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Date de modification</th>
                                    <td>
                                        {{ is_null($data->updated_at) ? 'N/A' : $data->updated_at->format('d/m/Y H:i')  }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Êtat du devis</th>
                                    <td>{{$data->status}}</td>
                                </tr>
                                <tr>
                                    <th>Étape du projet</th>
                                    <td>{{$etapeDevis}}</td>
                                </tr>
                                <tr>
                                    <th>Montant total</th>
                                    <td>{{number_format($data->montant, 2, ',', ' ')." €"}}</td>
                                </tr>
                                <tr>
                                    <th>Partie à régler</th>
                                    <td >
                                        <div class="progress" style="margin-bottom: 0px;">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{$pourcentageAttendu}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$pourcentageAttendu}}%;">
                                            {{$pourcentageAttendu." %"}}
                                        </div>
                                            </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Montant dû</th>
                                    <td>{{number_format($montantAttendu, 2, ',', ' ')." €"}}</td>
                                </tr>
                                <tr>
                                    <th>Montant versé</th>
                                    <td>{{number_format($data->solde, 2, ',', ' ')." €"}}</td>
                                </tr>
                                <tr>
                                    <th>Restant à payer</th>
                                    @if($montantAttendu - $data->solde == 0)
                                        <td style="color: green;font-weight:bold">{{number_format($montantAttendu-$data->solde, 2, ',', ' ')." €"}}</td>
                                    @else
                                        <td style="color: red;font-weight:bold">{{number_format($montantAttendu-$data->solde, 2, ',', ' ')." €"}}</td>
                                    @endif
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Contact en charge du devis</div>
                    <div class="panel-body">
                        <div class="table-responsive" style="margin-bottom: 16px;">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>Nom</th>
                                    <td>{{$data->users->nom}}</td>
                                </tr>
                                <tr>
                                    <th>Prenom</th>
                                    <td>{{$data->users->prenom}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$data->users->email}}</td>
                                </tr>
                                <tr>
                                    <th>Fonction</th>
                                    <td>{{$data->users->role}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Suivi du devis</div>
                    <div class="panel-body">
                        <form method="post" action="{{route('applyDevis', ['id' => $data->id])}}">
                            <div class="table-responsive">
                                <table class="table" style="margin-bottom: 0px;">
                                    <tbody>
                                    <tr>
                                        <td class="form-group form-group-sm">
                                            <select class="form-control" id="sel1" name="inputState">
                                                <option hidden selected disabled>Changer l'êtat du devis</option>
                                                <option>Brouillon</option>
                                                <option>En attente</option>
                                                <option>Refusé</option>
                                                <option>Accepté</option>
                                                <option>En commande</option>
                                                <option>En facturation</option>
                                                <option>Clôturé</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form-group form-group-sm">
                                            <select class="form-control" id="sel1" name="inputStep">
                                                <option hidden selected disabled>Changer l'étape du projet</option>
                                                <option>Ouverture du devis avec le client</option>
                                                <option>Signature du devis par le client</option>
                                                <option>Obtention du permis de construire</option>
                                                <option>Ouverture du chantier</option>
                                                <option>Achèvement des fondations</option>
                                                <option>Achèvement des murs</option>
                                                <option>Mise hors d’eau / hors d’air</option>
                                                <option>Achèvement des travaux d'équipement</option>
                                                <option>Remise des clés au client</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="text" class="form-control" placeholder="Ajouter un paiement" aria-describedby="basic-addon2" name="inputPayment">
                                                <span class="input-group-addon" id="basic-addon2"> €</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <td>
                                            <button type="submit" class="btn btn-primary btn">Appliquer les modifications</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Liste des modules associés au devis</div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered crud" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Intitulé</th>
                                <th>Quantité</th>
                                <th>Prix</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($modules as $item)
                                <tr>
                                    <td>{{ $item->module->nom }}</td>
                                    <td>{{ $item->quantite_module }}</td>
                                    <td>{{ $item->module->prix."€" }}</td>
                                    <td>{{ $item->module->description }}</td>
                                    <td style="text-align: center">
                                        <a href="">
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