<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Station;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use Harishdurga\LaravelQuiz\Models\QuestionType;
use App\Models\QuestionOption;

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
            'questions' => $questions->load('options', 'station'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $station_id = Auth::user()->station?->id;
        $stations = Station::orderBy('name')->get();
        $types = QuestionType::all();
        return Inertia::render('Questions/Create', [
            'station_id' => $station_id,
            'stations' => $stations,
            'types' => $types,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'station_id' => 'required|numeric',
            'name' => 'required|string|max:255',
            'question_type_id' => 'required|numeric',
            "option_one" => 'required|string|max:255',
            "option_one_correct" => 'required',
            "option_two" => 'required|string|max:255',
            "option_two_correct" => 'required',
            "option_three" => 'required|string|max:255',
            "option_three_correct" => 'required',
            "option_four" => 'required|string|max:255',
            "option_four_correct" => 'required',
        ]);

        $question = Question::create([
            'station_id' => $request->station_id,
            'name' => $request->name,
            'question_type_id' => $request->question_type_id,
            'is_active' => true,
        ]);

        $option_one = QuestionOption::create([
            'question_id' => $question->id,
            'name' => $request->option_one,
            'is_correct' => $request->option_one_correct,
        ]);

        $option_two = QuestionOption::create([
            'question_id' => $question->id,
            'name' => $request->option_two,
            'is_correct' => $request->option_two_correct,
        ]);

        $option_three = QuestionOption::create([
            'question_id' => $question->id,
            'name' => $request->option_three,
            'is_correct' => $request->option_three_correct,
        ]);

        $option_four = QuestionOption::create([
            'question_id' => $question->id,
            'name' => $request->option_four,
            'is_correct' => $request->option_four_correct,
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
        $activities = Activity::orderBy('created_at', 'desc')
            ->where('subject_type', get_class($question))
            ->where('subject_id', $question->id)
            ->get();
        $station_id = Auth::user()->station?->id;
        $stations = Station::orderBy('name')->get();
        $types = QuestionType::all();
        return Inertia::render('Questions/Edit', [
            'station_id' => $station_id,
            'stations' => $stations,
            'types' => $types,
            'question' => $question->load('options'),
            'activities' => $activities->load('causer'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $validated = $request->validate([
            'station_id' => 'required|numeric',
            'name' => 'required|string|max:255',
            'question_type_id' => 'required|numeric',
            'option_one_id' => 'required|exists:' . QuestionOption::class . ',id',
            "option_one" => 'required|string|max:255',
            "option_one_correct" => 'required',
            'option_two_id' => 'required|exists:' . QuestionOption::class . ',id',
            "option_two" => 'required|string|max:255',
            "option_two_correct" => 'required',
            'option_three_id' => 'required|exists:' . QuestionOption::class . ',id',
            "option_three" => 'required|string|max:255',
            "option_three_correct" => 'required',
            'option_four_id' => 'required|exists:' . QuestionOption::class . ',id',
            "option_four" => 'required|string|max:255',
            "option_four_correct" => 'required',
        ]);

        $question->update([
            'station_id' => $request->station_id,
            'name' => $request->name,
            'question_type_id' => $request->question_type_id,
            'is_active' => true,
        ]);

        $option_one = QuestionOption::find($request->option_one_id)->update([
            'question_id' => $question->id,
            'name' => $request->option_one,
            'is_correct' => $request->option_one_correct,
        ]);

        $option_two = QuestionOption::find($request->option_two_id)->update([
            'question_id' => $question->id,
            'name' => $request->option_two,
            'is_correct' => $request->option_two_correct,
        ]);

        $option_three = QuestionOption::find($request->option_three_id)->update([
            'question_id' => $question->id,
            'name' => $request->option_three,
            'is_correct' => $request->option_three_correct,
        ]);

        $option_four = QuestionOption::find($request->option_four_id)->update([
            'question_id' => $question->id,
            'name' => $request->option_four,
            'is_correct' => $request->option_four_correct,
        ]);

        return redirect()
            ->route('questions.index')
            ->with('success', 'Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->disableLogging();
        $question->update([
            'is_active' => false,
        ]);
        $question->enableLogging();
        $question->delete();

        return redirect()
            ->route('questions.index')
            ->with('warning', 'Question deleted successfully');
    }

    /**
     * Restore the specified resource from deleted state.
     */
    public function restore($id)
    {
        $question = Question::withTrashed()->find($id);

        $question->disableLogging();
        $question->update([
            'is_active' => true,
        ]);
        $question->enableLogging();
        $question->restore();

        return redirect(route('questions.index'))->with('success', 'Question restored successfully');
    }
}
