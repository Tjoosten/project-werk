@extends('layouts.front-end')

@section('content')
    <div class="container my-4">
        {{ Breadcrumbs::render('articles-index') }}

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-newspaper-o"></i> Nieuws artikelen

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
                                                    <span class="badge badge-success">Gepubliceerd</span>
                                                @else
                                                    <span class="badge badge-warning">Klad versie</span>
                                                @endif
                                            </td> {{-- /Status --}}
                                            <td>{{ $article->author->name }}</td>
                                            <td><a href="{{ route('news.show', ['slug' => $article->slug]) }}">{{ $article->title }}</a></td>
                                            <td>
                                                @php (\Carbon\Carbon::setLocale(config('app.locale')))
                                                {{ $article->created_at->diffForHumans() }}
                                            </td>

                                            <td class="text-center"> {{-- Opties --}}
                                                <a href="{{ route('admin.articles.edit', $article) }}" data-toggle="tooltip" data-placement="bottom" title="Wijzig bericht" class="text-muted">
                                                    <i class="fa fa-fw fa-pencil"></i>
                                                </a>

                                                @if ($article->is_published == 'Y')
                                                    <a href="{{ route('admin.status.change', ['article' => $article->id, 'status' => 'N']) }}" data-toggle="tooltip" data-placement="bottom" title="Klad status" class="text-warning">
                                                        <i class="fa fa-fw fa-undo"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('admin.status.change', ['article' => $article->id, 'status' => 'Y']) }}" data-toggle="tooltip" data-placement="bottom" title="Publicatie status" class="text-success">
                                                        <i class="fa fa-fw fa-check"></i>
                                                    </a>
                                                @endif

                                                <a href="{{ route('admin.articles.delete', $article) }}" data-toggle="tooltip" data-placement="bottom" title="Verwijder artikel" class="text-danger">
                                                    <i class="fa fa-fw fa-close"></i>
                                                </a>
                                            </td> {{-- /Opties --}}
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6"><i>(Er zijn geen artikels gevonden.)</i></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        {{ $articles->render('vendor.pagination.simple-bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection