<?php
//h^olamyna$meiszeb% backwards
  $salt=md5('%bezsiem$anymalo^h');

  function hashword($string, $salt) {
    $string = crypt($string, '$1$'.$salt.'$');
    return $string;
  }
?>
