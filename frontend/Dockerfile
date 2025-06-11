# frontend/Dockerfile
FROM node:18

WORKDIR /frontend

# 依存関係だけ先にコピーしてインストール（キャッシュ活用のため）
COPY package*.json ./
RUN npm install

# 残りのファイルをコピー
COPY . .

# 開発サーバー起動（本番は build コマンドで静的ファイル生成）
CMD ["npm", "run", "dev"]
