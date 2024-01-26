<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        if ($group = Auth::user()->group) {
            $members = $group->users;
        }

        return Inertia::render('Members/Index', [
            'search' => $search,
            'users' => $members,
        ]);
    }
}
