<div class="container">
    <div class="row">
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <div class="col-md-8 text-center">
                <img src="{{ asset('storage/' . $book->image) }}" style="max-height: 100%; height: 80%" alt="">
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <div class="col card card-custom card-border bg-white" style="height: 100%">
                <div class="text-start my-3">
                    <h3>Book Description</h3>
                </div>
                <div class="card card-border p-8 mb-10">
                    <h6 class="text-muted">Synopsis</h6>
                    <p>{{ $book->synopsis }}</p>
                </div>
                <div class="form-group d-flex justify-content-end align-items-end">
                    <button class="btn btn-pink btn-lg btn-pill font-weight-bold font-size-h6">Book Now</button>
                </div>
            </div>
        </div>
    </div>
</div>
