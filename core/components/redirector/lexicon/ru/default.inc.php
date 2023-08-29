<?php
/**
 * Default Russian Lexicon Entries for Redirector
 *
 * @package redirector
 * @subpackage lexicon
 */
$_lang['redirector'] = 'Redirector';
$_lang['redirector.active'] = 'Включён';
$_lang['redirector.desc'] = 'Управление редиректами на вашем сайте. Красным цветом отмечены редиректы с некорректным шаблоном (в качестве шаблона указан еще существующий URL) или несуществующим целевым URL. Такие редиректы не будут работать.';
$_lang['redirector.nothing_found'] = 'Редиректов пока нет!';
$_lang['redirector.redirect_err_ae_pattern'] = 'Редирект с таким шаблоном уже есть.';
$_lang['redirector.redirect_err_ae_patctx'] = 'Редирект с таким шаблоном и контекстом "[[+context]]" уже есть.';
$_lang['redirector.redirect_err_ae_uri'] = 'URI уже существует (ресурс с ID [[+id]] в контексте "[[+context]]")... Редирект не будет работать...';
$_lang['redirector.redirect_err_ne_target'] = 'Целевой URI не существет... Редирект не будет работать...';
$_lang['redirector.redirect_err_save'] = 'Произошла ошибка при попытке сохранить редирект.';
$_lang['redirector.redirect_create'] = 'Создать новый редирект';
$_lang['redirector.redirect_remove'] = 'Удалить редирект';
$_lang['redirector.redirect_remove_confirm'] = 'Вы уверены, что хотите удалить этот редирект?';
$_lang['redirector.redirect_update'] = 'Обновить редирект';
$_lang['redirector.redirect_view'] = 'Посмотреть редирект';
$_lang['redirector.redirects'] = 'Редиректы';
$_lang['redirector.management'] = 'Управление редиректами';
$_lang['redirector.menu_desc'] = 'Управление редиректами.';
$_lang['redirector.pattern'] = 'Шаблон';
$_lang['redirector.search'] = 'Поиск...';
$_lang['redirector.target'] = 'Цель';
$_lang['redirector.context'] = 'Контекст';
$_lang['redirector.context_desc'] = 'Если контекст указан, редирект будет работать только когда загружен указанный контекст.';
$_lang['redirector.triggered'] = 'Triggered';
$_lang['redirector.triggered_first'] = 'First time triggered';
$_lang['redirector.triggered_last'] = 'Last time triggered';

$_lang['redirector.import'] = 'Импорт CSV';
$_lang['redirector.import_desc'] = 'Здесь вы можете импортировать новые правила в формате CSV. Вы можете загрузить CSV файл или вставить CSV данные в текстовую область.';
$_lang['redirector.import.csv_desc'] = 'Обратите внимание: CSV данные должны соответствовать формату "шаблон;цель;контекст", где "контекст" может отсутствовать или остаться пустым.<br/>Также URL-ссылки должны быть относительными, не включать в себя [[+site_url]] и т.п.';
$_lang['redirector.import.csv_file'] = 'Выбрать CSV файл';
$_lang['redirector.import.raw_csv'] = 'Вставить CSV данные';
$_lang['redirector.import.do'] = 'Начать импорт!';
$_lang['redirector.import.doing'] = 'Идет импорт CSV данных...';
$_lang['redirector.import.success'] = 'Найдено [[+total]] записей. Импортировано: [[+succeed]] успешно и [[+failed]] неудачно!';
$_lang['redirector.import.failed'] = 'Импорт CSV закончился неудачно... Попробуйте снова!';

$_lang['redirector.regex_explain'] = 'Вы можете использовать в шаблоне регулярные выражения с групповыми подвыражениями и ссылаться на группы в целевом URL.

Например: у вас есть старые ссылки вида "shop/category-{name}/" и вы хотите перенаправить их на новые в формате "webshop/{name}/".
Создайте такой редирект:

<b>Шаблон:</b> ^shop\/category-(.*)\/$
<b>Цель:</b> webshop/$1/

Вы можете использовать несколько групповых подстановок (.*) и ссылаться на них через $2, $3 и т.д. Обратите внимание: при использовании регулярных выражений необходимо экранировать слэш-символ /, а также использовать символ начала строки ^ и символ конца строки $ .';

// settings
$_lang['setting_redirector.track_uri_updates'] = 'Отслеживать обновления URI';
$_lang['setting_redirector.track_uri_updates_desc'] = 'Если включено, будут отслеживаться обновления URI ресурсов и автоматически создаваться соответствующие редиректы (со старого URI на новый).';