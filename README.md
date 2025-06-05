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

### 🛠️ 拡張予定

- [ ] お気に入り機能
- [ ] 管理者専用ダッシュボード
- [ ] 選手検索・ソート機能

---

## 📁 ディレクトリ構成


 resources/
├── js/
│   ├── Pages/
│   │   └── Teams/
│   │       ├── Index.vue
│   │       └── Show.vue
│   └── Layouts/
│       └── AuthenticatedLayout.vue
views/
└── teams/
    ├── index.blade.php (旧)
    └── show.blade.php (旧)



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
ルーティング例
！！！！エクセル貼る！！！！
ルーティング一覧


📝 その他
Inertia により Vue コンポーネントに props を渡し、サーバーサイドとフロントエンドをシームレスに連携。

<Link> コンポーネントを使用してページ遷移。<a> タグは通常のリンクに利用。

Ziggy を導入して route('route.name') を JavaScript 側で使用。
