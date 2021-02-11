@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="#">{{ $thread->creator->name }}</a> posted:
                    <h1>{{ $thread->title }}</h1>
                </div>
                <div class="card-body">
                    <h4>{{ $thread->body }}</h4>
                    <hr>
                </div>
            </div>
            <hr>

            @foreach ($replies as $reply)
                @include ('threads.reply')
                <hr>
            @endforeach

            {{ $replies->links() }}

            @if (auth()->check())
                <form method="POST" action="{{ $thread->path() . '/replies' }}">
                    @csrf
                    <div class="form-group">
                        <textarea name="body" id="body" class="form-control" placeholder="Have Something To Say?" rows="5"></textarea>
                        <hr>
                        <button type="submit" class="btn btn-info"> Post </button>
                    </div>
                </form>
            @else
                <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion!</p>
            @endif
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p>
                        This thread was published {{ $thread->created_at->diffForHumans() }} by
                        <a href="#">{{ $thread->creator->name }}</a> and currently
                        has {{ $thread->replies_count }} comments!
                    </p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

