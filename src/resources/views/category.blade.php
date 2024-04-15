@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection

@section('content')
<!-- 成功／エラーメッセージ表示 -->
@if (session('status'))
<div class="info-updated">
    <div class="info__inner">{{ session('status') }}</div>
</div>
@endif
@error('name')
<div class="info-error">
    <div class="info__inner">{{ $message }}</div>
</div>
@enderror

<div class="category__content">
    <!-- 新規category作成欄 -->
    <div class="category__write">
        <div class="category__write--heading">
            <h2>新規作成</h2>
        </div>
        <form action="/categories" method="post" class="write-form">
            @csrf
            <div class="write-form__input--text">
                <input type="text" name="content">
            </div>
            <div class="write-form__button">
                <button class="write-form__button--submit" type="submit">作成</button>
            </div>
        </form>
    </div>

    <!-- category一覧表示 -->
    <table class="category__table">
        <tr class="category__table--row">
            <th class="category__table--text category__table--heading">Category</th>
        </tr>
        <tr class="category__table--row">
            <form action="">
                @csrf
                <th class="category__table--text">
                    <input type="text" name="content" value="category1">
                </th>
                <th class="category__table--button">
                    <button class="table-button button--update">更新</button>
                </th>
            </form>
            <form action="">
                @csrf
                <th class="category__table--button">
                    <button class="table-button button--delete">削除</button>
                </th>
            </form>
        </tr>
        @foreach ( $items as $item)
        <tr class="category__table--row">
            <form action="/categories/update/{{$item->id}}" method="post">
                @csrf
                <th class="category__table--text">
                    <input type="text" name="content" value="{{ $item->content }}">
                </th>
                <th class="category__table--button">
                    <button class="table-button button--update">更新</button>
                </th>
            </form>
            <form action="/categories/delete/{{$item->id}}" method="post">
                @csrf
                <th class="category__table--button">
                    <button class="table-button button--delete">削除</button>
                </th>
            </form>
        </tr>
        @endforeach
    </table>
</div>
@endsection