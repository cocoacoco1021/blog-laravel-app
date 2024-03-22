@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4 mt-5">
                <div class="panel user-profile">
                    <div class="card">
                        <div class="text-center">
                            <div class="avatar">
                                <div class="default">
                                    <img class="mt-4" src="{{ asset('img/'. $user->avatar) }}" style="width: 100px; height: 100px;" alt="">
                                </div>
                            </div>
                            <div class="py-2">
                                <h3 class="mb-0">{{ $user->first_name }} {{ $user->last_name }}</h3>
                            </div>
                            <div class="btn-group justfied">
                                <div class="ml-auto">
                                    @if (auth()->user()->isFollowing($user->id))
                                    <a href="{{ route('user.unfollow', ['followed_id' => $user->id]) }}" class="btn btn-danger">Unfollow</a>
                                    @else
                                    <a href="{{ route('user.follow', ['followed_id' => $user->id]) }}" class="btn btn-primary">Follow</a>
                                    @endif
                                </div>
                            </div>
                            <div class="dropdown-divider my-4"></div>
                            <div class="row mt-15">
                                <div class="col-sm-6">
                                    <strong>
                                    <a href="/users/{{ $user->id }}/following">{{ $user->followedUsers()->count() }}</a>
                                    </strong>
                                    <div>following</div>
                                </div>
                                <div class="col-sm-6">
                                    <strong>
                                        <a href="/users/{{ $user->id }}/followers">{{ $user->followers()->count() }}</a>
                                    </strong>
                                    <div>followers</div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider my-4"></div>
                        <div class="mt-1 mb-5">
                            <div class="mx-3" id="border">
                                <a class="btn btn-block" id="post">
                                <h4 class="mt-2"> {{ $user->posts()->count() }} </h4>
                                <p class="mb-2">blogs posted</p> 
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 mt-5">
                <div class="activity-feed">
                    <div class="card mb-4">
                        <div class="page-header mt-0 text-center">
                            <div class="card-body" id="post">
                                <h3 class="text-center mb-4">Blogs</h3>
                                @if (auth()->user()->isFollowing($user->id))
                                @foreach ($user->posts as $post)
                                    <div class="card mb-4" id="newpost"> 
                                        <div class="card-body">
                                            <blockquote class="blockquote mb-0">
                                                <p>{{ $post->content }}</p>
                                                <footer class="blockquote-footer">Posted <cite> {{ $post->created_at->diffForHumans() }}</cite></footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                @endforeach
                                @else
                                    <div class="text-center text-danger">
                                        <h3>You are not following this user!</h3> 
                                    </div>
                                @endif   
                            </div>
                        </div>       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
