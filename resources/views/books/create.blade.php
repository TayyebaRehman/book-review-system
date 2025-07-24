<x-layouts.app>
    <style>
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 25px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-family: sans-serif;
        }

        .form-container h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .form-input,
        .form-textarea,
        .form-file {
            width: 100%;
            padding: 10px 12px;
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

        .btn-submit {
            background-color: #007bff;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="form-container">
        <h2>➕ Add New Book</h2>

        <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
            @csrf
            @include('books.partials.form', ['book' => null])

            <button type="submit" class="btn-submit">
                Save Book
            </button>
        </form>
    </div>
</x-layouts.app>
