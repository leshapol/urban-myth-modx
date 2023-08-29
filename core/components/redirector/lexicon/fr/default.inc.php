<?php
/**
 * Default French Lexicon Entries for Redirector
 *
 * @package redirector
 * @subpackage lexicon
 */
$_lang['redirector'] = 'Redirector';
$_lang['redirector.active'] = 'Actif';
$_lang['redirector.desc'] = 'Gérez les redirections de votre site internet. Red lines means that the pattern URL is still exists OR target URL doesn\'t exists for a resource and will not be redirected.';
$_lang['redirector.nothing_found'] = 'No redirects found yet!';
$_lang['redirector.redirect_err_ae_pattern'] = 'Une redirection utilisant ce "modèle" existe déjà.';
$_lang['redirector.redirect_err_ae_patctx'] = 'Une redirection utilisant ce "modèle" dans le contexte "[[+context]]" existe déjà.';
$_lang['redirector.redirect_err_ae_uri'] = 'URI déjà existante pour la ressource [[+id]] dans le contexte "[[+context]]"... La redirection ne fonctionnera pas!';
$_lang['redirector.redirect_err_ne_target'] = 'L\'URI ciblée n\'existe pas, la redirection ne fonctionnera pas...';
$_lang['redirector.redirect_err_save'] = 'Une erreur est survenue lors de la sauvegarde de la redirection.';
$_lang['redirector.redirect_create'] = 'Créer une nouvelle redirection';
$_lang['redirector.redirect_remove'] = 'Supprimer la redirection';
$_lang['redirector.redirect_remove_confirm'] = 'Êtes-vous sûr de vouloir supprimer cette redirection ?';
$_lang['redirector.redirect_update'] = 'Mettre à jour la redirection';
$_lang['redirector.redirect_view'] = 'Voir la redirection';
$_lang['redirector.redirects'] = 'Redirections';
$_lang['redirector.management'] = 'Gestion des redirections';
$_lang['redirector.menu_desc'] = 'Gérez vos redirections.';
$_lang['redirector.pattern'] = 'Modèle';
$_lang['redirector.search'] = 'Chercher…';
$_lang['redirector.target'] = 'Cible';
$_lang['redirector.context'] = 'Contexte';
$_lang['redirector.context_desc'] = 'Si le contexte est défini, la redirection ne sera effective que dans ce contexte.';
$_lang['redirector.triggered'] = 'Triggered';
$_lang['redirector.triggered_first'] = 'First time triggered';
$_lang['redirector.triggered_last'] = 'Last time triggered';

$_lang['redirector.import'] = 'Import CSV';
$_lang['redirector.import_desc'] = 'Importez ici de nouvelles règles au format CSV. Vous pouvez uploader un fichier CSV ou coller le contenu brut du CSV dans le textarea ci-dessous';
$_lang['redirector.import.csv_desc'] = 'Note : le format du CSV doit être "modèle;cible;contexte", où "contexte" est facultatif (ou vide).<br/>Aussi, utilisez des URLs relatives (n\'indiquez pas [[+site_url]]).';
$_lang['redirector.import.csv_file'] = 'Sélection de fichier CSV';
$_lang['redirector.import.raw_csv'] = 'Collez les données CSV brutes ici';
$_lang['redirector.import.do'] = 'Démarrer l\'import!';
$_lang['redirector.import.doing'] = 'En train d\'importer les données CSV...';
$_lang['redirector.import.success'] = '[[+total]] entrées trouvées. [[+succeed]] imports effectué(s) et [[+failed]] échoué(s)!';
$_lang['redirector.import.failed'] = 'Erreur lors de l\'import CSV... Veuillez réessayer!';

$_lang['redirector.regex_explain'] = 'Vous pouvez utiliser des expressions régulières (RegEx) dans le modèle, et récupérer vos "remplacements" dans l\'URL cible.

Par exemple : vous avez beaucoup d\'anciennes URLs du genre "shop/category-{name}/" et vous souhaitez rediriger toutes ces URLs vers "webshop/{name}/", aucun problème!
Entrez ces données :

<b>Modèle :</b> ^shop\/category-(.*)\/$
<b>Cible:</b> webshop/$1/

Vous pouvez également utiliser des jockers (.*) ainsi que $2, $3 etc. Et comme vous pouvez le constater, vous devez "échapper" les slashs et indiquer ^ pour la position de départ et $ pour la fin.';

// settings
$_lang['setting_redirector.track_uri_updates'] = 'Surveiller les changements d\'URI';
$_lang['setting_redirector.track_uri_updates_desc'] = 'Activez cette option pour surveiller les changements d\'URI et créer automatiquement les redirections appropriées (ancienne URI > nouvelle URI).';
