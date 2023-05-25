<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>ユーザー登録フォーム</h1>
    <form class="" action="{{ route('master.register') }}"  method="POST">
      @csrf
      名前:<input type="text" name="master_name" size="30"><span>{{ $errors->first('master_name') }}</span><br />
      メールアドレス:<input type="text" name="email" size="30"><span>{{ $errors->first('email') }}</span><br />
      パスワード:<input type="password" name="password" size="30"><span>{{ $errors->first('password') }}</span><br />
      パスワード(確認):<input type="password" name="password_confirmation" size="30"><span>{{ $errors->first('password_confirmation') }}</span><br />
      <!-- <button type="submit" name="action" value="send">送信</button> -->
      <div class="text-center">
          <button name="action" type="submit" value="return" class="btn btn-dark">戻る</button>
          <button name="action" type="submit" value="submit" class="btn btn-primary">送信</button>
      </div>
    </form>
  </body>
</html>