<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // Store new review
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        Review::create([
            'book_id' => $request->book_id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Review submitted successfully!');
    }

    // Show edit form
    public function edit(Review $review)
    {
        // Only the owner can edit
        if ($review->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('reviews.edit', compact('review'));
    }

    // Update review
    public function update(Request $request, Review $review)
    {
        if ($review->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        $review->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('books.show', $review->book_id)->with('success', 'Review updated successfully!');
    }

    // Delete review
    public function destroy(Review $review)
    {
        if ($review->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $review->delete();

        return back()->with('success', 'Review deleted successfully.');
    }
}
