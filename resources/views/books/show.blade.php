<x-layouts.app>
    <style>
        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            font-family: Arial, sans-serif;
        }

        .book-details {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .book-details img {
            width: 100px;
            height: 140px;
            object-fit: cover;
            border-radius: 4px;
            box-shadow: 0 0 3px rgba(0,0,0,0.2);
        }

        .book-info h2 {
            margin: 0 0 10px;
        }

        .book-info p {
            margin: 4px 0;
        }

        .reviews-section {
            margin-top: 30px;
        }

        .review-form textarea,
        .review-form select {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .review-form button {
            padding: 8px 16px;
            background-color: #28a745;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .review-form button:hover {
            background-color: #218838;
        }

        table.reviews-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table.reviews-table th, table.reviews-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        table.reviews-table th {
            background-color: #f2f2f2;
        }

        .actions a, .actions form {
            font-size: 0.9em;
            display: inline-block;
            margin-right: 6px;
        }

        .actions form {
            display: inline;
        }
    </style>

    <div class="container">
        <!-- Book Info -->
        <div class="book-details">
            @if($book->cover_image)
                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Book Cover">
            @else
                <div style="width:100px;height:140px;background:#ccc;display:flex;align-items:center;justify-content:center;">No Image</div>
            @endif

            <div class="book-info">
                <h2>{{ $book->title }}</h2>
                <p><strong>Author:</strong> {{ $book->author }}</p>
                <p><strong>Genre:</strong> {{ $book->genre }}</p>
                <p><strong>Year:</strong> {{ $book->publication_year }}</p>
                <p>{{ $book->description }}</p>
            </div>
        </div>

        <!-- Reviews -->
        <div class="reviews-section">
            <h3>📝 Reviews</h3>

            @auth
            <form class="review-form" action="{{ route('reviews.store') }}" method="POST">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">

                <label>Rating:</label>
                <select name="rating" required>
                    <option value="">-- Select --</option>
                    @for($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                    @endfor
                </select>

                <label>Comment:</label>
                <textarea name="comment" rows="3" required></textarea>

                <button type="submit">Submit Review</button>
            </form>
            @endauth

            <!-- Reviews Table -->
            <table class="reviews-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Rating</th>
                        <th>Comment</th>
                        <th>Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reviews as $review)
                        <tr>
                            <td>{{ $review->user->name }}</td>
                            <td>{{ $review->rating }} ⭐</td>
                            <td>{{ $review->comment }}</td>
                            <td>{{ $review->created_at->diffForHumans() }}</td>
                            <td class="actions">
                                @if(auth()->id() === $review->user_id)
                                    <a href="{{ route('reviews.edit', $review->id) }}">Edit</a>
                                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Delete this review?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background:none;border:none;color:red;cursor:pointer;">Delete</button>
                                    </form>
                                @else
                                    <span style="color: #888;">N/A</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" style="text-align: center;">No reviews yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div style="margin-bottom: 20px;">
    <a href="{{ route('books.index') }}" style="color: #007bff; text-decoration: none; font-size: 14px;">
        ← Back to Book Store
    </a>
</div>

    </div>
</x-layouts.app>
