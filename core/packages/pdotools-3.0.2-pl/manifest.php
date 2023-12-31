<?php return array (
  'manifest-version' => '1.1',
  'manifest-attributes' => 
  array (
    'changelog' => 'Changelog for pdoTools.

3.0.2-pl (11.04.2023)
==============
- Support for file snippets in the pdoPage class.
- Security fix for the pdoPage snippet.

3.0.1-pl (01.08.2022)
==============
- Fixed incorrect next and prev canonical URLs (#318).
- Fixed bug in the Fenom parser (#331).
- Fixed bug when clearing cache (#347).
- Added aliases "pdoTools" and "pdoFetch" for the service container.

3.0.0-pl (25.07.2022)
==============
- Fixed bug in the App::makeUrl function (#322).
- Replaced the simple class name with FQN (#326).
- Fixed incorrect functioning of the pdoNeighbors snippet (#327).
- Changed $_SERVER[\'DOCUMENT_ROOT\'] to dirname function in the connector.php (#332).
- Fixed bug with inaccessible property Fetch::config (#334).
- Fixed bug with prepareTVs and processTVs parameters of the pdoTools snippets (#335).
- Fixed fatal error in connector.php (#336).
- Fixed a typo in the connector ($this on $modx) (338).
- Fixed fatal error caused by loop (#341).
- Fixed checking TV before adding to the query (#343).

3.0.0-beta (06.12.2021)
==============
- Requires MODX 3.
- Requires PHP 7.2+.
- Refactored to use PSR-4 autoload.
- pdoTools snippet logs are stored now in the corresponding placeholder (#316).
- Added system setting "pdotools_filter_path".
- Removed anchor links in skip/empty templates (#303).
- Removed "nestedChunkPrefix" parameter.
- Removed the system settings "pdoTools.class", "pdotools_class_path", "pdoFetch.class" and "pdofetch_class_path".
- Removed the "setOption" Fenom modifier.
- Removed the snippet parameters "tplPath" and "elementsPath".

2.13.2-pl (02.09.2021)
==============
- Fixed some snippets.

2.13.1-pl (01.09.2021)
==============
- Installed composer packages.

2.13.0-pl (01.09.2021)
==============
- Some security fixes.
- The "setOption" modifier is marked as deprecated.
- The snippet parameters "tplPath" and "elementsPath" are marked as deprecated.
- Added the ability for snippets to return an array of raw data (it is necessary when using the Fenom template engine).
- The settings "parser_class" and "parser_class_path" will be registered in the core namespace.
- Update the ajax connector.

2.12.10 pl
==============
- [#308] [pdoPage] Fixed the type of snippet property "field"

2.12.9 pl
==============
- [Fenom] Update to version 2.12.0

2.12.8 pl
==============
- [pdoPage] Fix reflected XSS in generated meta links

2.12.7 pl
==============
- Make pdoTools canonical url work with Babel #304

2.12.6 pl
==============
- [pdoPage] Reverted back #287

2.12.5 pl
==============
- [Fenom] Added caching dinamic properties to prevent speed degradation.

2.12.4 pl
==============
- [#290] Improved running snippet via @FILE binding.
- [#296] Fix adding quotes to numeric values.
- [#297] Make cross context weblink url possible.
- [#274] [Fenom] User, resource and context properties are now dinamic.
- [#287] [pdoPage] Remove prev & next meta tags
- [#294] [#298] Improved pdopage.js and updated minified js files

2.12.3 pl
==============
- Fixed E_NOTICE introduced in #285.

2.12.2 pl
==============
- Updated chunks for Bootstrap 4.

2.12.1 pl
==============
- [pdoMenu] Reverted back #283 and fixed docs for &tplCategoryFolder.
- [#284] [Fenom] Fixed properties of $_modx->context variable.
- [#275] [Fenom] Added "reset" and "end" modifiers.

2.12.0 pl
==============
- [Fenom] More security fixes from Sergey Shlokov.
- [#278] [pdoPage] Fixed caching.
- [pdoPage] Show internal log on &showLog=`1`.
- [#283] [pdoMenu] Fixed use of &tplCategoryFolder according to docs.
- [#281] [pdoTools] Fixed load of models from case sensitive paths.
- [#277] [pdoCrumbs] Ability to specify &customParents.
- [#265] [pdoFetch] Fixed return of "Array" on SQL errors.

2.11.3 pl
==============
- Added French lexicon entries.

2.11.2 pl
==============
- Fix detection of element names starting with a number.

2.11.1 pl
==============
- Faster processing of static files.

2.11.0 pl
==============
- [pdoFetch] Added "setTotal" option to enable calculating all rows ("SQL_CALC_FOUND_ROWS"), which will also result in the "totalVar" placeholder is being set.
- [pdoFetch] Option "setTotal" disabled by default.
- [pdoPage] Forces "setTotal" to provide pagination.

2.10.6 pl
==============
- Improved German lexicons.

2.10.5 pl
==============
- [pdoTools] Ability to return array from "prepareSnippet" for more performance.
- [FenomX] Fixed method "getStore".

2.10.4 pl
==============
- [Fenom] Do not output raw tags if there was a compile errors.
- [#266] [pdoMenu] Fixed the setting of "here" and "self" classes.
- [#261] [Fenom] Fixed unexpected behavior of the fenom tag "ignore".

2.10.3 pl
==============
- Improved compatibility with PHP 7.2
- [pdoFetch] Ability to use arrays in "&sortby".

2.10.2 pl
==============
- [Fenom] Improved processing of caching snippets inside uncached.

2.10.1 pl
==============
- [#256] [Fenom] Fixed bug with caching of scripts and styles.
- [pdoPage] "&setMeta" now works when "&cache=`1`".
- [Fenom] Improved regular expression to detect Fenom syntax.

2.10.0 pl
==============
- [#259] [pdoFetch] Fixed error when passed pure SQL into "having" parameter.
- [#258] [pdoPage] Canonical urls always must be "full".
- [#245] [pdoMenu] Ability to use conditional tpls instead of regular "tpl".
- [#121] [pdoMenu] Improved work of specified chunks with weblinks.

2.9.3 pl
==============
- [#255] [Fenom] New system setting "pdotools_fenom_save_on_errors" to save code on compilation errors in the cache directory for later debugging.

2.9.2 pl
==============
- [pdoParser] Proper traversal trough arrays fields of resources in fast tags.

2.9.1 pl
==============
- [Fenom] Updated to version 2.11.8.

2.9.0 pl
==============
- [pdoPage] Improved "&pageLinkScheme" logic.
- [#249] A little improvement for resource modifier.
- [#251] [pdoFetch] More compatibility with PHP 7.1.
- [#253] [pdoPage] Fixing a missing pagination in Ajax mode.
- [#254] [Fenom] Options of json modifiers must check version of PHP to proper work.

2.8.6 pl
==============
- [pdoArchive] Ability to specify fields with regular dates in the "&dateField" parameter.
- [Fenom] Added all options to json modifiers.

2.8.5 pl
==============
- [#248] [pdoPage] Fixed E_WARNING with array values in GET parameters.

2.8.4 pl
==============
- Ability to use file elements in core path outside base path.
- Fixed bug with the caching of elements.

2.8.3 pl
==============
- [Fenom] Fixed rare bug with the caching of scripts and styles that was registered via Fenom.
- [pdoPage] Fixed the "?page=1" in the url when ajaxMode is enabled.
- [pdoPage] Snippet will register "canonical" link if "&setMeta" is enabled.
- [pdoPage] Fix processing of request with rawurldecode on some servers.
- [pdoTools] Added passing of "scriptProperties" values into a "&prepareSnippet".

2.8.2 pl
==============
- [pdoMenu] Fixed the checking of permissions for containers.
- [pdoPage] Added the ability to run files as &element.
- [pdoTools] The method runSnippet will return boolean false if snippet was not found.
- [Fenom] Fixed the possible bugs of caching of scripts and styles.

2.8.1 pl
==============
- [#244] Fixed possible duplicate of a container in the jquery.pdopage.js.
- Added fallback class for the enable modParser.

2.8.0 pl
==============
- Ability to use an arrays in the parameters of the snippets.
- Replaced modX::toJSON and modX::fromJSON to native php functions.

2.7.5 pl
==============
- Fenom is now managed via composer.
- [Fenom] Modifier "resource" no longer checks fields of resources in their schema.
- [Fenom] Modifier "strrev" now can work with arrays.
- [Fenom] Improved modifier "ismember".

2.7.4 pl
==============
- [#242] Added jquery.pdopage.js plugin and minified versions.
- [#241] [Fenom] Improved the retrieving of TVs for a current resource.
- [pdoFetch] Restored the checking of possible SQL injections in the &sortby with xPDO 2.5.1.

2.7.3 pl
==============
- Improved compatibility with MODX 2.5.2.

2.7.2 pl
==============
- [pdoFetch] Some security improvements.

2.7.1 pl
==============
- Some security improvements in the connector.php.
- Fixed bug with registering scripts in styles via Fenom introduced in version 2.7.0.

2.7.0 pl
==============
- [Fenom] Updated to the version 2.11.4.
- [Fenom] Fixed resource cache for scripts and styles registered by Fenom.
- [Fenom] Added rand() and number_format() to an allowed PHP functions.
- [Fenom] New output filter "number" (or "number_format").

2.6.5 pl
==============
- Fixed undeclared variable (PHP 7.1)

2.6.4 pl
==============
- Added escaping of a MODX tags that being processed in the &prepareSnippet.
- [#239] Improved work of the &decodeJSON option.

2.6.3 pl
==============
- Fixed possible E_NOTICE on line 305 pdofetch.class.php.
- Fixed possible E_NOTICE when "snippet" and "chunk" Fenom modifiers was called.

2.6.2 pl
==============
- Fixed possible E_NOTICE on line 1317 pdotools.class.php.

2.6.1 pl
==============
- Improved compatibility with PHP 5.3.

2.6.0 pl
==============
- [Fenom] The ability to extend Fenom via system event "pdoToolsOnFenomInit".

2.5.6 pl
==============
- [pdoFetch] Ability to join TVs not only to the query main class.

2.5.5 pl
==============
- Fixed parse of INLINE chunks with "@" symbols.

2.5.4 pl
==============
- [#224] Added microMODX::cleanAlias().
- [#226] [Fenom] Added "declension" modifier.

2.5.3 pl
==============
- [#221] Fixed typo in month name.
- [Fenom] Fixed path to compile dir.

2.5.2 pl
==============
- [#220] Cache code of snippet with respect to property set.

2.5.1 pl
==============
- Fixed cache of snippets in pdoTools::runSnippet().

2.5.0 pl
==============
- Improved support of debugParser.
- [#209] Improved loading of the models.
- [Fenom] New modifiers: "snippet" and "chunk".
- [Fenom] New elements provider: "file".
- New method pdoTools::runSnippet().

2.4.0 pl
==============
- Added snippet pdoArchive.
- [pdoResources] Faster processing of additional snippet parameters to placeholders.
- [#123] [pdoMenu] Fixed bug with &displayStart and unpublished root nodes.
- [#207] [pdoMenu] Fixed &webLinkClass option.
- [#193] [pdoNeighbors] Added parameter &wrapIfEmpty.
- [#203] [Fenom] Added more PCRE modifiers.

2.3.5 pl
==============
- [pdoFetch] Added escaping of columns names in query.

2.3.4 pl
==============
- [#200] [pdoFetch] Fixed &sortbyTV with dot in name.

2.3.3 pl
==============
- Added system plugin for "autoload" of main classes with respect to their paths in system settings.

2.3.2 pl
==============
- [#196] [pdoPage] Added workaround to support ClientConfig tags in ajax mode.
- [Fenom] Added general MODX output filters as Fenom modifiers.
- [Fenom] Implemented autoload of modifiers from snippets.
- [Fenom] Removed system setting "pdotools_fenom_modifiers".

2.3.1 pl
==============
- [pdoSitemap] Lightning fast work chunks processing with &scheme=`uri`.
- [Fenom] Improved check of syntax before processing.

2.3.0 pl
==============
- Removed shortcuts from system core.
- PSR-2.
- [Fenom] Added default modifiers: "url" and "lexicon".
- [pdoCrumbs] Changed default chunks to ul -> li.
- [#190] [pdoSitemap] Changed date format to ISO 8601.

2.2.8 pl
==============
- [Fenom] Use modResource::getContent() method to get content of current resource in {$_modx->resource}.

2.2.7 pl
==============
- [pdoPage] Ability to get access to a javascript configs from 3rd party scripts.

2.2.6 pl
==============
- [#184] [Fenom] Updated to version 2.8.2.

2.2.5 pl
==============
- [#182] [pdoTitle] Added passing a parameters into nested pdoCrumbs.
- [pdoSitemap] Added processing of MODX tags if needed.
- Added method pdoTools::makeUrl().
- [#181] New url schema type - "uri".

2.2.4 pl
==============
- [Fenom] Fixed speed issues when MODX snippets are run as Fenom modifiers.
- [pdoUsers] Fixed overwrite modUser.id by modUserProfile.id.

2.2.3 pl
==============
- [pdoPage] Fixed processing of uncached conditions in chunks when ajax mode is enabled.

2.2.2 pl
==============
- [pdoPage] Added new parameter &pageLinkScheme.

2.2.1 pl
==============
- [#155] [pdoPage] Added new parameter &ajaxHistory.
- [pdoPage] Added connector for requests in ajax mode.

2.2.0 pl
==============
- [#175] [pdoFetch] Ability to specify sequence of table joins.
- [#174] [Fenom] Ability to add Fenom modifiers into pdoParser.

2.1.21 pl
==============
- [#175] [pdoFetch] Ability to specify sequence of table joins.
- [#176] [pdoUsers] Fixed &toPlaceholders with &returnIds.

2.1.20 pl
==============
- [pdoSitemap] Fixed default &cacheKey.

2.1.19 pl
==============
- [Fenom] Disabled $options in cacheManager::set() due to security reasons.

2.1.18 pl
==============
- [Fenom] Fixed ability to access to the modX object from {$_modx} variable.
- [Fenom] Improved method {$_modx->runProcessor()}.

2.1.17 pl
==============
- [Fenom] Added {$_modx->getResource($id, $options)}.
- [Fenom] Added {$_modx->getResources($where, $options)}.
- [Fenom] Improved support of debugParser.

2.1.16 pl
==============
- [Fenom] Added {$_modx->isMember($groups, $matchAll)}.
- [Fenom] Added {$_modx->getPlaceholders()}.

2.1.15 pl
==============
- [pdoPage] Added parameter &strictMode.

2.1.14 pl
==============
- [pdoSitemap] Added options for cache snippets results.
- [pdoSitemap] Cache enabled by default.

2.1.13 pl
==============
- [#163] Fixed ignoring of &idx in pdoResources and pdoUsers.

2.1.12 pl
==============
- [pdoPage] [#161] Fixed support of arrays in hash when &ajaxMode is enabled.

2.1.11 pl
==============
- [#150] [Fenom] Fixed processing of TVs values in a {$_modx->resource}.
- [#147] [pdoSitemap] Fixed possible duplicates in sitemap.
- [pdoPage] Support of arrays in hash when &ajaxMode is enabled.

2.1.10 pl
==============
- [#157] [Fenom] Fixed pre-processing of Fenom tags in extending templates and chunks.
- [#145] [pdoPage] Rolled back #81 due to issues with complicate forms.

2.1.9 pl
==============
- [#144] [pdoParser] Leave unprocessed FastField tags so other components could parse them.
- [pdoFetch] Updated syntax for "SET SQL_BIG_SELECTS = 1".

2.1.8 pl
==============
- [Fenom] Ability to use id of chunks and templates in {include} and {extends}.
- [Fenom] Added support of debugParser.
- [Fenom] Added {$_modx->getChildIds()} and {$_modx->getParentIds()}.

2.1.7 pl
==============
- Fixed work with integer values from system setting "link_tag_scheme".

2.1.6 pl
==============
- [Fenom] Updated to version 2.8.0.
- [Fenom] Improved check of syntax to process content of chunks.
- [pdoParser] Fixed E_WARNING on line 50 introduced in previous version.

2.1.5 pl
==============
- [Fenom] Fixed register of scripts and styles by cached snippets.

2.1.4 pl
==============
- [Fenom] Fixed TVs in {$_modx->resource}
- [Fenom] Added new method {$_modx->getInfo()}

2.1.3 pl
==============
- Improved work of system setting "pdotools_fenom_php".

2.1.2 pl
==============
- [Fenom] Replaced {$_modx->placeholders} to functions.

2.1.1 pl
==============
- pdoParser enabled by default.
- [Fenom] Fixed return content in {$_modx->getChunk}.
- [Fenom] Added cache for snippets called through {$_modx->runSnippet}.
- [pdoTools] Added processing of property sets for chunks.
- [pdoResources] Set additionalPlaceholders in &tplWrapper

2.1.0 pl
==============
- [Fenom] Updated Fenom to version 2.7.1.
- [Fenom] Added safe system variable {$_modx}.
- [Fenom] Added MODX template provider for chunks and templates.

2.0.5 pl
==============
- [#132] Fixed possible E_WARNING on empty chunks.
- [#122] Ability to use 3rd party pdoPage and pdoMenu classes.
- [#118] [pdoPage] Fixed parameter &offset.
- [pdoPage] Fixed default CSS classes in "empty" chunks.

2.0.4 pl
==============
- Fixed processing of "pdotools_fenom_cache" system setting.

2.0.3 pl
==============
- [#125] [pdoTitle] Fixed parameter &id.

2.0.2 pl
==============
- Improved processing of @FILE binding.

2.0.1 pl
==============
- Fixed possible E_WARNING on line 319 and 349 of pdoTools class.
- Disabled system option "pdotools_fenom_modx" by default due to security issues.

2.0.0 pl
==============
- New system settings to control the Fenom.
- Ability to enable caching of Fenom compiled chunks.
- Improved handling of parameter "cache_key".
- [pdoMenu] Improved work when &cache is enabled.

2.0.0 rc2
==============
- Compiled Fenom templates cached to RAM instead of HDD.
- Removed plugin pdoTools.

2.0.0 rc1
==============
- Added Fenom template engine.
- Fenom enabled by default.
- pdoParser uses Fenom to process pages.

1.11.2 pl
==============
- [#116] [pdoTitle] Disabled &register_js by default.

1.11.1 pl
==============
- [pdoSitemap] Fixed default url scheme after last update.

1.11.0 pl1
==============
- [pdoTitle] Added new snippet.
- [pdoPage] Added support of snippet pdoTitle when &ajaxMode is enabled.
- [pdoPage] Prevent overwriting of scripts and styles of nested &element by default parameters.
- [pdoPage] Added triggering javascript event "pdopage_load".

1.10.2 pl1
==============
- [#112] Parameter &scheme was set to system default in all snippets.
- [#111] [pdoPage] Added ability to set "prev" & "next" meta tags.
- [#107] [pdoNeighbors] Added ability to specify &parents for work.
- [#106] [pdoMenu] Fixed "hereClass" and "selfClass" enabled &useWeblinkUrl parameter.
- [#104] [pdoMenu] Snippet now using "pagetitle" for link titles if "titleOfLinks" is empty.

1.10.1 pl
==============
- [#108] [pdoFetch] Fixed E_ERROR when using &sortbyTV.
- [pdoFetch] Added new parameter &sortbyTVType.
- [pdoFetch] If &sortdirTV is not set it will be equal to &sortdir.

1.10.0 pl
==============
- [pdoMenu] Returned and fixed parameter &showDeleted.
- [pdoPage] Improved default javascript.
- [pdoPage] Fixed overwriting &frontend_js and &frontend_css parameters when &ajax is disabled.
- [pdoFetch] Ability to specify functions in select fields.
- [pdoTools] Ability to use compound quick placeholders.

1.10.0 beta4
==============
- [pdoPage] Ajax pagination out from the box.
- [pdoFetch] Improved log of getCollection.
- [pdoTools] Added tplOperator "contains".

1.9.7 pl
==============
- [#99] [pdoFetch] Fixed returning of primary key in "ids" mode.
- [#97] [pdoTools] Fixed default tplPath for @FILE chunks.
- [#85] [pdoFetch] Added function getChildIds().
- [pdoFetch] Disabled "total" placeholder for &return=`ids`.

1.9.6 pl2
==============
- [pdoFetch] Fixed exclusion of field "id" in custom classes.
- [pdoMenu] Improved parameter &countChildren.
- [#100] [pdoMenu] Removed parameter &showDeleted because it not working.

1.9.6 rc
==============
- Added execution of SQL_BIG_SELECTS = 1 before query.
- [pdoPage] Added parameter &ajax for supporting of ajax requests.

1.9.5 pl1
==============
- Rolled back #72 due to issues in pdoMenu.

1.9.5 pl
==============
- Added ability to return JSON or serialized string from pdoFetch::run().
- [#83] [pdoMenu] Added level placeholder to outer templates.
- [#82] [pdoFetch] Added support for complex &where parameter.
- [#81] [pdoPage] Improved handling of arrays in url.
- [#77] Fixed making of url for modWebLink to another context.
- [#72] [pdoTools] Fixed order for children of excluded parents in buildTree.
- [#60] [pdoMenu] Fixed parameter &tplCategoryFolder.
- [#57] [pdoMenu] Improved placeholder [[+children]].
- [#57] [pdoMenu] Added parameter &countChildren.

1.9.4 pl1
==============
- [#78] [pdoNeighbors] Added parameter &loop=`1` for looping links.
- [pdoSitemap] Fixed possible E_FATAL php-apc.

1.9.3 pl1
==============
- [pdoTools] Ability to specify value for empty quick placeholders.
- [pdoTools] Ability to use INLINE snippets and filters.
- [pdoFetch] Improved loading of 3rd party models.
- [pdoPage] Fixed E_WARNING when &limit=`0`.

1.9.2 pl2
==============
- [#56] [pdoParser] Fixed wrong links processing.
- [#53] Improved loading of classes.
- [pdoField] Rolled back to original logic of "top" and "topLevel" parameters due to issues.
- [pdoField] Added parameter "ultimate" to emulate logic of UltimateParent.

1.9.1 pl6
==============
- [pdoFetch] Adding alias of main class of query to "sortby" if no alias exists.
- [pdoFetch] Improved selecting of all fields of class with specified alias.
- [pdoField] Parameter "topLevel" works exactly as in UltimateParent.
- [pdoField] Parameter "top" without "topLevel" returns parent on "top" level.

1.9.1 pl
==============
- [#47] [pdoMenu] Fixed processing &tplOuter when output is empty.
- [#46] [pdoParser] Fixed processing of TVs with dots in name.
- [#44] [pdoMenu] Improved handling of Wayfinder parameters "includeDocs" and "excludeDocs".
- [#37] [pdoField] get the default, only if the field was empty.
- [#34] Fixed processing of "modSymLink" documents.
- [#32] Improved cache methods.
- [#26] Replaced FIND_IN_SET() to FIELD().
- [pdoFetch] Ability to work with objects, that has multiple primary keys.
- [pdoPage] New parameter &cacheAnonymous.
- [pdoMenu] New parameter &cacheAnonymous.
- Added aliases for sort query in order of specified &resources: "ids" or "resources".
- Removed unnecessary query in pdoFetch::getCollection().
- Improved pdoFetch::getCollection().
- Renamed pdoFetch::getObject() to getArray(). Now it uses getCollection for retrieve results.
- pdoTools::setCache() now returns cacheKey.
- pdoFetch::getObject() is now alias of pdoFetch::getArray().

1.9.0 pl2
==============
- [pdoMenu] Chunks of parents and categories are now depends on the descendants and ignores parameter isfolder.
- [pdoNeighbors] Speed improvements.
- [#27] Ability to specify custom pdoFetch and pdoTools classes through FQN system settings.
- [pdoParser] Handles TVs in resource tags.
- [pdoParser] Handles output filters.
- [pdoFetch] Improved method "addTVFilters", that used by "tvFilters" parameter in pdoResources.
- [pdoSitemap] Pass the whole row so we can use more columns.

1.9.0 rc
==============
- Improved method pdoTools::getChunk().
- Improved method pdoTools::parseChunk().
- Improved method pdoTools::fastProcess().
- Improved method pdoTools::makePlaceholders().
- Accelerated snippet pdoNeighbors.
- Fixed bug in pdoUsers when usersgroups was specified by names.
- getObject and getCollection() runs in separate instance.
- Added pdoParser with FastField tags.
- [pdoPage] Changed default value of parameter "totalVar" due to issues.
- [#24] Fixed prepareTVs and empty tvPrefix.
- [#23] [pdoResources] Ability to return ids to placeholder.
- Fixed warning when getObject returns false.
- Fixed placeholders prefix in recursive makePlaceholders.

1.8.9 pl4
==============
- Added german lexicon.
- [#20] Ability to specify not JSON string in &where=``.
- [pdoPage] Added parameter "pageCountVar" for specifying name of variable with number of pages.
- [pdoPage] Support Bootstrap3.
- [pdoField] Ability to specify class for fetching field.
- Improved joining of tables in pdoFetch.
- Added preparing and processing TVs in getObject and getCollection methods.
- Improved load of 3rd party models.

1.8.8 pl2
==============
- Rewrited cache of snippets "pdoMenu" and "pdoPage".
- New methods pdoTools::getCache() and pdoTools::setCache().
- [pdoMenu] Fixed parameter "tplParentRowActive".
- [#18] Fixed "idx" in pdoTools::defineChunk().

1.8.7 pl
==============
- Added boolean parameter "decodeJSON" to specify whether or not decode JSON in results rows.
- Removed default "sortby" and "sortdir" from class pdoFetch for better work of getCollection() method.

1.8.6 pl2
==============
- Fixed possibly E_NOTICE when site has no extension packages installed.
- [#17] [pdoMenu] Added placeholder [[+wf.menutitle]].
- [#16] [pdoMenu] Disabled status verification of specified parents.
- [#13] [pdoMenu] Improved work with root of multiple contexts.
- [pdoMenu] Fixed bug when specified parent has only the one child.
- [pdoResources] Added parameter "&useWeblink" and placeholder "[[+link]]". It is disabled by default.

1.8.5 pl
==============
- [#15] [pdoPage] Improved generation of links to pages.
- [pdoMenu] Improved processing of classes "modSymlink" and "modWeblink".
- [pdoBreadcrumbs] Improved processing of classes "modSymlink" and "modWeblink". Added parameter "&useWeblink".
- [pdoNeighbors] Added parameter "&useWeblink" and placeholder "[[+link]]".
- [pdoSitemap] Added parameter "&useWeblink" and proper processing of classes "modSymlink" and "modWeblink".

1.8.4 pl
==============
- [pdoCrumbs] Added ability to specify the crumbs root (defaulting to site_start)
- [pdoCrumbs] Added ability to specify class_key (ie. to generate crumbs only for derivative classes)
- More accuracy when try to decode json in fetch results.

1.8.3 pl3
==============
- Improved preparation of template variables.
- Improved transfer of additional parameters from snippet to results.
- [pdoMenu] Added lexicon entries for parameters.
- [pdoMenu] Allow to specify "limit" and "offset".
- [#12] Added parameter "toPlaceholder".
- Increased accuracy of timings log.

1.8.1 pl2
==============
- Accelerated method pdoTools::getChunk().
- Added snippet pdoMenu.
- Added support for tags [^qt^] and [^q^].

1.8.0 pl
==============
- [#10] [pdoPage] Added placeholder "page".
- [#9] [pdoPage] Added placeholder "pageCount".
- [#8] Improved support of big numbers when sorting by TVs.
- Fixed work of pdoPage when it called multiple times on page.
- Fixed mistype in pdoFetch::getCollection().

1.8.0 rc5
==============
- Added processing of JSON fields. For example, you can use [[+extended.keyname]] in chunks of pdoUsers.
- pdoTools was removed from system extension packages, but you can still use "$modx->getService(\'pdoFetch\');".
- Fixed getting chunk without any parameters.
- Added snippet pdoPage.

1.8.0 beta1
==============
- Improved handling of "default_text" parameter in TVs.
- Fixed and improved method pdoTools::buildTree().
- The logic of build the conditions of the query moved into new method pdoFetch::additionalConditions().
- Improved method pdoFetch::addSelects().
- Improved method pdoFetch::addSort().
- Improved some snippets in accordance to new abilities of pdoFetch: pdoResources, pdoNeighbors and pdoSitemap.

1.7.4 pl
==============
- [#7] [pdoSitemap] Fixed hidden parameters "&sortBy" and "&sortDir" that used for compatibility with GoogleSiteMap.

1.7.3 pl1
==============
- [pdoCrumbs] Fixed possible E_NOTICE on line 157.
- [pdoCrumbs] Fixed generation of link to site start in relative mode.
- [#6] pdoCrumbs and pdoNeighbors are now uses "menutitle" by default. If it is empty, will be used "pagetitle".

1.7.2 pl1
==============
- [pdoField] Added new parameters: "default=``" and "&field=``".
- [pdoField] Improved logic of "&top=``" and "&topLevel=``".
- Added 2 new methods: pdoFetch::getObject() and pdoFetch::getCollection().
- Ability to send arrays into common config parameters. JSON is still supported.
- Improved select of default values in TVs.

1.7.1 pl
==============
- [pdoCrumbs] Fixed work with "modSymLink" and "modWebLink" resources.

1.7.0 pl1
==============
- New snippet pdoCrumbs.
- New snippet pdoField.
- New snippet pdoSitemap.
- New snippet pdoNeighbors.
- Ability to specify snippet for preparation of fetched rows by parameter "&prepareSnippet=``".
- Added method pdoTools::checkPermissions() for checking user privileges to view the results.
- Added @TEMPLATE binding. You can use name or id of any template. If empty - will use template of each row.
- [pdoResources] Improved parameter "&context".
- [pdoResources] Script properties are now passed to chunks. You can send any placeholders to it.

1.6.0 pl1
==============
- Fixed compatibility issues in PHP < 5.3.

1.6.0 pl
==============
- Added parameter "&loadModels" for comma-separated list of 3rd party components that needed for query.
- Added parameters "&prepareTVs" and "&processTVs".
- Added parameters "&tvFilters", "&tvFiltersAndDelimiter" and "&tvFiltersAndDelimiter".
- Added support of parameters "&sortbyTV" and "&sortdirTV" for compatibility with getResources.
- Added ability to use @INLINE and @FILE bindings in all template parameters.
- Removed method pdoTools::getPlaceholders.

1.5.0 pl2
==============
- Fixed sort of decimals in TVs.

1.5.0 pl1
==============
- Added processing of simple [[~id]] placeholders in fastMode.
- Added support of default value for TVs.
- Improved sort by TVs of types "number" and "date".

1.5.0 rc
==============
- [pdoUsers] Added new snippet "pdoUsers".
- [pdoResources] Fixed "toSeparatePlaceholders".
- [pdoResources] Parameter "parents" now supports dash prefix for excluding resources from query by parent.
- [pdoResources] Fixed issue when snippet runs multiple times at one page.

1.4.1 pl1
==============
- Improved "context" processing.
- Fixed "idx" when multiple snippets called at one page.
- Fixed default sortby when joined tables exists.

1.4.1 beta3
==============
- Added parameters "tplCondition", "tplOperator" and "conditionalTpls".
- Added parameter "select" for specifying needed columns of selected tables. Can be a JSON string with array.
- Added parameter "toSeparatePlaceholders".
- Improved "pdoResources" snippet.

1.4.0 beta1
==============
- Ability to specify JSON string in "sortby", for example "&sortby=`{"pagetitle":"asc","createdon":"desc"}`"
- Added automatic replacement of tvs in "where" and "having" parameters.
- Added automatic replacement of tvs in "sortby" parameter.
- Removed example snippet
- Added snippet "pdoResources", that could replace "getResources".
- Added method pdoTools::defineChunk() for chunk of given idx.
- Added "memory usage" in log.

1.3.0
==============
- Improved placeholders processing when fastMode is enabled.
- Added support of "having" conditions.

1.2.1
==============
- Fixed not working "includeTVs" when "leftJoin" is empty.

1.2.0
==============
- Native render of quick placeholders, such as "<!--pdotools_introtext <blockquote>[[+introtext]]</blockquote>-->".
- Added joining of TVs in pdoFetch. Use parameter "includeTVs" with comma-separated list of template variables.
- Added method pdoFetch::setConfig() for proper setting options when you run multiple pdoTools snippets at the one page.
- Method pdoTools::makeArray is now recursive, for processing a multidimensional arrays of values.

1.1.0
==============
- Improved getChunk function.

1.0.1
==============
- Fixed setting total in "chunks" mode.
- Improved displaying "where" condition in log.

1.0.0
==============
- Initial release.
',
    'license' => ' The MIT License (MIT)

Copyright © 2021 MODX RSC (Russian Speaking Community)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the “Software”), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
',
    'readme' => '--------------------
pdoTools
--------------------
Author: Vasiliy Naumkin <bezumkin@yandex.ru>
--------------------

Small library for creating fast snippets for MODX Revolution that works through PDO.

Required by Tickets and miniShop2.

Main features
- Builds queries with xPDO.
- Retrieve results with PDO.
- Improved pdoTools::getChunk() function, that processing placeholders faster, than original modX::getChunk().

pdoTools snippets will work so faster, than more fields you will retrieve from database at one query.

--------------------
Feel free to suggest ideas/improvements/bugs on GitHub:
http://github.com/modx-pro/pdoTools/issues
',
    'requires' => 
    array (
      'php' => '>=7.2.0',
      'modx' => '>=3.0.0-beta',
    ),
  ),
  'manifest-vehicles' => 
  array (
    0 => 
    array (
      'vehicle_package' => '',
      'vehicle_class' => 'xPDO\\Transport\\xPDOObjectVehicle',
      'class' => 'MODX\\Revolution\\modNamespace',
      'guid' => '8a825ab40013c8c740cabb52edf99084',
      'native_key' => 'pdotools',
      'filename' => 'MODX/Revolution/modNamespace/2a9ca790c3748c31b20bfd764a5f1041.vehicle',
      'namespace' => 'pdotools',
    ),
    1 => 
    array (
      'vehicle_package' => '',
      'vehicle_class' => 'xPDO\\Transport\\xPDOObjectVehicle',
      'class' => 'MODX\\Revolution\\modCategory',
      'guid' => '20f1da0ec654bc503da98eebd10423ab',
      'native_key' => 1,
      'filename' => 'MODX/Revolution/modCategory/10955f401d24d9d1ded93760f1b434e8.vehicle',
      'namespace' => 'pdotools',
    ),
    2 => 
    array (
      'vehicle_package' => '',
      'vehicle_class' => 'xPDO\\Transport\\xPDOObjectVehicle',
      'class' => 'MODX\\Revolution\\modSystemSetting',
      'guid' => '3fd476f8a7b093ae7238f7b7354e764a',
      'native_key' => 'pdotools_fenom_default',
      'filename' => 'MODX/Revolution/modSystemSetting/d0e6bc6c9e9fcd304fda2b8e10bc49f5.vehicle',
      'namespace' => 'pdotools',
    ),
    3 => 
    array (
      'vehicle_package' => '',
      'vehicle_class' => 'xPDO\\Transport\\xPDOObjectVehicle',
      'class' => 'MODX\\Revolution\\modSystemSetting',
      'guid' => '55a6ff227f4056267a9f990e4f9e8b22',
      'native_key' => 'pdotools_fenom_parser',
      'filename' => 'MODX/Revolution/modSystemSetting/1f12c8b0fe1627b967e33821035c2c93.vehicle',
      'namespace' => 'pdotools',
    ),
    4 => 
    array (
      'vehicle_package' => '',
      'vehicle_class' => 'xPDO\\Transport\\xPDOObjectVehicle',
      'class' => 'MODX\\Revolution\\modSystemSetting',
      'guid' => 'f8d6d3cb1dc2e528da3c69c31c953053',
      'native_key' => 'pdotools_fenom_php',
      'filename' => 'MODX/Revolution/modSystemSetting/9708e28560c395ccf75d45d280c95317.vehicle',
      'namespace' => 'pdotools',
    ),
    5 => 
    array (
      'vehicle_package' => '',
      'vehicle_class' => 'xPDO\\Transport\\xPDOObjectVehicle',
      'class' => 'MODX\\Revolution\\modSystemSetting',
      'guid' => '0e20944695efab911426ba46c594a67e',
      'native_key' => 'pdotools_fenom_modx',
      'filename' => 'MODX/Revolution/modSystemSetting/8a81d46d89469aa0a7160b73a1c66356.vehicle',
      'namespace' => 'pdotools',
    ),
    6 => 
    array (
      'vehicle_package' => '',
      'vehicle_class' => 'xPDO\\Transport\\xPDOObjectVehicle',
      'class' => 'MODX\\Revolution\\modSystemSetting',
      'guid' => '2c84b00d58c193f35d091875c1ab3fef',
      'native_key' => 'pdotools_fenom_options',
      'filename' => 'MODX/Revolution/modSystemSetting/9353de4d88c51ba9ab4daf0675ca8cf0.vehicle',
      'namespace' => 'pdotools',
    ),
    7 => 
    array (
      'vehicle_package' => '',
      'vehicle_class' => 'xPDO\\Transport\\xPDOObjectVehicle',
      'class' => 'MODX\\Revolution\\modSystemSetting',
      'guid' => 'fb5649730db624acc9c7697a0be84694',
      'native_key' => 'pdotools_fenom_cache',
      'filename' => 'MODX/Revolution/modSystemSetting/28faeaab97915fb1e5911e150dff164a.vehicle',
      'namespace' => 'pdotools',
    ),
    8 => 
    array (
      'vehicle_package' => '',
      'vehicle_class' => 'xPDO\\Transport\\xPDOObjectVehicle',
      'class' => 'MODX\\Revolution\\modSystemSetting',
      'guid' => '07839537f236097050ef57aa03646f6b',
      'native_key' => 'pdotools_fenom_save_on_errors',
      'filename' => 'MODX/Revolution/modSystemSetting/62c7438c471918064922c39a5367d813.vehicle',
      'namespace' => 'pdotools',
    ),
    9 => 
    array (
      'vehicle_package' => '',
      'vehicle_class' => 'xPDO\\Transport\\xPDOObjectVehicle',
      'class' => 'MODX\\Revolution\\modSystemSetting',
      'guid' => '724df47e1206e34445cbb2fb5a76f1f2',
      'native_key' => 'pdotools_elements_path',
      'filename' => 'MODX/Revolution/modSystemSetting/b73feebb7b2405156ed54e9c020b51e7.vehicle',
      'namespace' => 'pdotools',
    ),
    10 => 
    array (
      'vehicle_package' => '',
      'vehicle_class' => 'xPDO\\Transport\\xPDOObjectVehicle',
      'class' => 'MODX\\Revolution\\modSystemSetting',
      'guid' => '48d939683b16457f8e573332dc0cdb95',
      'native_key' => 'pdotools_filter_path',
      'filename' => 'MODX/Revolution/modSystemSetting/5d20819882427b398362fea9bb0a90d8.vehicle',
      'namespace' => 'pdotools',
    ),
    11 => 
    array (
      'vehicle_package' => '',
      'vehicle_class' => 'xPDO\\Transport\\xPDOObjectVehicle',
      'class' => 'MODX\\Revolution\\modEvent',
      'guid' => '732fa5b442c1d3feb44be913b4e380ff',
      'native_key' => 'pdoToolsOnFenomInit',
      'filename' => 'MODX/Revolution/modEvent/39ce17d478afef8061838ff47a00df11.vehicle',
      'namespace' => 'pdotools',
    ),
  ),
);