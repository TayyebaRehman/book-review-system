<x-layouts.app>
    <style>
        .edit-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            font-family: Arial, sans-serif;
        }

        .edit-container h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .form-footer a {
            font-size: 14px;
            color: #777;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        .btn-submit {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="edit-container">
        <h2>✏️ Edit Review</h2>

        <form method="POST" action="{{ route('reviews.update', $review->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="rating">Rating</label>
                <select name="rating" id="rating" required>
                    @for ($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}" @if ($review->rating == $i) selected @endif>
                            {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" rows="4" required>{{ old('comment', $review->comment) }}</textarea>
            </div>

            <div class="form-footer">
                <a href="{{ route('books.show', $review->book_id) }}">← Back to Book</a>
                <button type="submit" class="btn-submit">Update Review</button>
            </div>
        </form>
    </div>
</x-layouts.app>
