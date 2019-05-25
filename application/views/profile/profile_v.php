<?php 
// echo $user->paste_id;
// echo "<br>";
echo $user->user_id;
echo "<br>";
foreach ($paste->result() as $row)
{
        echo $row->title;
        echo "<br>";
}
?>