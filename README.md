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

1. git clone git@github.com:hi-san10/coachtech_atte.git

2. docker-compose up -d --build

*MYSQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせて docker-compose.yml ファイルを編集してください。

### Laravel環境構築

1. docker-compose exec php bash

2. composer install

3. env.example ファイルから .env を作成し、環境変数を変更

    ・開発環境ではMailtrapサービスを使ってメール機能を開発しています

    ・Mailtrap url https://mailtrap.io

4. php artisan key:generate

5. php artisan migrate

6. php artisan db:seed

    ・ダミーデータのユーザーのパスワードは全て「1111」になっています。

    ・認証メールの機能はそれぞれでenvファイルを編集して使用してください

    ・ユーザー一覧はログイン後、ログインページから移動できます

    ・ユーザーごとの勤怠一覧はユーザー一覧ページから名前をクリックすると確認できます

## 使用技術

・PHP 7.4.9

・Laravel 8.83

・MYSQL 8.0

## ER図

![](https://github.com/user-attachments/assets/b53378c6-834b-44de-9487-a1a2260fe8c6)

## URL

・アプリケーション:[http//localhost/](http//localhost/)

・phpMyAdmin:[http//localhost:8080](http/localhost:8080)
![103985DE-3AFC-41D1-B28B-B189BDC8938A](https://github.com/user-attachments/assets/12c952ff-deb2-4312-8e03-f97c9e46020c)