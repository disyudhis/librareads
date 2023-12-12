<div>
    <div class="container">
        <div class="card card-custom card-fit">
            <div class="card-header">
                <div class="card-title"></div>
                <div class="card-toolbar">
                    <div class="form-group my-3 mx-10">
                        <div class="input-icon">
                            <input type="search" wire:model='search'
                                class="text-center font-size-h6 form-control form-control-lg rounded-pill"
                                placeholder="Find Your Book">
                            <span><i class="flaticon2-search-1 icon-md"></i></span>
                        </div>
                    </div>
                    @if (auth()->user()->role == 'ADMIN')
                        <a href="{{ route('admin.books.create') }}"
                            class="btn btn-lg btn-pink font-size-h6 font-weight-bold"><i
                                class="flaticon2-plus text-white"></i>Add Book</a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                @if ($search)
                    <h5 class="font-weight-boldest text-center">Showing Result for "{{ $search }}"</h5>
                @endif
                <div class="row my-4">
                    @forelse ($books as $book)
                        <div class="col-md-3" wire:key="book-{{ $book->id }}">
                            <a
                                href="{{ auth()->user()->role == 'ADMIN' ? route('admin.books.edit', ['id' => $book->id]) : route('member.dashboard.detail', ['id' => $book->id]) }}">
                                <img src="{{ asset('storage/' . $book->image) }}" style="max-height: 100%; height: 80%"
                                    alt="">
                            </a>
                        </div>
                    @empty
                        <div class="col text-center justify-content-center align-items-center d-flex">
                            <p class="display-5">Unfortunately, the book you were looking for was not found.</p>
                        </div>
                    @endforelse
                </div>
                <div class="row justify-content-end">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
