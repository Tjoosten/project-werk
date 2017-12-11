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
                <a class="btn btn-primary btn-lg" href="{{ route('visie.index') }}" role="button">
                    <i class="fa fa-info-circle"></i> Onze visie
                </a>

                <a class="btn btn-primary btn-lg" href="{{ route('ondersteuning.index') }}" role="button">
                    <i class="fa fa-heart text-danger"></i> Ondersteun ons
                </a>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8"> {{-- Content --}}
                @foreach ($articles as $article) {{-- Loop through the articles --}} 
                    <div class="card br-card card-shadow mb-4">
                        <img class="card-img-top" style="border-top-left-radius: 3px; border-top-right-radius: 3px;" height="220" src="{{ $article->getFirstMediaUrl('images') }}" alt="{{ $article->title }}">
                        <div class="card-body">
                            <h2 class="card-title icon-jumbotron">{{ $article->title }}</h2>

                            <p class="card-text">
                                @if (strlen(strip_tags($article->message)) > 250)
                                    {!! str_limit($article->message, 255, '...') !!}
                                    <a href="#" class="btn br-card btn-primary">Lees meer &rarr;</a>
                                @else {{-- Lees meer knop is niet nodig. --}}
                                    {!! $article->message !!}
                                @endif
                            </p>
                        </div>
                        <div class="card-footer text-muted">
                            Geplaatst op {{ $article->publish_date->format('d F Y') }}
                            {{-- <span class="pull-right">{{ $article->author->name }}</span> --}}
                        </div>
                    </div>
                @endforeach {{-- /END article loop --}}

                {{ $articles->render('vendor.pagination.simple-bootstrap-4') }} {{-- Pagination instance --}}
            </div> {{-- /END content --}}
        
            <div class="col-lg-4"> {{-- Sidebar --}}

                <div class="card"> {{-- Categories --}}
                    <div class="card-header">Categorieen</div>
                    <div class="card-body">
                        @if (count($tags) > 0) 
                            @foreach ($tags as $tag) {{-- Loop through the tags --}}
                                <a class="badge badge-danger" href="">
                                    {{ $tag->name }}
                                </a>
                            @endforeach
                        @else {{-- Geen categorieen gevonden --}}
                            <i class="text-muted">(Er zijn momenteel geen categorieen.)</i>
                        @endif
                    </div>
                </div> {{-- /END categories --}}

            </div> {{-- /END sidebar --}}
        </div>
    </div>
@endsection