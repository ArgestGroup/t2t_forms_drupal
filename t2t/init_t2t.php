<?php
	// Инициализация компоненты
	include_once $_SERVER['DOCUMENT_ROOT'].'/sites/all/modules/t2t_forms/t2t/T2TForms.php';
	// Задаем страницу результатов
	T2TForms::app()->setResultPage(variable_get('t2t_forms_result_page'));
	// Задаем путь к роутеру
     	T2TForms::app()->setRouter('/sites/all/modules/t2t_forms/t2t/T2TRouter.php');
	// Задаем язык интерфейса
	if(variable_get('t2t_forms_languages') == "")variable_set('t2t_forms_languages',T2TForms::LANG_UA);
	T2TForms::app()->setLang(variable_get('t2t_forms_languages'));
	// Задаем рабочий домен
	T2TForms::app()->setDomain(variable_get('t2t_forms_domain'));
	
	// Задаем секретный ключ
	T2TForms::app()->setSecretKey(variable_get('t2t_forms_secret'));
	// Обработка смены текущей платежной системы
	T2TForms::app()->paySystemSetter();
	// Задаем свои стили форм НЕ ОБЯЗАТЕЛЬНО!
	T2TForms::app()->setStyle(variable_get('t2t_forms_css'));
	// Задаем свои стили jQueryUI НЕ ОБЯЗАТЕЛЬНО!
	T2TForms::app()->setStyleJQueryUI(variable_get('t2t_forms_jquery_ui'));
	// Позволяет включить или отключить подгрузку библиотеки jQuery
	if(variable_get('t2t_forms_load_jquery'))
	  T2TForms::app()->isAddJQuery(true);
	else
	  T2TForms::app()->isAddJQuery(false);
	global $user;
	if ( $user->uid ) {
		// Устанавливаем email текущего пользователя 
		T2TForms::app()->setUEmail((($user->mail)?$user->mail:$user->name. '@gmail.com'));
		// Устанавливаем телефон текущего пользователя (если есть)
		//T2TForms::app()->setUPhone('телефон_пользователя');
		// Устанавливаем Имя текущего пользователя (если авторизован и профиль содержит имя)
		T2TForms::app()->setUName($user->name);
			// Устанавливаем Фамилию текущего пользователя (если авторизован профиль содержит фамилию).
		//T2TForms::app()->setUSurName('фамилия_пользователя');
	}
