<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassportController extends Controller
{
    public function index()
    {
        // Get user's checkpoint sessions through the pivot table
        $userCheckpoints = Auth::user()
            ->sessions()
            ->where('isCheckpoint', true)
            ->pluck('checkpointNo');

        return Inertia::render('Passport', [
            'userCheckpoints' => $userCheckpoints
        ]);
    }
}
