@extends('layouts.front-end')

@section('content')
    <div class="container my-4">
        {{ Breadcrumbs::render('articles-index') }}

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-newspaper-o"></i> Nieuw artikelen

                        <span class="pull-right">
                            <a href="{{ route('admin.articles.create') }}" class="badge badge-link">
                                <i class="fa fa-plus"></i> Artikel toevoegen
                            </a>
                        </span>
                    </div>

                    <div class="card-body">
                        <table class="table table-sm table-hover">
                            <thead>
                                <th scope="col">#</th>
                                <th scope="col">Status:</th>
                                <th scope="col">Autheur:</th>
                                <th scope="col">Titel:</th>
                                <th colspan="2" scope="col">Toegevoegd op:</th> {{-- Colspan="2" nodig voor de functies --}}
                            </thead>
                            <tbody>
                                @if (count($articles) > 0 )
                                    @foreach ($articles as $article)
                                        <tr>
                                            <td><strong>#{{ $article->id }}</strong></td>
                                            <td> {{-- Status --}}
                                                @if ($article->is_published == 'Y')
                                                    <span class="label label-success">Gepubliceerd</span>
                                                @else
                                                    <span class="badge badge-warning">Klad versie</span>
                                                @endif
                                            </td> {{-- /Status --}}
                                            <td>{{ $article->author->name }}</td>
                                            <td>{{ $article->title }}</td>
                                            <td>
                                                @php (\Carbon\Carbon::setLocale(config('app.locale')))
                                                {{ $article->created_at->diffForHumans() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6"><i>(Er zijn geen artikels gevonden.)</i></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection