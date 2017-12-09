<?php

namespace ActivismeBe\Http\Controllers;

use ActivismeBe\Repositories\ActivityRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LogsController extends Controller
{
    private $activityRepository;

    public function __construct(ActivityRepository $activityRepository)
    {
        $this->middleware(['role:admin']);
        $this->activityRepository = $activityRepository;
    }

    public function index(): View
    {
        return view('backend.logs.index', ['logs' => $this->activityRepository->entity()->simplePaginate(20)]);
    }
}
