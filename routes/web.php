<?php

use Inertia\Inertia;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\WinnerController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\PassportController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\SurveyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome/Index', [
        'event' => [
            'card' => 'player',
            'title' => 'TM One Convention 2025',
            'image' => '/images/Banner-01-2025.jpg',
            'description' => 'Powering The Next',
        ],
        'leaderboards' => Group::orderBy('points', 'desc')->with('awards')->limit(3)->get(),
        'groups' => Group::orderBy('points', 'desc')->get(),
    ]);
})->name('/');

Route::get('/lucky-draw', function () {
    return Inertia::render('Winners/LuckyDraw');
})->name('winners.draw');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/passport', [PassportController::class, 'index'])->name('passport');

    Route::get('/members', [MemberController::class, 'index'])->name('members.index');

    Route::get('/checkins', [CheckinController::class, 'index'])->name('checkins.index');
    Route::get('/checkins/{uuid}', [CheckinController::class, 'create'])->name('checkins.create');
    Route::post('/checkins/{uuid}', [CheckinController::class, 'store'])->name('checkins.store');

    Route::get('/lucky-draw/winners', [WinnerController::class, 'show'])->name('winners.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'can:manage users')->group(function () {
    Route::get('/committees', [CommitteeController::class, 'index'])->name('committees.index');
    Route::get('/committees/create', [CommitteeController::class, 'create'])->name('committees.create');
    Route::post('/committees', [committeeController::class, 'store'])->name('committees.store');
    Route::post('/committees/upload', [committeeController::class, 'upload'])->name('committees.upload');
    Route::get('/committees/{user}/edit', [CommitteeController::class, 'edit'])->name('committees.edit');
    Route::patch('/committees/{user}', [CommitteeController::class, 'update'])->name('committees.update');
    Route::delete('/committees/{user}', [CommitteeController::class, 'destroy'])->name('committees.destroy');
    Route::put('/committees/{id}', [CommitteeController::class, 'restore'])
        ->middleware('can:view deleted')
        ->name('committees.restore');

    Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
    Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
    Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
    Route::post('/groups/{group}', [GroupController::class, 'upload'])->name('groups.upload');
    Route::get('/groups/{group}/edit', [GroupController::class, 'edit'])->name('groups.edit');
    Route::patch('/groups/{group}', [GroupController::class, 'update'])->name('groups.update');
    Route::patch('/groups/{group}/points', [GroupController::class, 'points'])->name('groups.points');
    Route::delete('/groups/{group}', [GroupController::class, 'destroy'])->name('groups.destroy');
    Route::put('/groups/{id}', [GroupController::class, 'restore'])
        ->middleware('can:view deleted')
        ->name('groups.restore');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::patch('/users/points', [UserController::class, 'bulk'])->name('users.bulk');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::patch('/users/{user}/points', [UserController::class, 'points'])->name('users.points');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{id}', [UserController::class, 'restore'])
        ->middleware('can:view deleted')
        ->name('users.restore');

    Route::get('/sessions', [SessionController::class, 'index'])->name('sessions.index');
    Route::get('/sessions/create', [SessionController::class, 'create'])->name('sessions.create');
    Route::post('/sessions', [SessionController::class, 'store'])->name('sessions.store');
    Route::get('/sessions/{session}/edit', [SessionController::class, 'edit'])->name('sessions.edit');
    Route::patch('/sessions/{session}', [SessionController::class, 'update'])->name('sessions.update');
    Route::delete('/sessions/{session}', [SessionController::class, 'destroy'])->name('sessions.destroy');
    Route::put('/sessions/{id}', [SessionController::class, 'restore'])
        ->middleware('can:view deleted')
        ->name('sessions.restore');

    Route::get('/awards', [AwardController::class, 'index'])->name('awards.index');
    Route::get('/awards/create', [AwardController::class, 'create'])->name('awards.create');
    Route::post('/awards', [AwardController::class, 'store'])->name('awards.store');

    Route::get('/winners', [WinnerController::class, 'index'])->name('winners.index');
    Route::get('/winners/{winner}/edit', [WinnerController::class, 'edit'])->name('winners.edit');
    Route::patch('/winners/{winner}', [WinnerController::class, 'update'])->name('winners.update');
    Route::patch('/winners/{winner}/claim', [WinnerController::class, 'claim'])->name('winners.claim');

    Route::get('/lucky-draw/single', [WinnerController::class, 'createSingle'])->name('winners.createSingle');
    Route::post('/lucky-draw/single', [WinnerController::class, 'storeSingle'])->name('winners.storeSingle');
    Route::get('/lucky-draw/multiple', [WinnerController::class, 'createMultiple'])->name('winners.createMultiple');
    Route::post('/lucky-draw/multiple', [WinnerController::class, 'storeMultiple'])->name('winners.storeMultiple');
});

Route::middleware('auth')->group(function () {
    Route::get('/stations', [StationController::class, 'index'])->name('stations.index');
    Route::get('/stations/create', [StationController::class, 'create'])
        ->middleware('can:manage stations')
        ->name('stations.create');
    Route::post('/stations', [StationController::class, 'store'])
        ->middleware('can:manage stations')
        ->name('stations.store');
    Route::get('/stations/{station}', [StationController::class, 'show'])
        ->name('stations.show');
    Route::get('/stations/{station}/edit', [StationController::class, 'edit'])
        ->middleware('can:manage stations')
        ->name('stations.edit');
    Route::patch('/stations/{station}', [StationController::class, 'update'])
        ->middleware('can:manage stations')
        ->name('stations.update');
    Route::delete('/stations/{station}', [StationController::class, 'destroy'])
        ->middleware('can:manage stations')
        ->name('stations.destroy');
    Route::put('/stations/{id}', [StationController::class, 'restore'])
        ->middleware('can:manage stations', 'can:view deleted')
        ->name('stations.restore');

    Route::get('/questions', [QuestionController::class, 'index'])
        ->middleware('can:manage questions')
        ->name('questions.index');
    Route::get('/questions/create', [QuestionController::class, 'create'])
        ->middleware('can:manage questions')
        ->name('questions.create');
    Route::post('/questions', [QuestionController::class, 'store'])
        ->middleware('can:manage questions')
        ->name('questions.store');
    Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])
        ->middleware('can:manage questions')
        ->name('questions.edit');
    Route::patch('/questions/{question}', [QuestionController::class, 'update'])
        ->middleware('can:manage questions')
        ->name('questions.update');
    Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])
        ->middleware('can:manage questions')
        ->name('questions.destroy');
    Route::put('/questions/{id}', [QuestionController::class, 'restore'])
        ->middleware('can:manage questions', 'can:view deleted')
        ->name('questions.restore');

    Route::get('/quizzes', [QuizController::class, 'index'])
        // ->middleware('can:manage questions')
        ->name('quizzes.index');
    Route::get('/quizzes/create', [QuizController::class, 'create'])
        ->middleware('can:manage questions')
        ->name('quizzes.create');
    Route::post('/quizzes', [QuizController::class, 'store'])
        ->middleware('can:manage questions')
        ->name('quizzes.store');
    Route::get('/quizzes/{quiz}', [QuizController::class, 'show'])
        ->name('quizzes.show');
    Route::get('/quizzes/{quiz}/edit', [QuizController::class, 'edit'])
        ->middleware('can:manage questions')
        ->name('quizzes.edit');
    Route::patch('/quizzes/{quiz}', [QuizController::class, 'update'])
        ->middleware('can:manage questions')
        ->name('quizzes.update');
    Route::delete('/quizzes/{quiz}', [QuizController::class, 'destroy'])
        ->middleware('can:manage questions')
        ->name('quizzes.destroy');
    Route::put('/quizzes/{id}', [QuizController::class, 'restore'])
        ->middleware('can:manage questions', 'can:view deleted')
        ->name('quizzes.restore');
    Route::patch('/quizzes/{quiz}/link', [QuizController::class, 'link'])
        ->middleware('can:manage questions')
        ->name('quizzes.link');
    Route::patch('/quizzes/{quiz}/unlink', [QuizController::class, 'unlink'])
        ->middleware('can:manage questions')
        ->name('quizzes.unlink');
    Route::post('/station/{station}/quiz/{quiz}/submit', [QuizController::class, 'submit'])->name('quizzes.submit');
    Route::post('/quiz/{quiz}/submit', [QuizController::class, 'submit'])->name('quizzes.submit');
    Route::get('/quizzes/{quiz}/download-reports', [QuizController::class, 'downloadReports'])
        ->name('quizzes.download-reports')
        ->middleware(['auth', 'can:manage questions']);
    Route::resource('surveys', SurveyController::class)->middleware('can:manage surveys');
    Route::get('/surveys/{survey}/download-responses', [SurveyController::class, 'downloadResponses'])
        ->name('surveys.download-responses')
        ->middleware(['auth', 'can:manage surveys']);
    Route::put('surveys/{id}/restore', [SurveyController::class, 'restore'])->name('surveys.restore');

    Route::get('/surveys', [SurveyController::class, 'index'])->name('surveys.index');
    Route::get('/surveys/{survey}', [SurveyController::class, 'show'])->name('surveys.show');
    Route::post('/surveys/{survey}/submit', [SurveyController::class, 'submit'])->name('surveys.submit');

    Route::resource('polls', PollController::class)->middleware('can:manage surveys');

    Route::get('/polls', [PollController::class, 'index'])->name('polls.index');
    Route::get('polls/{poll}', [PollController::class, 'show'])->name('polls.show');
    Route::post('/polls/{poll}/vote', [PollController::class, 'vote'])->name('polls.vote');
});

require __DIR__ . '/auth.php';
