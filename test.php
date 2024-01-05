<?php
$status = "insert";
$subject = "";
$body = "";
If($status == "update")
{
    $subject = "Hello Update";
    $body = "update body";
}
else if($status == "insert")
{
    $subject = "Hello Insert";
    $body = "Insert body";
}

echo $subject;
echo $body;
?>