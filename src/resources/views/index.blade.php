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
        <div class="todo__write--heading">
            <h2>新規作成</h2>
        </div>
        <form action="/todos" method="post" class="write-form">
            @csrf
            <div class="write-form__input--text">
                <input type="text" name="content">
            </div>
            <div class="write-form__input--category">
                <input type="text" name="name" placeholder="カテゴリ">
            </div>
            <div class="write-form__button">
                <button class="write-form__button--submit" type="submit">作成</button>
            </div>
        </form>
    </div>

    <!-- Todo検索 -->
    <div class="todo__search">
        <div class="todo__search--heading">
            <h2>Todo検索</h2>
        </div>
        <form action="" method="post" class="search-form">
            @csrf
            <div class="search-form__input--text">
                <input type="text" name="content">
            </div>
            <div class="search-form__input--category">
                <input type="text" name="name" placeholder="カテゴリ">
            </div>
            <div class="search-form__button">
                <button class="search-form__button--submit" type="submit">作成</button>
            </div>
        </form>
    </div>

    <!-- Todo一覧表示 -->
    <table class="todo__table">
        <tr class="todo__table--row">
            <th class="todo__table--text todo__table--heading">Todo</th>
            <th class="todo__table--category todo__table--heading">カテゴリ</th>
        </tr>
        @foreach ( $items as $item)
        <tr class="todo__table--row">
            <form action="/todos/update/{{$item->id}}" method="post">
                @csrf
                <th class="todo__table--text">
                    <input type="text" name="content" value="{{ $item->content }}">
                </th>
                <th class="todo__table--category">Category</th>
                <th class="todo__table--button">
                    <button class="table-button button--update">更新</button>
                </th>
            </form>
            <form action="/todos/delete/{{$item->id}}" method="post">
                @csrf
                <th class="todo__table--button">
                    <button class="table-button button--delete">削除</button>
                </th>
            </form>
        </tr>
        @endforeach
    </table>
</div>
@endsection