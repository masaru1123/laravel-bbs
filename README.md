# Laravel掲示板アプリ

## 概要
Laravelで作成したシンプルな掲示板アプリです。  
投稿・一覧表示・編集・削除ができます。

## 機能
- 投稿
- 一覧表示
- 編集
- 削除

## 使用技術
- PHP
- Laravel
- MySQL
- Docker（Laravel Sail）

## 環境構築

```bash
git clone https://github.com/masaru1123/laravel-bbs.git
cd laravel-bbs

cp .env.example .env

composer install
./vendor/bin/sail up -d

./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate

※Laravel Sail（Docker）を使用した開発環境を前提としています。

※Laravel Sail（Docker）を使用していますが、ローカル環境でも動作可能です。

## 画面イメージ

![一覧画面](https://github.com/masaru1123/laravel-bbs/blob/main/images/sample.png)

```