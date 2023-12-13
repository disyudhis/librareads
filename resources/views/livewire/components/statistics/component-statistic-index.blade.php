<div>
    <div class="container">
        <h4>Data Peminjaman Buku LibraReads</h4>
        <div class="table-responsive my-5">
            <table class="table table-striped text-center">
                <thead class="thead-light">
                    <tr>
                        <th>Id Anggota</th>
                        <th>Kode Buku</th>
                        <th>Id Pinjam</th>
                        <th>Tanggal Pinjam</th>
                        <th>Id Pengembalian</th>
                        <th>Id Admin</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->user_id }}</td>
                            <td>{{ $transaction->code }}</td>
                            <td>{{ $transaction->loan_id }}</td>
                            <td>{{ $transaction->loan_date }}</td>
                            <td>-</td>
                            <td>{{ $transaction->admin_id }}</td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="12">No Data Available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <button class="btn btn-pink font-size-h6 btn-lg btn-pill" wire:click='openModal'
                data-target="#statisticModal">Tambah Data Peminjaman</button>
            <div class="d-flex justify-content-center align-items-end">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="statisticModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-end">
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><i
                            class="ki ki-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Insert Book Code</label>
                        <input type="text" wire:model='code' class="form-control form-control-lg font-size-h6">
                        @error('code')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <button wire:click='store' class="btn btn-pink btn-lg btn-pill px-10">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            window.addEventListener('openModal', event => {
                $("#statisticModal").modal('show');
            })

            window.addEventListener('closeModal', event => {
                $("#statisticModal").modal('hide');
            })
        </script>
    @endpush
</div>
