<div class="container">
    <div class="card card-custom card-fit">
        <div class="card-header">
            <div class="card-title"></div>
            <div class="card-toolbar">
                <a href="{{ route('admin.books.create') }}" class="btn btn-lg btn-pink font-size-h6 font-weight-bold"><i
                        class="flaticon2-plus text-white"></i>Add Book</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @forelse ($books as $book)
                    <div class="col-md-3">
                        <img src="{{ asset('storage/' . $book->image) }}" style="max-height: 100%; height: 80%"
                            alt="">
                    </div>
                @empty
                    <div>
                        <p>No Book Available</p>
                    </div>
                @endforelse
            </div>
            <div class="row justify-content-end">
                {{ $books->links() }}
            </div>
        </div>
    </div>
</div>
