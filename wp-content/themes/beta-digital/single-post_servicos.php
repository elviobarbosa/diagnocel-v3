
<?php
$newURL = site_URL('/servicos');

echo '<head>';
echo '<link rel="canonical" href="' . $newURL . '" />';
echo '</head>';
header('HTTP/1.1 301 Moved Permanently');
header('Location: ' . $newURL);
exit();