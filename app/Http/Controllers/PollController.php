<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PollController extends Controller
{
    public function index()
    {
        $polls = Poll::with(['options', 'votes'])
            ->where('is_active', true)
            ->latest()
            ->paginate(10);

        return Inertia::render('Polls/Index', [
            'polls' => $polls
        ]);
    }

    public function create()
    {
        return Inertia::render('Polls/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'expires_at' => 'nullable|date',
            'options' => 'required|array|min:2',
            'options.*' => 'required|string|max:255'
        ]);

        $poll = Poll::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'expires_at' => $validated['expires_at'],
            'user_id' => auth()->id(),
        ]);

        foreach ($validated['options'] as $optionText) {
            $poll->options()->create(['option_text' => $optionText]);
        }

        return redirect()->route('polls.show', $poll);
    }

    public function show(Poll $poll)
    {
        return Inertia::render('Polls/Show', [
            'poll' => $poll->load(['options', 'votes.user'])
        ]);
    }

    public function edit(Poll $poll)
    {
        return Inertia::render('Polls/Edit', [
            'poll' => $poll->load('options')
        ]);
    }

    public function update(Request $request, Poll $poll)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'expires_at' => 'nullable|date',
            'options' => 'required|array|min:2',
            'options.*' => 'required|string|max:255'
        ]);

        // Update poll details
        $poll->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'expires_at' => $validated['expires_at'],
        ]);

        // Delete existing options
        $poll->options()->delete();

        // Create new options
        foreach ($validated['options'] as $optionText) {
            $poll->options()->create(['option_text' => $optionText]);
        }

        return redirect()
            ->route('polls.show', $poll)
            ->with('success', 'Poll updated successfully');
    }

    public function vote(Request $request, Poll $poll)
    {
        $validated = $request->validate([
            'option_id' => 'required|exists:poll_options,id'
        ]);

        // Check if user has already voted
        $existingVote = $poll->votes()->where('user_id', auth()->id())->first();

        if ($existingVote) {
            return redirect()
                ->route('polls.show', $poll)
                ->with('error', 'You have already voted on this poll');
        }

        $poll->votes()->create([
            'poll_option_id' => $validated['option_id'],
            'user_id' => auth()->id()
        ]);

        return redirect()
            ->route('polls.show', $poll)
            ->with('success', 'Your vote has been recorded successfully');
    }

    public function destroy(Poll $poll)
    {
        $poll->delete();

        return redirect()
            ->route('polls.index')
            ->with('success', 'Poll deleted successfully');
    }
}
