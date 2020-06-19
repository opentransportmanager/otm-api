<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\StoreCourse;
use App\Http\Requests\UpdateCourse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CourseController extends Controller
{
    /**
     * Show list of all Courses.
     */
    public function index(): JsonResponse
    {
        $courses = Course::all();

        return response()->json($courses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourse $request): JsonResponse
    {
        $this->authorize('manage');
        Course::create($request->validated());

        return response()->json(['message' => __('messages.course.created')], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course): JsonResponse
    {
        return response()->json($course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourse $request, Course $course): JsonResponse
    {
        $this->authorize('manage');
        $course->update($request->validated());

        return response()->json(['message' => __('messages.course.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course): JsonResponse
    {
        $this->authorize('manage');
        $course->delete();

        return response()->json(['message' => __('messages.course.deleted')]);
    }
}
