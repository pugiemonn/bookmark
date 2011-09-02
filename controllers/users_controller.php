<?php
class UsersController extends AppController
{
  var $name = "User";
  var $scaffold;
  /*
    ログイン画面を表示
  */
  function login()
  {
    $this->set("login_error", false); //初期表示時はエラー無しとする    
    //これを入れないと/user/loginを見に行く
    $this->render("/users/login");
  }
  /*
    ログイン処理
  */
  function login_cmp()
  {
    //入力データを元にパラメータ検索を行う
    $cond = array(
      'conditions' => array(
        'User.mail'     => $this->params['form']['mail'],
        'User.password' => $this->params['form']['password'],
      )
    );
    $data = $this->User->find('all', $cond);//find('count') 
    //データが存在しない場合はログイン画面を表示する
    if(count($data) == 0) 
    {
      $this->set("login_error", true);
      $this->render("login");
      return;  
    }
    //セッションにログイン情報を格納する
    $this->Session->write("auth", $data[0]['User']);
    $this->flash("ログイン成功、{$data[0]['User']['name']}さん、ようこそ", "/bookmarks/");
  }

  function logout()
  {
    $this->Session->delete("auth");
    $this->flash("さようなら", "/users/login");
  }
}
?>
