# Atte(勤怠管理システム)

## 企業の人事評価のために作成

## 機能一覧
・ 会員登録

・ ログイン

・ ログアウト

・ 勤務開始

・ 勤務終了

・ 休憩開始

・ 休憩終了

・ 日付別勤怠情報表示

・ メールによる認証

・ ユーザー一覧表示

・ ユーザーごとの勤怠一覧表示

## 環境構築

### Dockerビルド

1. git clone git@github.com:hi-san10/coachtechtest.git

2. docker-compose up -d --build

*MYSQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせて docker-compose.yml ファイルを編集してください。

### Laravel環境構築

1. docker-compose exec php bash

2. composer install

3. env.example ファイルから .env を作成し、環境変数を変更

4. php artisan key:generate

5. php artisan migrate

6. php artisan db:seed

    ・ダミーデータのユーザーのパスワードは全て「1111」になっています。

    ・認証メールの機能はそれぞれでenvファイルを編集して使用してください

## 使用技術

・PHP 7.4.9

・Laravel 8.83

・MYSQL 8.0

## ER図

![](/Users/maruyamahiroshishin/coachtech/laravel/atte/er.drawio.png)

## URL

・アプリケーション:[http//localhost/](http//localhost/)

・phpMyAdmin:[http//localhost:8080](http/localhost:8080)
