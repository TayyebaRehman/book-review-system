<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

        <!-- 🔍 Search Form -->
        <form method="GET" action="{{ route('books.index') }}" class="mb-6 flex flex-wrap gap-4">
            <input type="text" name="title" value="{{ request('title') }}" placeholder="Search by Title"
                class="border border-gray-300 p-2 rounded w-full md:w-1/4">
            <input type="text" name="author" value="{{ request('author') }}" placeholder="Search by Author"
                class="border border-gray-300 p-2 rounded w-full md:w-1/4">
            <input type="text" name="genre" value="{{ request('genre') }}" placeholder="Search by Genre"
                class="border border-gray-300 p-2 rounded w-full md:w-1/4">

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 py-2 px-4 rounded h-fit">
                🔍 Search
            </button>
        </form>

        <!-- ✅ Success Message -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- ➕ Admin Button -->
        @auth
            @if (auth()->user()->is_admin)
                <a href="{{ route('books.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 py-2 px-4 rounded mb-4 inline-block">
                    ➕ Add New Book
                </a>
            @endif
        @endauth

        <!-- 📚 Book Table -->
        @if ($books->isEmpty())
            <p>No books found.</p>
        @else
           <div class="w-full max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 text-sm bg-white shadow rounded-lg max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="border px-4 py-3 text-left">Cover</th>
                            <th class="border px-4 py-3 text-left">Title</th>
                            <th class="border px-4 py-3 text-left">Author</th>
                            <th class="border px-4 py-3 text-left">Genre</th>
                            <th class="border px-4 py-3 text-left">Rating</th>
                            <th class="border px-4 py-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr class="hover:bg-gray-50">
                                <td class="border px-4 py-3">
                                    @if ($book->cover_image)
                                        <img src="{{ asset('storage/' . $book->cover_image) }}"
     alt="Cover" class="h-9 w-9 object-cover rounded shadow">

                                    @else
                                        <span class="text-gray-400 italic">No Image</span>
                                    @endif
                                </td>
                                <td class="border px-4 py-3 font-semibold">{{ $book->title }}</td>
                                <td class="border px-4 py-3">{{ $book->author }}</td>
                                <td class="border px-4 py-3">{{ $book->genre }}</td>
                                <td class="border px-4 py-3">
                                    @php
                                        $avgRating = $book->reviews->avg('rating');
                                    @endphp
                                    @if ($avgRating)
                                        ⭐ {{ number_format($avgRating, 1) }}/5
                                    @else
                                        <span class="text-gray-400 italic">No Ratings</span>
                                    @endif
                                </td>
                                <td class="border px-4 py-3">
                                    <a href="{{ route('books.show', $book) }}"
                                        class="text-blue-600 hover:underline">View</a>

                                    @if (auth()->check() && auth()->user()->is_admin)
                                        | <a href="{{ route('books.edit', $book) }}"
                                            class="text-green-600 hover:underline">Edit</a>
                                        | <form action="{{ route('books.destroy', $book) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Delete this book?')"
                                                class="text-red-600 hover:underline">Delete</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
           </div>

            <!-- 📄 Pagination -->
            <div class="mt-6">
                {{ $books->links() }}
            </div>
        @endif

    </div>
</x-app-layout>
