<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Harishdurga\LaravelQuiz\Models\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // FIXME scope search not available
        $search = $request->query('search');
        $permissionNames = Auth::user()
            ->getPermissionsViaRoles()
            ->pluck('name');

        if ($permissionNames->contains('view deleted')) {
            $questions = Question::orderBy('name')
                ->where('name', 'like', '%' . $search . '%')
                ->withTrashed()
                ->get();
        } else {
            $questions = Question::orderBy('name')
                ->where('name', 'like', '%' . $search . '%')
                ->get();
        }

        return Inertia::render('Questions/Index', [
            'search' => $search,
            'questions' => $questions->load('question_type', 'options'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
