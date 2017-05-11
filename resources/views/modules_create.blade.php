@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Conception d'un nouveau composant</div>
                    <div class="panel-body">
                        @if(Route::currentRouteName() == 'modules.edit')
                            <h1>Edition</h1>
                        @else
                            <h1>Création d'un module</h1>
                        @endif
                        {!! form($form) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
