@extends('layouts.user')
@section('page-title', 'Profile')
@section('profile-active', 'active')

@section('content')

    <section class="mt-4 mt-sm-4 mt-md-4 mt-lg-5 mt-xl-5">
        <div class="container-fluid my-3">
            <!-- Page Title Text H1 -->
            <livewire:components.page-title :title="$title"/>

            <div class="row justify-content-center g-0">
                <div class="col-11 col-sm-9 col-md-9 col-lg-9 col-xl-9 container-box">
                    @foreach ($users as $user)
                    {!! Form::model($user, [ 'method' => 'patch','route' => ['userProfile.updateProfile', $user->alumni_id], 'enctype' => 'multipart/form-data']) !!}
                        <div  iv class="row align-items-center px-0 px-sm-0 px-md-0 px-lg-3 px-xl-3">
                            <div class="col-12 my-3">
                                <h3>Account Information</h3>
                            </div>

                            <div class="col-12">
                                <div class="row align-items-center">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        <div class="row mb-3">
                                            <div class="col-12 text-center mb-2">
                                                <label class="profilepic" for="uploadProfile">
                                                    <img class="profilepic__image" src="/Uploads/Profiles/{{ $user->user_profile }}" id="uploadPreview"/>
                                                    <div class="profilepic__content">
                                                    <span class="profilepic__icon"><i class="fas fa-camera"></i></span>
                                                    <span class="profilepic__text">Edit Profile</span>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-12 text-center">
                                                <input type="file" class="form-control" name="user_profile" id="uploadProfile" onchange="PreviewImage();" hidden />

                                                <label class="btn btn-primary" for="uploadProfile">Change Profile Picture</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 my-2">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                                                <span class="text-danger">@error('username') {{$message}} @enderror</span>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 my-2">
                                                <label class="form-label">Email <i class="fa-solid fa-lock"></i></label>
                                                <input type="text" class="form-control" name="email" value="{{ $user->email }}" disabled>
                                                <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 my-2">
                                                <label class="form-label">Password</label>
                                                <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                                                <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 my-2">
                                                <label class="form-label">Confirm Password</label>
                                                <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                                                <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div  iv class="row align-items-center px-0 px-sm-0 px-md-0 px-lg-3 px-xl-3">
                            <div class="col-12 my-3">
                                <h3>Personal Information</h3>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 my-2">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">
                                <span class="text-danger">@error('last_name') {{$message}} @enderror</span>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 my-2">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}">
                                <span class="text-danger">@error('first_name') {{$message}} @enderror</span>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 my-2">
                                <label class="form-label">Middle Name</label>
                                <input type="text" class="form-control" name="middle_name" value="{{ $user->middle_name }}">
                                <span class="text-danger">@error('middle_name') {{$message}} @enderror</span>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 my-2">
                                <label class="form-label">Suffix</label>
                                <input type="text" class="form-control" name="suffix" value="{{ $user->suffix }}">
                                <span class="text-danger">@error('suffix') {{$message}} @enderror</span>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 my-2">
                                <label class="form-label">Gender:</label>
                                <div class="text-center border rounded py-1">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="Male"
                                            @if ('Male' == $user->gender)
                                                checked
                                            @endif>
                                        <label class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="Female"
                                            @if ('Female' == $user->gender)
                                                checked
                                            @endif>
                                        <label class="form-check-label">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 my-2">
                                <label class="form-label">Birthday</label>
                                <input type="date" class="form-control" name="birthday" value="{{ $user->birthday }}">
                                <span class="text-danger">@error('birthday') {{$message}} @enderror</span>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 my-2">
                                <label class="form-label">Age</label>
                                <input type="text" class="form-control" name="age" value="{{ $user->age }}">
                                <span class="text-danger">@error('age') {{$message}} @enderror</span>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 my-2">
                                <label class="form-label">Religion</label>
                                <input type="text" class="form-control" name="religion" value="{{ $user->religion }}">
                                <span class="text-danger">@error('religion') {{$message}} @enderror</span>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 my-2">
                                <label class="form-label">Mobile Number</label>
                                <input type="text" class="form-control" name="number" value="{{ $user->number }}">
                                <span class="text-danger">@error('number') {{$message}} @enderror</span>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 my-2">
                                <label class="form-label">Civil Status</label>
                                <select class="form-select" name="civil_status">
                                    <option value="Single"
                                    @if ($user->civil_status == "Single")
                                        selected
                                    @endif>Single</option>
                                    <option value="Married"
                                    @if ($user->civil_status == "Married")
                                        selected
                                    @endif>Married</option>
                                    <option value="Divorced"
                                    @if ($user->civil_status == "Divorced")
                                        selected
                                    @endif>Divorced</option>
                                    <option value="Widowed"
                                    @if ($user->civil_status == "Widowed")
                                        selected
                                    @endif>Widowed</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 my-2">
                                <label class="form-label">Student Number</label>
                                <input type="text" class="form-control" name="stud_number" value="{{ $user->stud_number }}">
                                <span class="text-danger">@error('stud_number') {{$message}} @enderror</span>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 my-2">
                                <label class="form-label">Course</label>
                                <select class="form-select" name="course_id">
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->course_id }}"
                                            @if (($course->course_id) == $user->course_id)
                                                selected
                                            @endif
                                            >{{ $course->course_id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 my-2">
                                <label class="form-label">Year Graduated</label>
                                <select class="form-select" name="batch">
                                    @for ($i = date('Y'); $i >= 1996; $i--)
                                        <option value="{{ $i }}"
                                            @if (($user->batch) == $i)
                                                selected
                                            @endif
                                            >{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-12 my-2">
                                <label class="form-label">City Address</label>
                                <input type="text" class="form-control" name="city_address" value="{{ $user->city_address }}">
                                <span class="text-danger">@error('city_address') {{$message}} @enderror</span>
                            </div>
                            <div class="col-12 my-2">
                                <label class="form-label">Provincial Address</label>
                                <input type="text" class="form-control" placeholder="Provincial Address" name="provincial_address" value="{{ $user->provincial_address }}">
                                <span class="text-danger">@error('provincial_address') {{$message}} @enderror</span>
                            </div>

                            <div class="col-md-12 text-center mt-5 mb-2">
                                <button type="submit" class="btn btn-primary" style="width: 200px">Save</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
