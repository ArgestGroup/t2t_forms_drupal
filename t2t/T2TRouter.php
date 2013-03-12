<?php
	define('DRUPAL_ROOT', $_SERVER['DOCUMENT_ROOT']);
	$base_url = 'http://'.$_SERVER['HTTP_HOST'];
	include_once DRUPAL_ROOT . '/includes/bootstrap.inc';
	// Bootstrap merely for session purposes:
	drupal_bootstrap(DRUPAL_BOOTSTRAP_SESSION);
	
	// Инициализация компонента
	include_once $_SERVER['DOCUMENT_ROOT'].'/sites/all/modules/t2t_forms/t2t/T2TForms.php';

	// Обработка логаут из режима авторизации форм
	T2TForms::logout();
	// Обработка ajax запросов
	T2TForms::ajaxCatcher();
	// Обработка редиректа на инвойс из истории
	T2TForms::invoiceRouter();
	// Обработка заказа билета(ов)
	T2TForms::buyRouter();
	// Генерация капчи по запросу
	T2TForms::getCaptcha();

?>
