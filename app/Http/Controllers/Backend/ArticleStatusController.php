<?php

namespace ActivismeBe\Http\Controllers\Backend;

use ActivismeBe\Repositories\ArticleRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;

class ArticleStatusController extends Controller
{
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->middleware('role:admin');
        $this->articleRepository = $articleRepository;
    }

    public function update($article, $status): RedirectResponse
    {
        $article = $this->articleRepository->findOrFail($article);

        if ($article->update(['is_published' => $status])) {
            switch ($status) {
                case 'N': $flashMessage = "De status van {$article->title} is gewijzigd naar 'klad versie'"; break;
                case 'Y': $flashMessage = "De status van {$article->title} is gewijzigd naar 'publicatie'";  break;
            }

            activity('articles-log')->performedOn($article)->causedBy(auth()->user())
                ->log("Heeft de status van het article '{$article->title}' gewijzigd.");

            flash($flashMessage)->success();
        }

        return redirect()->route('admin.articles.index');
    }
}
