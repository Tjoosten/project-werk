<?php

namespace ActivismeBe\Http\Controllers\Backend;

use ActivismeBe\Http\Requests\Backend\NewsUpdateValidator;
use ActivismeBe\Http\Requests\Backend\NewsValidator;
use ActivismeBe\Repositories\ArticleRepository;
use ActivismeBe\Repositories\TagRepository;
use Illuminate\Http\RedirectResponse;
use ActivismeBe\Http\Controllers\Controller;
use Illuminate\View\View;

class ArticleController extends Controller
{
    private $articleRepository;
    private $tagRepository;

    public function __construct(ArticleRepository $articleRepository, TagRepository $tagRepository)
    {
        $this->middleware(['role:admin']);

        $this->articleRepository = $articleRepository;
        $this->tagRepository     = $tagRepository;
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

    public function store(NewsValidator $input): RedirectResponse
    {
        $input->merge(['author_id' => $input->user()->id,]);

        if ($article = $this->articleRepository->create($input->all())) {
            $article->addMedia($input->file('image'))->toMediaCollection('images');

            foreach (array_map('trim', explode(',', $input->categories)) as $category) {
                $category = $this->tagRepository->entity()->firstOrCreate(['name' => $category]);
                $category->articles()->attach($article->id);

                activity('category-activities')->performedOn($category)->causedBy($input->user())
                    ->log("Heeft een categorie aangemaakt ({$category->name}) in het systeem.");
            }

            activity('articles-log')->performedOn($article)->causedBy($input->user())
                ->log("Heeft '{$article->title}' toegevoegd als nieuws artikel.");

            flash("Het nieuws artikel is opgeslagen in het systeem.")->success();
        }

        return redirect()->route('admin.articles.index');
    }

    public function edit($article): View
    {
        $article    = $this->articleRepository->findOrFail($article);

        return view('backend.articles.edit', compact('article', 'categories'));
    }

    public function update(NewsUpdateValidator $input, $article): RedirectResponse
    {
        $input->merge(['author_id' => $input->user()->id]);

        return redirect()->route('admin.articles.index');
    }

    public function delete($article): RedirectResponse
    {
        $article = $this->articleRepository->findOrFail($article);

        if ($article->delete()) {
            $article->tags()->sync([]);

            activity('articles-log')->performedOn($article)->causedBy(auth()->user())
                ->log("Heeft het artikel '{$article->title}' verwijderd");

            flash("Het artikel {$article->title} is verwijderd uit het platform")->success();
        }

        return redirect()->route('admin.articles.index');
    }
}
