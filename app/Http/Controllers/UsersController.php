<?php

namespace ActivismeBe\Http\Controllers;

use ActivismeBe\Repositories\PermissionRepository;
use ActivismeBe\Repositories\RoleRepository;
use ActivismeBe\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UsersController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(): View
    {
        return view('backend.users.index', [
            'users' => $this->userRepository->entity()->simplePaginate(15)
        ]);
    }

    public function create(PermissionRepository $permissionRepository, RoleRepository $roleRepository): View
    {
        return view('backend.users.create', ['roles' => $roleRepository->all()]);
    }


    public function destroy($user): RedirectResponse
    {
        $user = $this->userRepository->findOrFail($user);

        if ($user->delete()) {
            flash("{$user->name} is verwijderd uit het platform.")->success();

            activity()->performedOn($user)->causedBy(auth()->user())
                ->log("Heeft {$user->name} verwijderd uit het systeem.");
        }

        return redirect()->route('admin.users.index');
    }
}
