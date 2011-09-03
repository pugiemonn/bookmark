<?php echo $html->link("ブックマークに追加", "/bookmarks/add"); ?>
<table>
  <tr>
    <th>id</th>
    <th>url</th>
    <th>created</th>
  </tr>
<?php
foreach($data as $row)
{
?>
  <tr>
    <td><?php echo $row['Bookmark']['id']; ?></td> 
    <td><?php echo $row['Bookmark']['url']; ?></td> 
    <td><?php echo $row['Bookmark']['created']; ?></td> 
  </tr> 
<?php
}
?>
</table>

