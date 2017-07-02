<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Facture Maison Modulaire Madera</title>

    <style>
        .invoice-box{
            max-width:800px;
            margin:auto;
            padding:30px;
            border:1px solid #eee;
            box-shadow:0 0 10px rgba(0, 0, 0, .15);
            font-size:16px;
            line-height:24px;
            font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color:#555;
        }

        .invoice-box table{
            width:100%;
            line-height:inherit;
            text-align:left;
        }

        .invoice-box table td{
            padding:5px;
            vertical-align:top;
        }

        .invoice-box table tr td:nth-child(2){
            text-align:right;
        }

        .invoice-box table tr.top table td{
            padding-bottom:20px;
        }

        .invoice-box table tr.top table td.title{
            font-size:45px;
            line-height:45px;
            color:#333;
        }

        .invoice-box table tr.information table td{
            padding-bottom:40px;
        }

        .invoice-box table tr.heading td{
            background:#eee;
            border-bottom:1px solid #ddd;
            font-weight:bold;
        }

        .invoice-box table tr.details td{
            padding-bottom:20px;
        }

        .invoice-box table tr.item td{
            border-bottom:1px solid #eee;
        }

        .invoice-box table tr.item.last td{
            border-bottom:none;
        }

        .invoice-box table tr.total td:nth-child(2){
            border-top:2px solid #eee;
            font-weight:bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td{
                width:100%;
                display:block;
                text-align:center;
            }

            .invoice-box table tr.information table td{
                width:100%;
                display:block;
                text-align:center;
            }
        }

        @media print {
            @page {
                size: auto;   /* auto is the initial value */
                margin: 0;  /* this affects the margin in the printer settings */
            }
            .btnprint {
                display: none;
            }
            .invoice-box{
                max-width: 100%;
                border:none;
                box-shadow: none;
            }

        }


    </style>

    <script>
        function myprint() {
            window.print();
        }
    </script>

</head>

<body>

<div style="text-align:center;margin-bottom:30px" class="btnprint">
    <button onclick="myprint()">Imprimer ce devis</button>

</div>

<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <img width="200px" src="{{asset('img/logo.png')}}" alt="">
                        </td>

                        <td>
                            Devis #: {{$data->id}}<br>
                            Crée le :  {{ is_null($data->client->created_at)  ? 'N/A' :  $data->client->created_at->format('d/m/Y H:i') }}<br>
                            Modifié le : {{ is_null($data->client->updated_at) ? 'N/A' : $data->client->updated_at->format('d/m/Y H:i') }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            {{$data->client->nom}} {{$data->client->prenom}}<br>
                            {{$data->client->adresse}}<br>
                            {{$data->client->codepostal}}, {{$data->client->ville}}<br>
                            {{$data->client->email}}
                        </td>

                        <td>
                            Madera - Création de maison modulaire<br>
                            {{$data->users->nom}} {{$data->users->prenom}}<br>
                            {{$data->users->email}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>


        <tr class="heading">
            <td>
                Module
            </td>

            <td>
                Prix
            </td>
        </tr>

        @foreach($modules as $item)
        <tr class="item">
            <td>
                {{ $item->module->nom }} (Qte: {{ $item->quantite_module }})
            </td>
            <td>
                {{ $item->module->prix."€" }}
            </td>
        </tr>
        @endforeach


        <tr class="total">
            <td></td>

            <td>
                Montant total: {{number_format($data->montant, 2, ',', ' ')." €"}}
            </td>
        </tr>
    </table>
</div>
</body>
</html>