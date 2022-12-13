<div class="row justify-content-center">
    <div class="col-md-12">
        @if(Session::has('success'))
            {{-- <center><div class="alert alert-success">{{ Session::get('success') }}</div></center> --}}
            <div id="myModal" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Success!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success pb-3" role="alert">
                            {{ $message }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light text-center w-100 text-primary" data-bs-dismiss="modal">Continue</button>
                    </div>
                    </div>
                </div>
            </div>
        @elseif($errors->any())
            <div id="myModal" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Failed!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger pb-1" role="alert">
                            @foreach ($errors->all() as $error)
                                <p class="text-center">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light text-center w-100 text-primary" data-bs-dismiss="modal">Continue</button>
                    </div>
                    </div>
                </div>
            </div>
            {{-- <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <p class="text-center mb-0">{{ $error }}</p>
                @endforeach
            </div> --}}
        @endif
    </div>
</div>
