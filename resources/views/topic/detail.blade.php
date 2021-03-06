@extends('layouts.master')

@section('pageTitle', 'トピック詳細')
@section('pageDescription', 'トピック詳細ページです')
@section('pageId', 'topic_detail')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      @if ($topic->link==null)
      <h1>{{ $topic->title }}</h1>
      @else
      <h1><a href="{{ $topic->link->link }}" target="_blank">{{ $topic->title }}</a></h1>
      @endif
      <div class="data clearfix">
        <div class="name clearfix"><i class="fa fa-user fa-fw" aria-hidden="true"></i> {{ $topic->user->name }}</div>
        <div class="date"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i> {{ $topic->created_at }}</div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="main">
        <p class="body">{!! nl2br(e($topic->body)) !!}</p>
      </div>
      <div class="comment-wrap">
        @forelse($topic->comments as $comment)
        <div class="comment clearfix" id="comment{{ $comment->id }}">
          <div class="name">{{ $comment->user->name }}</div>
          <div class="body">
            <div class="text">{!! nl2br(e($comment->body)) !!}</div>
            <div class="date"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>{{ $comment->created_at }}</div>
          </div>
        </div>
        @empty
        <p>まだコメントがありません</p>
        @endforelse
      </div>
      <div class="comment-wrap" id="new-comments">
        <div v-for="item in items" class="comment clearfix" id="<?php echo "{{ item.id }}" ?>">
          <div class="name"><?php echo "{{ item.name }}" ?></div>
          <div class="body">
            <div class="text"><?php echo "{{ item.body }}" ?></div>
            <div class="date"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><?php echo "{{ item.created_at }}" ?></div>
          </div>
        </div>
      </div>
      @if (Auth::guest())
      <div class="comment_no_login"><p class="text-center">コメントするには<a href="/login">ログイン</a>してください</p></div>
      @else
      <div class="comment-post" id="comment-post">
        <form>
          <div class="comment clearfix">
            <div class="name"></div>
            <div class="body">
              <div class="text clearfix">
                <textarea v-model="params.body" id="comment-input"></textarea>
                <button class="btn btn-primary btn-submit" type="button" v-on:click="submit">ワイワイ</button>
              </div>
            </div>
          </div>
          <input type="hidden" v-model="params.topic_id" value="{{ $topic->id }}">
        </form>
      </div>
      @endif
    </div>
    <div class="col-sm-4">
      <div class="ad" style="width: 300px; margin: 0 auto 5px;"><div style="width: 290px; height: 240px; background: #f0f8ff; border: 5px solid #483d8b;"></div></div>
      <div class="ad" style="width: 300px; margin: 0 auto 5px;"><div style="width: 290px; height: 240px; background: #ffffe0; border: 5px solid #f0e68c;"></div></div>
    </div>
  </div>
</div>
@endsection
