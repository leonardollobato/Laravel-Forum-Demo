@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#">
                            {{ $thread->owner->name }}
                        </a> publicado:
                        {{ $thread->title }}
                    </div>
                    <div class="panel-body">
                        {{ $thread->body }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>

        @if(auth()->check())
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form action="{{ $thread->path() .  '/replies'}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="body"
                                      id="body"
                                      class="form-control"
                                      placeholder="Have somthing to say?"
                                      rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Post</button>
                    </form>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <p class="text-center">
                        Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion.
                    </p>
                </div>
            </div>
        @endif
    </div>
@endsection
