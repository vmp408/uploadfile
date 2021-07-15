<?php
$handle=fopen('filepart-0.txt','rw');
fwrite($handle,'Hello'."\n");
fwrite($handle,'world');
fclose($handle);
?>