<?php
  session_set_cookie_params(3600, '/~lbaw1461/final');
  session_start();

  error_reporting(E_ERROR | E_WARNING);

  $BASE_DIR = '/opt/lbaw/lbaw1461/public_html/final/';
  $BASE_URL = '/~lbaw1461/final/';


  $conn = new PDO('pgsql:host=vdbm.fe.up.pt;dbname=lbaw1461', 'lbaw1461', 'fB702dy5');
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $conn->exec('SET SCHEMA \'qahub\'');

  include_once($BASE_DIR . 'lib/smarty/SmartyBC.class.php');

  $smarty = new SmartyBC;
  $smarty->template_dir = $BASE_DIR . 'templates/';
  $smarty->compile_dir = $BASE_DIR . 'templates_c/';
  $smarty->assign('BASE_URL', $BASE_URL);

  $smarty->assign('ERROR_MESSAGES', $_SESSION['error_messages']);
  $smarty->assign('FIELD_ERRORS', $_SESSION['field_errors']);
  $smarty->assign('SUCCESS_MESSAGES', $_SESSION['success_messages']);
  $smarty->assign('FORM_VALUES', $_SESSION['form_values']);
  $smarty->assign('USERNAME', $_SESSION['username']);

  unset($_SESSION['success_messages']);
  unset($_SESSION['error_messages']);
  unset($_SESSION['field_errors']);
  unset($_SESSION['form_values']);

include_once($BASE_DIR.'lib/helper_functions.php');

