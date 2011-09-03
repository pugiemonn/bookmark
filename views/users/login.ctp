<form action="/users/login_cmp" method="POST">
メールアドレス
<input type="text" name="mail" />
<br />
パスワード
<input type="password" name="password" />
<br />
<?php
if($login_error == true)
{
  echo "メールアドレスまたはパスワードが違います";
}
?>
<input type="submit" value="ログイン" />
</form>
