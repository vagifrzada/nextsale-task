<?php

namespace App\Controllers;

use App\Resources\UserResource;
use App\Services\UserService;
use App\Resources\UserResources;
use App\Repositories\Interfaces\UserRepositoryInterface;

/**
 * Class UsersController
 * @package App\Controllers
 */
class UsersController extends Controller
{
    private UserRepositoryInterface $userRepository;
    private UserService $userService;

    public function __construct(
        UserRepositoryInterface $userRepository,
        UserService $userService
    )
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }

    public function index()
    {
        $resource = new UserResources($this->userRepository->all());
        echo $this->json($resource->getData());
    }

    public function store()
    {
        // process validation.
        $user = $this->userService->create((int) $this->request('id'), $this->request('name'));
        echo $this->json((new UserResource($user))->getData());
    }
}