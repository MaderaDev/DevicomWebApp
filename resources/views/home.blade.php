@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <div class="row" style="text-align: center">
                        <div class="col-xs-6 col-md-4">
                            <a href="/gammes" class="thumbnail">
                                <img src="img/gammes.jpg" alt="Gammes" class="img-responsive">
                            </a>
                            <h2>Gammes</h2>
                        </div>
                        <div class="col-xs-6 col-md-4">
                            <a href="/modules" class="thumbnail">
                                <img src="img/modules.jpg" alt="Modules" class="img-responsive">
                            </a>
                            <h2>Modules</h2>
                        </div>
                        <div class="col-xs-6 col-md-4">
                            <a href="/paiements" class="thumbnail">
                                <img src="img/paiements.jpg" alt="Paiements" class="img-responsive">
                            </a>
                            <h2>Paiements</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
