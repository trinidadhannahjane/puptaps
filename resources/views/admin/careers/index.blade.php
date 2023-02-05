@extends('layouts.admin')
@section('page-title', 'Careers')
@section('active-career-index', 'active')
@section('page-name', 'Careers Management')

@section('content')

    <section class="mt-4 mt-sm-4 mt-md-4 mt-lg-5 mt-xl-5 mb-5">
        <div class="container-fluid box-content">

            <!-- Alert Status -->
            <livewire:components.alert-status-message :message="session()->get('success')" />

            <livewire:admin.page-title :title="$title"/>

            <div class="row justify-content-center">
                <!-- Start: Body -->
                <div class="col-11">
                    <div class="row g-0 g-sm-0 g-md-0 g-lg-4 g-xl-4">

                        <!-- Career Search bar -->
                        <div class="col-12">
                            <div class="row sub-container-box py-3 mx-1">
                                <livewire:career.career-searchbar :query="$query" />
                            </div>
                        </div>

                        <!-- Career Submenu - Left Side -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">
                            <livewire:career.career-submenu :query="$query" />
                        </div>

                        <!-- Career Contents -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">

                            <!-- If Post/Query has no data -->
                            @if (count($careers) == 0)
                                <div class="alert alert-danger fs-7" role="alert">
                                    There is no available data.
                                </div>

                            <!-- If Post/Query has data -->
                            @else
                                @foreach ($careers as $career)
                                    @if (($career->job_ad_image == null))
                                        <!-- If Post was Text -->
                                        <livewire:career.career-text :career="$career" :alumni="$alumni" :admin="$admin" :username="$username" />
                                    @elseif (($career->job_ad_image != null))
                                        <!-- If Post was Image -->
                                        <livewire:career.career-image-modal :career="$career" :alumni="$alumni" :admin="$admin" :username="$username" />
                                    @endif
                                @endforeach
                            @endif
                        </div>

                    </div>
                </div>
                <!-- End: Body -->
            </div>
        </div>
    </section>
@endsection
