<style>
    .form-group {
        margin-bottom: 15px;
    }
    .form-label {
        display: block;
        font-weight: bold;
        margin-bottom: 6px;
    }
    .form-input, .form-textarea, .form-file {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }
    .form-textarea {
        resize: vertical;
    }
    .form-preview {
        margin-top: 10px;
        max-width: 100px;
        max-height: 140px;
        border-radius: 5px;
        box-shadow: 0 0 5px #aaa;
    }
</style>

<div class="form-group">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-input" value="{{ old('title', $book->title ?? '') }}" required>
</div>

<div class="form-group">
    <label class="form-label">Author</label>
    <input type="text" name="author" class="form-input" value="{{ old('author', $book->author ?? '') }}" required>
</div>

<div class="form-group">
    <label class="form-label">Genre</label>
    <input type="text" name="genre" class="form-input" value="{{ old('genre', $book->genre ?? '') }}" required>
</div>

<div class="form-group">
    <label class="form-label">Description</label>
    <textarea name="description" rows="4" class="form-textarea" required>{{ old('description', $book->description ?? '') }}</textarea>
</div>

<div class="form-group">
    <label class="form-label">Publication Year</label>
    <input type="number" name="publication_year" class="form-input" value="{{ old('publication_year', $book->publication_year ?? '') }}">
</div>

<div class="form-group">
    <label class="form-label">Cover Image</label>
    <input type="file" name="cover_image" class="form-file">
    @if(!empty($book) && $book->cover_image)
        <img src="{{ asset('storage/' . $book->cover_image) }}" class="form-preview" alt="Current Cover">
    @endif
</div>
