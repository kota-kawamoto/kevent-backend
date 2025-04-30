```mermaid
sequenceDiagram
    participant Browser
    participant Next.js (Frontend)
    participant Laravel (API)
    participant Sanctum
    participant Session

    Browser->>Next.js (Frontend): ユーザーがログインフォームに入力
    Next.js (Frontend)->>Laravel (API): GET /sanctum/csrf-cookie
    Laravel (API)->>Sanctum: CSRFクッキーを生成
    Sanctum-->>Next.js (Frontend): XSRF-TOKENクッキーを返す

    Next.js (Frontend)->>Laravel (API): POST /login（login_id/passwordとCSRFトークン）
    Laravel (API)->>Session: 資格情報を検証してセッションを作成
    Session-->>Laravel (API): セッション情報を保存
    Laravel (API)-->>Next.js (Frontend): ログイン成功レスポンス（ステータス200）

    Next.js (Frontend)->>Laravel (API): GET /api/user（ログインユーザー確認）
    Laravel (API)->>Session: セッションチェック
    Session-->>Laravel (API): ユーザー情報返却
    Laravel (API)-->>Next.js (Frontend): ログインユーザー情報を返す

%% sanctum（セッションベース）フロー概要
%% 1. **CSRF保護のための準備**（`/sanctum/csrf-cookie` にGET）
%% 2. **ログインリクエストを送信**（CSRFトークンと一緒に `/login` にPOST）
%% 3. **Laravelがセッションを生成**（ブラウザにセッションクッキーが設定される）
%% 4. **その後のAPI通信ではセッションクッキーで認証される**
%% 5. **例：`/api/user` にGETするとログインユーザー情報が取得できる**
