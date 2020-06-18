<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreRole;
use App\Role;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Silber\Bouncer\BouncerFacade as Bouncer;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $roles = Bouncer::role()->all();

        return response()->json($roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRole $request): JsonResponse
    {
        Bouncer::role()->firstOrCreate($request->validated());

        return response()->json(['message' => __('messages.role.created')], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role): JsonResponse
    {
        return response()->json($role);
    }

    /**
     * Assign role for specified user.
     */
    public function assignRole(User $user, StoreRole $role): JsonResponse
    {
        $user->assign($role['name']);

        return response()->json(['message' => __('messages.role.assigned')], Response::HTTP_CREATED);
    }

    /**
     * Retract role for specified user.
     */
    public function retractRole(User $user, StoreRole $role): JsonResponse
    {
        $user->retract($role['name']);

        return response()->json(['message' => __('messages.role.retracted')], Response::HTTP_CREATED);
    }
}
