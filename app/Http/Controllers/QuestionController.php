<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Harishdurga\LaravelQuiz\Models\QuestionType;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $permissionNames = Auth::user()
            ->getPermissionsViaRoles()
            ->pluck('name');

        if ($permissionNames->contains('view deleted')) {
            $questions = Question::orderBy('name')
                ->search()
                ->withTrashed()
                ->get();
        } else {
            $questions = Question::orderBy('name')
                ->search()
                ->get();
        }

        return Inertia::render('Questions/Index', [
            'search' => $search,
            'questions' => $questions->load('question_type', 'options', 'station'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = QuestionType::all();
        return Inertia::render('Questions/Create', [
            'types' => $types,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'question_type_id' => 'required|numeric',
        ]);

        $question = Question::create([
            'name' => $request->name,
            'question_type_id' => $request->question_type_id,
            'is_active' => true,
        ]);

        return redirect()
            ->route('questions.index')
            ->with('success', 'Question created successfully');
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
