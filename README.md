<div id="top"></div>

## 目次

1. [プロジェクト概要](#)
2. [使用技術一覧](#使用技術一覧)
3. [環境](#)
4. [環境構築手順](#)
5. [環境変数](#)

## プロジェクト概要

カテゴリ分けしたTodoを「登録／表示／更新／削除」することが出来るWEBアプリ開発プロジェクト

## 使用技術一覧

- Laravel
- PHP
- NGINX
- MYSQL

## 環境

| 言語・フレームワーク  | バージョン |
| --------------------- | ---------- |
| PHP                   | 7.4.9      |
| NGINX                 | 1.21.1     |
| MySQL                 | 8.0.26     |

## 環境構築手順

1. **リモートリポジトリをクローンする**
```
$ git clone git@github.com:YoshidaChiharu/todo.git
```
2. **Dockerコンテナ作成**
```
$ docker-compose up -d --build
```
3. **PHPコンテナ内にログイン**
```
$ docker-compose exec php bash
```
4. **`composer` コマンドでパッケージをインストール**
```
$ composer install
```
5. **`.env` ファイルを作成し、アプリケーションキーを生成**
```
$ cp .env.example .env
$ php artisan key:generate
```
6. **（必要に応じて）パーミッションを変更**
```
sudo chmod -R 777 src/
```
7. **下記環境変数を基に、`.env` ファイル内のデータベース名／ユーザー名／パスワード等を以下の通り書き換え**
```
// 前略

DB_CONNECTION=mysql
DB_HOST=mysql             # 書き換え箇所
DB_PORT=3306
DB_DATABASE=laravel_db    # 書き換え箇所
DB_USERNAME=laravel_user  # 書き換え箇所
DB_PASSWORD=laravel_pass  # 書き換え箇所

// 後略
```
8. **a**
9. **a**
10. **a**

## 環境変数

| 変数名                 | 役割                                      | デフォルト値                       | DEV 環境での値                           |
| ---------------------- | ----------------------------------------- | ---------------------------------- | ---------------------------------------- |
| MYSQL_ROOT_PASSWORD    | MySQL のルートパスワード（Docker で使用） | root                               |                                          |
| MYSQL_DATABASE         | MySQL のデータベース名（Docker で使用）   | django-db                          |                                          |
| MYSQL_USER             | MySQL のユーザ名（Docker で使用）         | django                             |                                          |
| MYSQL_PASSWORD         | MySQL のパスワード（Docker で使用）       | django                             |                                          |
| MYSQL_HOST             | MySQL のホスト名（Docker で使用）         | db                                 |                                          |
| MYSQL_PORT             | MySQL のポート番号（Docker で使用）       | 3306                               |                                          |

<p align="right">(<a href="#top">トップへ</a>)</p>
