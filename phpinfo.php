<?php
echo 'The following PHP extensions are loaded on this server';
echo '<pre>';
print_r(get_loaded_extensions());
echo '</pre>';
?>