@extends('layouts.app')

@section('content')
{{-- {{ dump($errors)}} --}}
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto m-5">
                <div class="card p-5">
                    <div class="panel-heading m-5">
                        <h2>Change Avatar</h2>
                    </div>
                    <div class="panel-body mb-5">
                        <form action="{{ route('uploadAvatar') }}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row col-md-12 mb-4">
                                <div class="col-4 offset-1">
                                    <img src="{{ asset('img/'. auth()->user()->avatar) }}" style="width: 200px; height: 200px;" >
                                </div>
                                <div class="col-5 offset-1 my-auto">
                                    <input id="avatar" name="avatar" type="file">
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




    