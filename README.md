# ⚾ プロ野球選手名鑑アプリ

Blade テンプレート + Vue コンポーネントを使った、プロ野球選手名鑑管理アプリです。  
Laravel Sail を用いて Docker 上で開発を行います。

---

## 🛠 使用技術

-   **Laravel 10**
-   **Blade + Vue 3**（SPA ではなく Blade 内でのコンポーネント利用）
-   **PostgreSQL**
-   **Laravel Sail (Docker 開発環境)**
-   **認証機能（Laravel Breeze）**
-   **外部 API からの成績取得**
-   **お気に入り機能**
-   **認可（管理者のみ CRUD 可能）**

---

## 🚀 セットアップ手順

```bash
git clone https://github.com/imurar/npb-Laravel
cd npb-Laravel

# Sail 起動（初回のみ）
./vendor/bin/sail up -d

# 依存関係インストール
./vendor/bin/sail composer install
./vendor/bin/sail npm install && ./vendor/bin/sail npm run dev

# .env 作成
cp .env.example .env

# アプリキー生成
./vendor/bin/sail artisan key:generate

# DBマイグレーション
./vendor/bin/sail artisan migrate
```

---

## 🧱 DB 構成

### users

| カラム名   | 型        | 説明                 |
| ---------- | --------- | -------------------- |
| id         | bigint    | PK                   |
| name       | string    | ユーザー名           |
| email      | string    | ログイン用メール     |
| password   | string    | ハッシュ済パスワード |
| role       | enum      | `user` or `admin`    |
| created_at | timestamp |                      |
| updated_at | timestamp |                      |

### teams

| カラム名     | 型     | 説明             |
| ------------ | ------ | ---------------- |
| id           | bigint | PK               |
| name         | string | チーム名         |
| abbreviation | string | 略称 (例: HAWKS) |
| logo_url     | string | ロゴ URL         |

### players

| カラム名  | 型     | 説明       |
| --------- | ------ | ---------- |
| id        | bigint | PK         |
| name      | string | 選手名     |
| team_id   | FK     | 所属チーム |
| number    | int    | 背番号     |
| photo_url | string | 顔写真 URL |

### positions

| カラム名     | 型     | 説明     |
| ------------ | ------ | -------- |
| id           | bigint | PK       |
| name         | string | 例: 捕手 |
| abbreviation | string | 例: C    |

### player_position（多対多）

| player_id   | FK  | players.id   |
| ----------- | --- | ------------ |
| position_id | FK  | positions.id |

### batter_stats

| カラム名      | 型     | 説明 |
| ------------- | ------ | ---- |
| match_date    | 日付   |      |
| opponent_team | string |      |
| at_bats       | int    |      |
| hits          | int    |      |
| home_runs     | int    |      |
| rbi           | int    |      |
| strikeouts    | int    |      |
| walks         | int    |      |

### pitcher_stats

| カラム名        | 型      | 説明 |
| --------------- | ------- | ---- |
| match_date      | 日付    |      |
| opponent_team   | string  |      |
| innings_pitched | float   |      |
| hits_allowed    | int     |      |
| strikeouts      | int     |      |
| walks           | int     |      |
| earned_runs     | int     |      |
| win             | boolean |      |
| save            | boolean |      |

### favorites

ユーザーのお気に入り選手登録テーブル。

| user_id   | FK  | users.id   |
| --------- | --- | ---------- |
| player_id | FK  | players.id |

### external_api_sources

選手成績の外部データ取得元の記録用。

| player_id   | FK     | players.id |
| ----------- | ------ | ---------- |
| source_name | string |            |

---

## 🔐 認証 / 認可

-   Laravel Breeze を利用（`sail artisan breeze:install` 済）
-   `role` カラムで `admin` のみ選手・成績の編集可能
-   Laravel Policy / Gate により制御

---

## 💡 機能概要

-   ✅ ログイン / 登録
-   ✅ 選手一覧 / 詳細ページ
-   ✅ お気に入り追加 / 削除
-   ✅ 直近 3 試合の成績表示（打者・投手）
-   ✅ 管理者による CRUD 機能
-   ✅ 外部 API との定期同期（予定：Artisan Command + スケジューラ）

---

## 📚 今後の実装予定

-   成績同期用バッチ（外部 API 連携）
-   Vue での「お気に入り選手」表示コンポーネント
-   成績グラフ化（Chart.js など）
-   チーム別選手一覧

---

## 🧪 テスト

```bash
./vendor/bin/sail artisan test
```

---

## 🧑‍💻 開発者

-   開発者: R.Imura
-   GitHub: [@imurar](https://github.com/imurar)
