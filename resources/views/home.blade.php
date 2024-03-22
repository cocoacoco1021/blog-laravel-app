@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="user-info text-center">
                            <div class="avatar">
                                <div class="default">
                                    <img src="{{ asset('img/'. auth()->user()->avatar) }}" class="card-img-top col-sm-8" alt="...">
                                </div>
                                <h3 class="mb-0">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
                                <div class="mt-3">
                                    <a class="btn btn-sm btn-info text-white" href="/users/edit">Edit Profile</a>
                                    <a class="btn btn-sm btn-secondary text-white" href="/users/changeAvatar">Change Avatar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="d-inline-block mr-4">
                                <a href="/users/{{ auth()->user()->id }}/following">
                                    <h5 class="d-inline">{{ auth()->user()->followedUsers()->count() }}</h5>
                                </a>
                                <span>following</span>
                            </div>
                            <div class="d-inline-block mr-4">
                                <a href="/users/{{ auth()->user()->id }}/followers">
                                    <h5 class="d-inline">{{ auth()->user()->followers()->count() }}</h5>
                                </a>
                                <span>followers</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <a class="btn btn-info btn-block no-border text-white p-3">
                            {{ auth()->user()->posts()->count() }}   
                            blogs posted
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="card mb-4" id="">
                    <div class="card-body" id="post">
                        <h3 class="text-center mb-4">Post</h3>
                    <form class="postarea" action="/post" method="post">
                        @csrf
                        <textarea name="message" cols="80" rows="3" placeholder="Share your thoughts.."></textarea>
                        <button type="submit" class="btn btn-primary mt-1 float-right">Post</button>
                        {{-- <input type="submit" class="btn btn-danger" value="Post"> --}}
                    </form>
                    </div>
                </div>
                <div class="activity-feed" id="">
                    <div class="card mb-4">
                        <div class="page-header mt-0 text-center">
                            <div class="card-body" id="post">
                                <h3 class="text-center mb-4">Blogs</h3>
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @foreach ($listOfposts as $post)
                                    <div class="card mb-4" id="newpost"> 
                                        <div class="card-header" id="edit">     
                                            <form action="{{ route('delete', ['id' => $post->id]) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger float-right ml-1">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                            <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning float-right"><i class="fa fa-edit"></i></a>
                                        </div>
                                
                                        <div class="card-body">
                                            <blockquote class="blockquote mb-0">
                                                <p>{{ $post->content }}</p>
                                                <footer class="blockquote-footer">Posted <cite> {{ $post->created_at->diffForHumans() }}</cite></footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection