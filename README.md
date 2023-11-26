## アプリケーションについて

名前：プログラミングブログ<br>
URL：https://blog.demo-site-nt.com/

## 概要

WordPressの様な複数人でブログを投稿・管理することができるCMSです。<br>
WordPressと同様のシステムを開発したく、下記の機能を実装しています。
* カテゴリー機能と検索機能
* 最新記事 / ピックアップ記事 / 関連記事 / 前後の記事
* SNSシェアボタン
* お問い合わせ

## 開発の背景

いつも仕事でCMSを使用して、サイトを構築しています。<br>
主要なCMSは非常に便利で、とても簡単にサイトを作成することができます。<br>
主に使用しているWordPressは普通のサイトだけではなく、<br>
ブログやECサイト、会員制など無料で大体のサイトを制作できます。

ただ、いくつものをサイトを作って思いました。<br>
**オリジナルのCMSを作ってみたい**<br>
**そのサイトに必要な機能だけを実装したCMSを作りたい**<br>
**ECや会員制などどんなサイトでも応用できるCMSを作りたい**

シンプル・軽量・応用力などいくつものパターンのCMSを作りたくなりました。<br>
こうした背景から、今回は、ブログとお問い合わせというシンプルなCMSを開発しました。

## 使用技術

* __フロントエンド__
  * HTML
  * CSS/SASS
  * TailwindCSS
  * jQuery

* __バックエンド__
  * PHP 8.2.4
  * Laravel 10.28.0
  * Composer 2.5.1
  * Laravel-Admin

* __インフラ__
  * XAMPP 8.0.28
  * Apache 2.4.52
  * MariaDB 10.4.22
  * ロリポップ

* __その他使用ツール__
  * Visual Studio Code
  * Git/GitHub
  * draw.io

## アプリのイメージ

| トップ【ユーザー】 | 記事詳細【ユーザー】 |
| ---- | ---- |
| ![トップ【ユーザー】](/docs/img/info01.png) | ![記事詳細【ユーザー】](/docs/img/info02.png) |
| トップページは記事の一覧ページです。 | 記事の詳細ページです。 |

| お問い合わせ【ユーザー】 | ログイン【管理者】 |
| ---- | ---- |
| ![お問い合わせ【ユーザー】](/docs/img/info03.png) | ![ログイン【管理者】](/docs/img/info04.png) |
| 確認と完了ページ付きお問い合わせページです。 | Laravel-adminを使用した管理画面です。 |

| 記事の作成【管理者】 | カテゴリーの作成【管理者】 |
| ---- | ---- |
| ![記事の作成](/docs/img/info05.png) | ![カテゴリーの作成](/docs/img/info06.png) |
| 記事の作成・編集できるページです。 | 記事のカテゴリーを作成・編集できるページです。 |

| お問い合わせ確認【管理者】 |  |
| ---- | ---- |
| ![記事の作成](/docs/img/info07.png) |  |
| お問い合わせ情報を確認できるページです。 |  |

| トップ画面 |　ログイン画面 |
| ---- | ---- |
| ![Top画面](/docs/img/app-view/welcome_1.1.png) | ![ログイン画面](/docs/img/app-view/login_1.1.png) |
| 登録せずにサービスをお試しいただくためのトライアル機能を実装しました。 | ログインIDとパスワードでの認証機能を実装しました。 |

| 事業者選択画面 |　請求書作成画面 |
| ---- | ---- |
| ![事業者選択画面](/docs/img/app-view/select-business_1.1.png) | ![請求書作成画面](/docs/img/app-view/create-invoice_1.1.png) |
| 登録済みの複数の事業者の中から、請求書を作成したい事業者を選択する機能を実装しました。 | 請求書の作成機能・マスタデータの呼び出し機能・税率変更機能・税率別内訳の計算機能、合計金額の計算機能を実装しました。 |

| 請求書詳細画面 |　PDF出力画面 |
| ---- | ---- |
| ![請求書詳細画面](/docs/img/app-view/invoice-detail_1.1.png) | ![　PDF出力画面](/docs/img/app-view/print-invoice_1.1.png) |
| 請求書データの表示機能を実装しました。 | PDFでの請求書発行機能を実装しました。 |

| 登録するマスタの選択画面 |　マスタの登録画面 |
| ---- | ---- |
| ![請求書詳細画面](/docs/img/app-view/select-master_1.1.png) | ![　PDF出力画面](/docs/img/app-view/master-register-form_1.1.png) |
| 事業者情報と備考欄情報のマスタ登録機能を実装しました。 | マスタ情報の登録をすることで、請求書の作成時にデータを呼び出すことができます。 |


## インフラ構成図

![AWS_Diagram](https://user-images.githubusercontent.com/58071320/98756993-eed4d600-240e-11eb-8a3a-141290e77fc9.png)

## ER図

![AWS_Diagram](https://user-images.githubusercontent.com/58071320/98756993-eed4d600-240e-11eb-8a3a-141290e77fc9.png)

## 機能一覧

### 管理画面（Laravel-Admin）
* __一管理者関連__<br>
  アカウント新規登録、プロフィール編集機能、アカウント削除<br>
  パスワード変更<br>
  ログイン、ログアウト機能

* __記事の投稿機能（CRUD処理）__<br>
  記事の作成・削除・表示

* __記事のカテゴリー（CRUD処理）__<br>
  記事のカテゴリーの作成・削除・表示

* __お問い合わせデータ__<br>
  ユーザーからのお問い合わせデータの表示

### フロント側
* __カテゴリー検索__
* __投稿検索__
* __最新記事 / ピックアップ記事 / 関連記事 / 前後の記事__
* __お問い合わせ__

## 今後追加したい機能
* タグ機能
* 年月アーカイブ
* コメント機能
* 予約投稿機能
* 会員制ブログ
