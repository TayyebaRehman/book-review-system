<x-layouts.app>
    <div style="max-width: 600px; margin: 40px auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <a href="{{ route('books.index') }}" style="display:block; margin-bottom:15px; font-size:14px;">← Back to Book Store</a>

        <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">🖊️ Edit Book</h2>

        <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('books.partials.form', ['book' => $book])
            <button type="submit" style="background-color: #28a745; color: white; padding: 10px 16px; border: none; border-radius: 4px; margin-top: 10px;">
                Update Book
            </button>
        </form>
    </div>
</x-layouts.app>
