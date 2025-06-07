# 📘 NPB Directory アプリケーション

プロ野球の球団・選手情報を管理・表示するシステムです。  
Laravel (Breeze + Inertia.js + Vue 3) をベースに、SPAとして構築しています。

---

## 🏗️ 使用技術

- **Laravel 12**
- **Vue 3** (Composition API)
- **Inertia.js**
- **Laravel Breeze (Vue)** - 認証スキャフォールド
- **Tailwind CSS**
- **Eloquent ORM**

---

## 📚 機能一覧

### ✅ 基本機能

| 機能 | 説明 |
|------|------|
| ユーザー認証 | Breezeで構築（ログイン / 登録 / ログアウト） |
| 球団一覧 | `/teams` にて球団一覧を表示（Inertia + Vue） |
| 球団詳細 | `/teams/{id}` で詳細表示 |
| 選手一覧 | 球団ごとの選手一覧表示 |
| 削除選手表示 | 論理削除された選手の一覧表示 |
| 復元機能 | 論理削除からの復元処理 |
| お気に入り機能 | ユーザーが選手をお気に入りとしてマークできる機能を追加 |

### 🛠️ 拡張予定
- [ ] 選手検索・ソート機能

---

## 📁 ディレクトリ構成

<pre>
resources/
└── js/
    ├── Layouts/
    │   └── AuthenticatedLayout.vue
    └── Pages/
        ├── Players/
        │   ├── Create.vue
        │   ├── Deleted.vue
        │   ├── Edit.vue
        │   ├── Index.vue
        │   └── Show.vue
        └── Teams/
            ├── Index.vue
            └── Show.vue
</pre>


---

## 🚀 開発環境構築手順

1. Breeze + Vue インストール

```bash
composer require laravel/breeze --dev
php artisan breeze:install vue
npm install && npm run dev
php artisan migrate
```

2. 開発サーバー起動

```bash
php artisan serve
```


## 📚 ルーティング一覧

| メソッド     | URI                                               | 名前                         | コントローラー・アクション                      | 用途                      |
|--------------|---------------------------------------------------|------------------------------|-------------------------------------------------|---------------------------|
| GET|HEAD     | /teams                                            | teams.index                  | MTeamController@index                            | チーム一覧表示             |
| GET|HEAD     | /teams/{team_id}                                  | teams.show                   | MTeamController@show                             | チーム詳細表示             |
| GET|HEAD     | /teams/{team_id}/players                          | players.index                | TPlayerController@index                          | 選手一覧表示               |
| POST         | /teams/{team_id}/players                          | players.store                | TPlayerController@store                          | 選手登録                   |
| GET|HEAD     | /teams/{team_id}/players/create                   | players.create               | TPlayerController@create                         | 選手作成画面               |
| GET|HEAD     | /teams/{team_id}/players/deleted                  | players.deleted              | TPlayerController@deleted                        | 削除済み選手一覧           |
| GET|HEAD     | /teams/{team_id}/players/{player_id}              | players.show                 | TPlayerController@show                           | 選手詳細表示               |
| PUT          | /teams/{team_id}/players/{player_id}              | players.update               | TPlayerController@update                         | 選手情報更新               |
| DELETE       | /teams/{team_id}/players/{player_id}              | players.destroy              | TPlayerController@destroy                        | 選手削除                   |
| GET|HEAD     | /teams/{team_id}/players/{player_id}/edit         | players.edit                 | TPlayerController@edit                           | 選手編集画面               |
| POST         | /teams/{team_id}/players/{player_id}/restore      | players.restore              | TPlayerController@restore                        | 削除済み選手の復元         |

---

### 補足

- `GET|HEAD` は GET メソッドに HEAD メソッドも含むことを意味します。
- `teams` と `players` はネストしたリソースルーティングの形をとっています。
- そのほか認証やパスワード関連のルートも多く定義されていますが、割愛しています。




📝 その他
Inertia により Vue コンポーネントに props を渡し、サーバーサイドとフロントエンドをシームレスに連携。

<Link> コンポーネントを使用してページ遷移。<a> タグは通常のリンクに利用。

Ziggy を導入して route('route.name') を JavaScript 側で使用。
