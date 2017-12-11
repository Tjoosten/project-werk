<?php

namespace ActivismeBe\Http\Controllers\Frontend;

use Carbon\Carbon;
use ActivismeBe\Repositories\ArticleRepository;
use ActivismeBe\Repositories\TagRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;
use ActivismeBe\Http\Controllers\Controller;

/**
 * [Frontend]: De controller voor het front-end systeem van nieuws berichten.
 * 
 * @author      Tim Joosten <Topairy@gmail.com>
 * @copyright   2017 Tim Joosten
 */
class ArticleController extends Controller
{
    private $tagRepository;        /** @var TagRepository     $tagRepository     */
    private $articleRepository;    /** @var ArticleRepository $articleRepository */

    /**
     * ArticleController constructor 
     * 
     * @param  TagRepository     $tagRepository     Abstractie laag tussen controller, databank, logica
     * @param  ArticleRepository $articleRepository Abstractie laag tussen controller, databank, logica
     * @return void
     */
    public function __construct(TagRepository $tagRepository, ArticleRepository $articleRepository) 
    {
        $this->tagRepository      = $tagRepository; 
        $this->articleRepository = $articleRepository;
    }

    /**
     * Haal alle nieuwsberichten op uit de databank en geef deze weer.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        if ($this->articleRepository->entity()->count() === 0) {
            // Return the user back to the index if there are no news messages in the database. 
            return redirect()->to(url('/'));
        }

        $articles = $this->articleRepository->entity()
            ->whereDate('publish_date', '>=', Carbon::today()->toDateString())
            ->where('is_published', 'Y')
            ->orderBy('created_at', 'desc');

        return view('frontend.articles.index', [
            'articles' => $articles->simplePaginate(10),
            'tags'     => $this->tagRepository->entity()->inRandomOrder()->take(20)->get(),         
        ]);
    }

    /**
     * 
     *
     * @return \Illuminate\View\View
     */
    public function show($articleSlug): View
    {
        $article = $this->articleRepository->entity()->whereSlug($articleSlug)->firstOrFail();
        $tags    = $this->tagRepository->entity()->inRandomOrder()->take(20)->get();

        return view('frontend.articles.show', compact('article', 'tags'));
    }
}
