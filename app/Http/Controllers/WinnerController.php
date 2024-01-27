<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Winner;
use Illuminate\Http\Request;

class WinnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $winners = Winner::all();

        return Inertia::render('Winners/Index', [
            'winners' => $winners->load('user'),
        ]);
    }

    /**
     * Show the page for creating a new resource.
     */
    public function createSingle()
    {
        return Inertia::render('Winners/SingleDraw');
    }

    /**
     * Show the page for creating a new resource.
     */
    public function createMultiple()
    {
        return Inertia::render('Winners/MultipleDraw');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeSingle(Request $request)
    {
        $winners = Winner::all()->pluck('user_id');
        $users = User::whereNotNull('activated_at')->whereNotIn('id', $winners)->get();

        if ($users->count() == 0) {
            return ['name' => 'No more users'];
        }

        $winner = $users->random();

        Winner::create([
            'user_id' => $winner->id,
        ]);

        return $winner;
    }

    /**
     * Store multiple newly created resources in storage.
     */
    public function storeMultiple(Request $request)
    {
        $number = $request->numbers;
        $winners = Winner::all()->pluck('user_id');
        $users = User::whereNotNull('activated_at')->whereNotIn('id', $winners)->get();

        if ($users->count() == 0) {
            return [['name' => 'No more users']];
        }

        $winners = $users->random($number);

        foreach ($winners as $winner) {
            Winner::create([
                'user_id' => $winner->id,
            ]);
        }

        return $winners;
    }

    /**
     * Display the specified resource.
     */
    public function show(Winner $winner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Winner $winner)
    {
        return Inertia::render('Winners/Edit', [
            'winner' => $winner->load('user'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Winner $winner)
    {
        $request->validate([
            'prize' => 'required'
        ]);

        $winner->update([
            'prize' => $request->prize,
        ]);

        return redirect()->route('winners.index')->with('success', 'Prize updated successfully');
    }

    /**
     * Mark the specified prize as claimed in storage.
     */
    public function claim(Winner $winner)
    {
        $winner->update([
            'is_claimed' => true,
            'claimed_at' => now(),
        ]);

        return redirect()->route('winners.index')->with('success', 'Prize claimed successfully');
    }
}
