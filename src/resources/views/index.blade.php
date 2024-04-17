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
@if($errors->any())
<div class="info-error">
    <ul class="info__inner">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

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
                <select name="category_id">
                    <option value="" selected>カテゴリ</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
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
        <form action="/todos/search" method="get" class="search-form">
            @csrf
            <div class="search-form__input--text">
                <input type="text" name="content">
            </div>
            <div class="search-form__input--category">
                <select name="category_id">
                    <option value="" selected>カテゴリ</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="search-form__button">
                <button class="search-form__button--submit" type="submit">検索</button>
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
            <form action="/todos/update" method="post">
                @csrf
                <th class="todo__table--text">
                    <input type="text" name="content" value="{{ $item->content }}">
                    <input type="hidden" name="id" value="{{ $item->id }}">
                </th>
                <th class="todo__table--category">
                    {{ $item->category->name }}
                    <input type="hidden" name="category_id" value="{{ $item->category->id }}">
                </th>
                <th class="todo__table--button">
                    <button class="table-button button--update">更新</button>
                </th>
            </form>
            <form action="/todos/delete" method="post">
                @csrf
                <th class="todo__table--button">
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <button class="table-button button--delete">削除</button>
                </th>
            </form>
        </tr>
        @endforeach
    </table>
</div>
@endsection