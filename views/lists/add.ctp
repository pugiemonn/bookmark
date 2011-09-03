<?php
echo $html->link("ブックマーク一覧", "/bookmarks/");

echo $form->create();
//echo $form->select('user_id', array(''.$auth['id'].'' => $auth['id']), array('selected' => $auth['id']));
//echo $html->tagErrorMsg('Bookmark/url', 'URLが正しくありません。');
//echo $form->error('url', 'URLが正しくありません');
echo $form->input('url');
echo $form->submit();
echo $form->end();

?>
