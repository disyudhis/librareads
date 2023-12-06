<div class="container">
    <div class="card card-custom">
        <div class="row card-body">
            <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                <div class="col-md-8 text-center">
                    <img src="{{ $this->photo ? $photo->temporaryUrl() : asset('assets/media/users/image-blank.png') }}" class="rounded-lg" style="max-width: 100%; width: 100%" alt="">
                    <div class="d-flex justify-content-center mt-10">
                        <input type="file" id="cover_input" wire:model="photo" style="display: none;">
                        <button class="btn btn-pink font-weight-bolder font-size-h6 px-8 py-4"
                            id="edit_button">Edit</button>
                    </div>
                    @error('photo')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="text-start my-5">
                        <h3>Detail Member</h3>
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <input class="form-control form-control-lg rounded-lg font-size-h6" type="text"
                                placeholder="Name" wire:model="name" name="name" autocomplete="off">
                            <span><i class="flaticon-book icon-md"></i></span>
                        </div>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <input class="form-control form-control-lg rounded-lg font-size-h6" type="text"
                                placeholder="Nisn" wire:model="nisn" name="nisn" autocomplete="off">
                            <span><i class="flaticon-user icon-md"></i></span>
                        </div>
                        @error('nisn')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <input class="form-control form-control-lg rounded-lg font-size-h6" type="email"
                                placeholder="Email" wire:model="email" name="email" autocomplete="off">
                            <span><i class="flaticon2-open-text-book icon-md"></i></span>
                        </div>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <input class="form-control form-control-lg rounded-lg font-size-h6" type="password"
                                placeholder="Password" wire:model="password" name="password" autocomplete="off">
                            <span><i class="flaticon2-plus"></i></span>
                        </div>
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" wire:click="store"
                            class="btn btn-pink font-weight-bolder font-size-h6 px-8 py-4"
                            wire:loading.attr="disabled">ADD
                            <div wire:loading wire:target="store">
                                <div class="spinner-border spinner-border-sm" role="status"></div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            document.getElementById('edit_button').addEventListener('click', function() {
                document.getElementById('cover_input').click();
            });
        </script>
    @endpush
</div>
