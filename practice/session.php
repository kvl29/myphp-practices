<?php 
session_start(); # 啟用 session 功能
if(empty($_SESSION['my_num'])){
  $_SESSION['my_num'] = 1;
} else {
  $_SESSION['my_num'] ++;
}
echo $_SESSION['my_num'];