@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<!-- 成功／エラーメッセージ表示 -->
@if (session('status'))
<div class="info-updated">
    <div class="info__inner">{{ session('status') }}</div>
</div>
@endif
@error('content')
<div class="info-error">
    <div class="info__inner">{{ $message }}</div>
</div>
@enderror

<div class="todo__content">

    <!-- 新規Todo作成欄 -->
    <div class="todo__write">
        <form action="/todos" method="post" class="write-form">
            @csrf
            <div class="write-form__input--text">
                <input type="text" name="content">
            </div>
            <div class="write-form__button">
                <button class="write-form__button--submit" type="submit">作成</button>
            </div>
        </form>
    </div>

    <!-- Todo一覧表示 -->
    <div>
        <ul class="todo__list">
            <li class="list-item">
                <h2 class="list-title">Todo</h2>
            </li>
            @foreach ( $items as $item)
            <li class="list-item">
                <form action="/todos/update/{{$item->id}}" method="post" class="list-item__inner--left">
                    @csrf
                    <div>
                        <input type="text" name="content" class="list-item__text" value="{{ $item->content }}">
                    </div>
                    <div>
                        <button class="list-item__button button--update">更新</button>
                    </div>
                </form>
                <form action="/todos/delete/{{$item->id}}" method="post" class="list-item__inner--right">
                    @csrf
                    <button class="list-item__button button--delete">削除</button>
                </form>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection