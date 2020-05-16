<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller
{

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }

    /**
     * Display the specified resource.
     * @param  \App\Course  $course
     */
    public function show(Course $course): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     */
    public function update(Request $request, Course $course): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Course  $course
     */
    public function destroy(Course $course): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }
}
