<div class="container">
    <div class="card card-custom card-fit">
        <div class="card-header">
            <div class="card-title"></div>
            <div class="card-toolbar">
                <a href="{{ route('admin.members.create') }}" type="button"
                    class="btn btn-pink btn-lg font-size-h6 font-weight-bold"><i class="flaticon2-plus text-white"></i>Add
                    Member</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @forelse ($members as $member)
                    <div class="card gutter-b col-md-4 p-5 gap-3">
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="col-3">
                                <img src="{{ $member->photo ? asset('storage/' . $member->photo) : asset('assets/media/users/blank.png') }}"
                                    class="rounded-pill" style="height: 50px" alt="">
                            </div>
                            <div class="col-7">
                                <p class="font-weight-boldest">{{ $member->name }}
                                    <br>
                                    <span class="font-weight-light">{{ $member->email }}</span>
                                </p>
                            </div>
                            <div class="col-2">
                                <span class="svg-icon svg-icon-warning">
                                    <span class="svg-icon svg-icon-lg">
                                        <img src="assets/media/svg/icons/Navigation/Angle-right.svg" />
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col">
                        <p class="text-center">No Member Available</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
