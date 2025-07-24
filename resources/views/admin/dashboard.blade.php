<x-layouts.app>
<div class="container">
    <h2>📊 Admin Dashboard</h2>
    <p>Welcome, {{ Auth::user()->name }}!</p>

    <div class="row my-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5>Total Books</h5>
                    <h2>{{ $totalBooks }}</h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5>Total Users</h5>
                    <h2>{{ $totalUsers }}</h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5>Total Reviews</h5>
                    <h2>{{ $totalReviews }}</h2>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('books.create') }}" class="btn btn-primary">➕ Add New Book</a>
</div>
</x-layouts.app>
