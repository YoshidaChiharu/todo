@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__content">
    <div class="todo__write">
        <form action="/todos" method="post" class="write-form">
            <div class="write-form__input--text">
                <input type="text">
            </div>
            <div class="write-form__button">
                <button class="write-form__button--submit" type="submit">作成</button>
            </div>
        </form>
    </div>
    <div>
        <ul class="todo__list">
            <li class="list-item">
                <h2 class="list-title">Todo</h2>
            </li>
            <li class="list-item">
                <div class="list-item__inner--left">
                    <p class="list-item__text">test</p>
                </div>
                <div class="list-item__inner--right">
                    <form action="">
                        <buttom class="list-item__button button--update">更新</buttom>
                        <buttom class="list-item__button button--delete">削除</buttom>
                    </form>
                </div>
            </li>
            <li class="list-item">
                <div class="list-item__inner--left">
                    <p class="list-item__text">test2</p>
                </div>
                <div class="list-item__inner--right">
                    <form action="">
                        <buttom class="list-item__button button--update">更新</buttom>
                        <buttom class="list-item__button button--delete">削除</buttom>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
@endsection