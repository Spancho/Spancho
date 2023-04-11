<?php

  function getConnection() {
    mysql_connect("localhost", "root", "");
    mysql_select_db("cid_gweru");
  }
?>