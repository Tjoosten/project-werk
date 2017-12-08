@extends('layouts.front-end')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            {{-- Default value = display-3 but changed to 4 due responsive bug. --}}
            <h1 class="display-4">{{ config('app.name', 'Laravel') }},</h1>
            <p class="lead">
                Een klein collectief. Dat opkomten voor Daklozen, Vluchtelingen, Ook zetten wij in voor wereldvrede en andere sociale punten.
            </p>
            <hr class="my-4">
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="" role="button">
                    <i class="fa fa-info-circle"></i> Onze visie
                </a>

                <a class="btn btn-primary btn-lg" href="" role="button">
                    <i class="fa fa-heart text-danger"></i> Ondersteun ons
                </a>
            </p>
        </div>
    </div>
@endsection