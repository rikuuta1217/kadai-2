# Mogitate
## 環境設定
### 1.Docker build

```
< $ docker-compose up -d --build >
```
### 2.laravel 設定

・コンテナにログイン → パッケージをインストール

```
< $ docker-compose exec php bash >
< $ composer install >
```
### 3.envファイルのコピー & 設定 

・コンテナにログイン → .envファイルコピー 

```
< $ cp .env.example .env>
```

・.envファイルの設定
