<?php
/**
 * Default German Lexicon Entries for Redirector
 *
 * @package redirector
 * @subpackage lexicon
 * @author smooth-graphics (Anselm Hannemann)
 * Redirector translated to German by Jan-Christoph Ihrens (enigmatic_user, enigma@lunamail.de)
 */
$_lang['redirector'] = 'Redirector';
$_lang['redirector.active'] = 'Aktiv';
$_lang['redirector.desc'] = 'Verwalten Sie Umleitungen für Ihre Webseite. Die roten Linien bedeuten, dass die Muster-URL noch existiert ODER dass die Ziel-URL für keine Ressource existiert und nicht weitergeleitet wird';
$_lang['redirector.nothing_found'] = 'Noch keine Umleitungen gefunden!';
$_lang['redirector.redirect_err_ae_pattern'] = 'Eine Umleitung mit diesem Muster existiert bereits.';
$_lang['redirector.redirect_err_ae_patctx'] = 'Eine Umleitung mit diesem Muster und dem Kontext "[[+context]]" existiert bereits.';
$_lang['redirector.redirect_err_ae_uri'] = 'Die URL existiert bereits für die Ressource mit der ID [[+id]] im Kontext "[[+context]]". Die Umleitung wird nicht funktionieren!';
$_lang['redirector.redirect_err_ne_target'] = 'Die Ziel-URL existiert nicht. Die Umleitung wird nicht funktionieren.';
$_lang['redirector.redirect_err_save'] = 'Es ist ein Fehler aufgetreten beim Versuch, die Umleitung zu speichern.';
$_lang['redirector.redirect_create'] = 'Neue Umleitung erstellen';
$_lang['redirector.redirect_remove'] = 'Umleitung entfernen';
$_lang['redirector.redirect_remove_confirm'] = 'Sind Sie sicher, dass Sie diese Umleitung entfernen möchten?';
$_lang['redirector.redirect_update'] = 'Umleitung bearbeiten';
$_lang['redirector.redirect_view'] = 'Umleitung anschauen';
$_lang['redirector.redirects'] = 'Umleitungen';
$_lang['redirector.management'] = 'Umleitungs-Verwaltung';
$_lang['redirector.menu_desc'] = 'Verwalten Sie Umleitungen für Ihre Webseite.';
$_lang['redirector.pattern'] = 'Muster';
$_lang['redirector.search'] = 'Suche...';
$_lang['redirector.target'] = 'Ziel';
$_lang['redirector.context'] = 'Kontext';
$_lang['redirector.context_desc'] = 'Wenn ein Kontext ausgewählt wurde, wirkt sich die Umleitung nur auf den geladenen Kontext aus.';
$_lang['redirector.triggered'] = 'Triggered';
$_lang['redirector.triggered_first'] = 'First time triggered';
$_lang['redirector.triggered_last'] = 'Last time triggered';

$_lang['redirector.import'] = 'CSV importieren';
$_lang['redirector.import_desc'] = 'Hier können Sie neue Regeln importieren, die im CSV-Format vorliegen. Sie können eine CSV-Datei hochladen oder Text im CSV-Format in das untenstehende Textfeld kopieren.';
$_lang['redirector.import.csv_desc'] = 'Hinweis: Die CSV-Daten müssen im Format "Muster;Ziel;Kontext" vorliegen, wobei "Kontext" ausgelassen werden oder leer sein kann.<br />Verwenden Sie außerdem relative URLs; [[+site_url]] oder Ähnliches darf nicht enthalten sein.';
$_lang['redirector.import.csv_file'] = 'CSV-Datei-Auswahl';
$_lang['redirector.import.raw_csv'] = 'Kopieren Sie Text im CSV-Format hier hinein';
$_lang['redirector.import.do'] = 'Import starten!';
$_lang['redirector.import.doing'] = 'Importiere CSV-Daten...';
$_lang['redirector.import.success'] = 'Insgesamt [[+total]] Einträge gefunden. Importiert: [[+succeed]] erfolgreich und [[+failed]] fehlgeschlagen!';
$_lang['redirector.import.failed'] = 'Der Import von CSV-Daten ist fehlgeschlagen. Versuchen Sie es bitte erneut!';

$_lang['redirector.regex_explain'] = 'Sie können reguläre Ausdrücke in den Mustern verwenden und Referenzen auf geklammerte Teilausdrücke in Ihrer Ziel-URL verwenden.

Wenn Sie z.B. viele alte URLs nach dem Muster "shop/category-{name}/" haben und alle diese URLs zu der neuen Struktur "webshop/{name}/" umleiten möchten: kein Problem!
Geben Sie diese Werte ein:

<b>Muster:</b> ^shop\/category-(.*)\/$
<b>Ziel:</b> webshop/$1/

Sie können auch weitere Teilausdrücke in Klammern (.*) setzen und $2, $3 etc. verwenden, um sie zu referenzieren. Und wie Sie sehen können, müssen Sie Slashes (/) "entwerten", indem Sie ihnen jeweils einen Backslash voranstellen, und das Zeichen ^ für den Beginn und das Zeichen $ für das Ende des Musters verwenden.';

// settings
$_lang['setting_redirector.track_uri_updates'] = 'URL-Änderungen verfolgen';
$_lang['setting_redirector.track_uri_updates_desc'] = 'Wenn diese Einstellung auf "Ja" steht, werden Änderungen von Ressourcen-URLs verfolgt. Bei einer Änderung wird automatisch eine Umleitung von der alten zur neuen URL angelegt.';