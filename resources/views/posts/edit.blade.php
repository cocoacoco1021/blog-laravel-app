@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
@endsection

@section('content')
    <div class="container">
        <h1>Edit #{{ $edit->id }}</h1>
        <div class="card my-4 mx-auto col-sm-8" id="post">
            <div class="col-sm-10 mx-auto my-4">
            {{-- <form action="{{ route('update', ['id'=>$edit->id]) }}" method="post"> --}}
                <form action="/posts/{{ $edit->id }}/update" method="post">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <textarea id="text" placeholder="Share your thought" cols="80" name="content" rows="3">{{ $edit->content }}</textarea>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/home" class="btn btn-secondary">Back</a>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection