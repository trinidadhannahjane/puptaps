@extends('layouts.user')

@section('page-title', 'Form - Student Affairs and Services')
@section('form-active', 'active')

@section('content')

    <div class="container my-3">
        <div class="row my-5">
            <div class="col-md-6">
                <h3>Student Affairs and Services Form</h3>
            </div>
        </div>

        <div class="row mx-4 justify-content-center">
            <div class="col-md-10 box-forms">
                @livewire('forms.form-sas')
            </div>
        </div>
    </div>

@endsection
