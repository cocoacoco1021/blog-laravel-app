@extends('layouts.app')

@section('content')
{{-- {{dump ($errors)}} --}}
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto m-5">
                <div class="card p-5">
                    <div class="panel-heading m-5">
                        <h2>Edit Profile</h2>
                    </div>
                    <div class="panel-body mb-5">
                        <form action="{{ route('update') }}" method="post" class="form-horizontal">
                            @method('PATCH')
                            @csrf
                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">
                                    First Name
                                </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid': '' }}" name="first_name" value="{{ auth()->user()->first_name }}">
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid': '' }}" name="last_name" value="{{ auth()->user()->last_name }}">
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">New Password</label>
                                <div class="col-md-6">
                                    <input type="password" name="new_password" class="form-control {{ $errors->has('new_password') ? 'is-invalid': '' }}">
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                <div class="col-md-6">
                                    <input type="password" name="new_password_confirmation" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="/home" class="btn btn-secondary">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
