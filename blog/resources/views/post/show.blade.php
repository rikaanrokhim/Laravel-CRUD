@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">{{ $post->title }} | <small>{{ $post->category->name }}</small></div>

                <div class="panel-body">
                    <p>{{ $post->content }}</p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Tambahkan Komentar</div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('post.comment.store', $post) }}" method="post">
                        {{ csrf_field() }}
                        <textarea name="message" class="form-control" rows="5" cols="30" placeholder="Berikan komentar ..." style="resize: none;"></textarea>
                        <br>
                        <input type="submit" class="btn btn-primary" name="" value="Komentar">
                    </form>
                </div>

                @foreach ($post->comments()->get() as $comment)
                    <div class="panel-body">
                        <h4><b>{{ $comment->user->name }}</b> - {{ $comment->created_at->diffForHumans() }}</h4>

                        <p>{{ $comment->message }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
