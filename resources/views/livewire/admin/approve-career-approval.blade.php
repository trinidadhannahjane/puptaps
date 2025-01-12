{{-- Approve --}}

{{-- <div class="modal fade" id="approveCareer{{ $career->career_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Approve Career</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" role="alert">
                    Do you want to approve this Job Advertisement posted by:
                    @foreach ($users as $user)
                        @if (($user->alumni_id) == ($career->alumni_id))
                            <b>{{ $user->first_name }} {{ $user->last_name }}</b>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::model($career, [ 'method' => 'patch','route' => ['adminCareer.approveCareer', $career->career_id] ]) !!}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Approve</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div> --}}

<!-- Modal -->
<div class="modal fade" id="approveCareer{{ $career->career_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h1 class="modal-title fs-5">Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> --}}
            <div class="modal-body">
                <div class="swal2-icon swal2-warning mb-3" style="display: flex;">
                    <i class="fa-solid fa-exclamation" style="font-size: 72px; font-weight: lighter;"></i>
                </div>
                <h3 class="text-center mt-3 mb-2" style="color: #f8bb86;">Warning!</h3>
                <p class="text-center fs-7 mb-1 mt-2" role="alert">Do you want to approve this post?</p>
            </div>
            {!! Form::model($career, [ 'method' => 'patch','route' => ['adminCareer.approveCareer', $career->career_id] ]) !!}
                <div class="modal-footer p-0">
                    <button type="button" class="col-6 m-0 p-2 btn btn-link text-decoration-none border-end rounded-0 text-dark" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="col-6 m-0 p-2 btn btn-link text-decoration-none rounded-0 text-primary">Yes</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

