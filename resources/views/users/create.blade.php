@extends('layouts.app')
@section('content')
<div class="col-10">
    <p class="title">Employees Management</p>
    <!-- Create EMployee    -->
    <div class="container">
        <form method="POST">
            <div class="row">
                @if (session('message'))
                <div class="col-12 alert alert-primary">
                    {{ session('message') }}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    {{ $error }}<br />
                    @endforeach
                </div>
                @endif
                <div class="col-10">
                    <div class="mb-3 row">
                        <label for="firstname" class="col-sm-2 col-form-label">First name</label>
                        <div class="col-sm-10">
                            <input id="firstname" name="firstname" class="form-control" value="{{ old('firstname') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="lastname" class="col-sm-2 col-form-label">Last name</label>
                        <div class="col-sm-10">
                            <input id="lastname" name="lastname" class="form-control" value="{{ old('lastname') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input id="email" name="email" class="form-control" type="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="birthday" class="col-sm-2 col-form-label">Birthday</label>
                        <div class="col-sm-10">
                            <input id="birthday" name="birthday" class="form-control" type="datetime-local" value="{{ old('birthday') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input id="male" name="gender" class="form-check-input" type="radio" value="0" @if (old('gender')==0) checked @endif>
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input id="female" name="gender" class="form-check-input" type="radio" value="1" @if (old('gender')==1) checked @endif>
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input id="address" name="address" class="form-control" type="text" value="{{ old('address') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="phonenumber" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input id="phonenumber" name="phonenumber" class="form-control" type="text" value="{{ old('phonenumber') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ethnicity" class="col-sm-2 col-form-label">Ethnicity</label>
                        <div class="col-sm-10">
                            <input id="ethnicity" name="ethnicity" class="form-control" type="text" value="{{ old('ethnicity') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="birthday" class="col-sm-2 col-form-label">Recruitment Date</label>
                        <div class="col-sm-10">
                            <input id="recruitmentdate" name="recruitmentdate" class="form-control" type="datetime-local" value="{{ old('recruitmentdate') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="department_id" class="col-sm-2 col-form-label">Department</label>
                        <div class="col-sm-10">
                            <select id="department_id" name="department_id" class="form-control">
                                @forelse ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->Name }}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-2 text-center">
                    <i class="fas fa-user-alt fa-10x"></i>
                    <div class="pt-5">
                        <input class="text-center form-control" value="ID: Auto" disabled>
                    </div>
                </div>
            </div>
            @csrf
            <button type="submit" class="btn btn-primary btn-lg">Create</button>
        </form>
    </div>
</div>
@endsection
