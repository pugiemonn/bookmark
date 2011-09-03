<?php
class listsController extends AppController
{
  var $uses     = array("Bookmark"); 
  var $scaffold;
  var $needAuth = true;

  function index()
  {
    //セッションからログイン中のユーザーIDを取得
    $auth = $this->Session->read("auth"); 
    $cond = array(
      'conditions' => array(
        'user_id' => $auth['id']
      )
    );

    //データの取得
    $data = $this->Bookmark->find('all', $cond); 
    $this->set("data", $data);
  }


  function add()
  {
    //submitされていない場合は初期表示
    //if(!isset($this->params['form']['submit']))
    if(!isset($this->params['data']))
    {
      //pr($this->params);
      $this->set("url", "");
      //exit("aa");
      return;
    }

    //セッションからログイン中のユーザーIDを取得
    $auth = $this->Session->read("auth");

    //入力データの形式を整える
    $data = array(
      'Bookmark' => array(
        'user_id' => $auth['id'],
        'url'     => $this->params['data']['Bookmark']['url'],
        'count'   => 0
      )
    );    

    //入力検査に失敗した場合は再度、入力画面へ
    //if(!$this->Bookmark->validates($data)) //この書き方は1.1
    $this->Bookmark->set($data); //こっちは1.2以降
    if(!$this->Bookmark->validates())
    {
      //$this->set("url", $this->params['form']['url']);
      $this->set("url", $this->params['data']['Bookmark']['url']);
      return;
    }

    //pr($this->params['data']['Bookmark']['url']);
    //pr($data);
    //exit("bb");

    //登録処理
    $this->Bookmark->save($data, false);
    $this->flash("ブックマークを登録しました", "/bookmarks/");
    return;

    /*
    if(!empty($this->data))
    {
      if($this->Bookmark->save($this->data))
      {
        $this->flash('ブックマークが登録されました', "/bookmarks"); 
      }
    }
    */
  }

}
?>
