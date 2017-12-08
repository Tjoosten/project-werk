<?php

namespace ActivismeBe\Http\Controllers\Backend;

use ActivismeBe\Repositories\ArticleRepository;
use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;
use Illuminate\View\View;

class ArticleController extends Controller
{
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->middleware(['role:admin']);
        $this->articleRepository = $articleRepository;
    }

    public function index(): View
    {
        return view('backend.articles.index', [
            'articles' => $this->articleRepository->entity()->simplePaginate(15)
        ]);
    }

    public function create(): View
    {
        return view('backend.articles.create');
    }
}
