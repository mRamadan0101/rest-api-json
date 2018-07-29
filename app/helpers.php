<?php
 function getdata()
{
$json = json_decode(file_get_contents('https://api.myjson.com/bins/pq0f6'),true);
return $json;
}
