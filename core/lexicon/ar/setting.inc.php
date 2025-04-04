<?php
/**
 * Setting English lexicon topic
 *
 * @language en
 * @package modx
 * @subpackage lexicon
 */
$_lang['area'] = 'منطقة';
$_lang['area_authentication'] = 'المصادقة والحماية';
$_lang['area_caching'] = 'التخزين المؤقت';
$_lang['area_core'] = 'الكود الأساسي';
$_lang['area_editor'] = 'محرر نص منسق';
$_lang['area_file'] = 'ملف نظام';
$_lang['area_filter'] = 'فلترة حسب المنطقة...';
$_lang['area_furls'] = 'URL صديق';
$_lang['area_gateway'] = 'بوابة';
$_lang['area_language'] = 'المعجم واللغة';
$_lang['area_mail'] = 'البريد';
$_lang['area_manager'] = 'المدير الخلفي';
$_lang['area_phpthumb'] = 'phpThumb';
$_lang['area_proxy'] = 'بروكسي';
$_lang['area_session'] = 'الجلسة والكعكة';
$_lang['area_static_elements'] = 'Static Elements';
$_lang['area_static_resources'] = 'Static Resources';
$_lang['area_lexicon_string'] = 'مدخل منطقة المعجم';
$_lang['area_lexicon_string_msg'] = 'أدخل مفتاح مدخل المعجم من أجل المنطقة هنا. اذا لم يكن هناك مدخل للمعجم، عندها سيكون فقط إظهار لمفتاح المنطقة.</ br>المناطق الأساسية: المصادقة، التخزين المؤقت، ملف، التجميع، بوابة، لغة، مدير، جلسة، موقع، نظام';
$_lang['area_site'] = 'موقع';
$_lang['area_system'] = 'النظام والمخدم';
$_lang['areas'] = 'مناطق';
$_lang['charset'] = 'مجموعة المحارف';
$_lang['country'] = 'البلد';
$_lang['description_desc'] = 'وصف مختصر للإعدادات. قد يكون مدخل معجم معتمد على المفتاح، ملحوقا بالتنسيق "setting_" + key + "_desc".';
$_lang['key_desc'] = 'مفتاح للإعدادات. سوف يكون متاح ضمن المحتوى لديك عن طريق حامل العناصر [[++key]].';
$_lang['name_desc'] = 'اسم للإعداد. يمكنه ان يكون مدخلاً للمعجم بالاعتماد على المفتاح، استناداً على الصيغة التالية setting_" + key".';
$_lang['namespace'] = 'فضاء الأسماء';
$_lang['namespace_desc'] = 'فضاء الأسماء التي يرتبط بها هذا الإعداد. موضوع المعجم الافتراضي سيتم تحميله من اجل فضاء الأسماء هذا عند الحصول على الإعدادات.';
$_lang['namespace_filter'] = 'فلترة حسب فضاء الأسماء...';
$_lang['setting_err'] = 'الرجاء التحقق من بياناتك للحقول التالية: ';
$_lang['setting_err_ae'] = 'الإعداد مع هذا المفتاح موجوة مسبقاً. الرجاء تحديد اسم مفتاح آخر.';
$_lang['setting_err_nf'] = 'الإعداد غير موجود.';
$_lang['setting_err_ns'] = 'الإعداد غير محدد';
$_lang['setting_err_not_editable'] = 'This setting can\'t be edited in the grid. Please use the gear/context menu to edit the value!';
$_lang['setting_err_remove'] = 'An error occurred while trying to delete the setting.';
$_lang['setting_err_save'] = 'حدث خطأ أثناء محاولة حفظ الإعداد.';
$_lang['setting_err_startint'] = 'الإعدادات لاتسطيع البداية مع عدد صحيح.';
$_lang['setting_err_invalid_document'] = 'لا توجد وثيقة مع المعرف %d. الرجاء تحديد وثيقة موجودة.';
$_lang['setting_remove_confirm'] = 'هل أنت متأكد من أنك تريد حذف هذا الإعداد؟ قد يؤدي هذا إلى عطب تثبيت مودكس الخاص بك.';
$_lang['settings_after_install'] = 'لانه تنصيب جديد، من المطلوب منك ان تتحكم بهذه الإعدادات، وتغيير كل ما ترغب بتغييره. بعد ان تتحكم بالإعدادات، اضغط \'حفظ\' من أجل ترقية قاعدة بيانات الإعدادات.</ br /><br>';
$_lang['settings_desc'] = 'Here you can set general preferences and configuration settings for the MODX manager interface, as well as how your MODX site runs. <b>Each setting will be available via the [[++key]] placeholder.</b><br />Double-click on the value column for the setting you\'d like to edit to dynamically edit via the grid, or right-click on a setting for more options. You can also click the "+" sign for a description of the setting.';
$_lang['settings_furls'] = 'URLs صديقة';
$_lang['settings_misc'] = 'ذو خصائص مختلفة';
$_lang['settings_site'] = 'موقع';
$_lang['settings_ui'] = 'ميزات واجهة &amp;';
$_lang['settings_users'] = 'المستخدم';
$_lang['system_settings'] = 'إعدادات النظام';
$_lang['usergroup'] = 'مجموعة المستخدم';

// user settings
$_lang['setting_access_category_enabled'] = 'التحقق من الوصول للتصنيف';
$_lang['setting_access_category_enabled_desc'] = 'استخدم هذا لتفعيل أو تعطيل فحوصات تصنيف ACL (لكل سياق). <strong>ملاحظة: إذا تم ضبط هذا الخيار إلى لا، عندها سيتم تجاهل كل صلاحيات الوصول للتصنيف!</strong>';

$_lang['setting_access_context_enabled'] = 'فحص سياق الوصول';
$_lang['setting_access_context_enabled_desc'] = 'استخدم هذا لتفعيل فحوصات سياق ACL أو تعطيله. <strong>ملاحظة: إذا تم ضبط هذا الخيار إلى لا، عندها سيتم تجاهل كل صلاحيات الوصول للسياق. لا تقم بتعطيل هذا على نطاق النظام أو من أجل سياق المدير أو أنك ستقوم بتعطيل الوصول إلى واجهة المدير.</strong>';

$_lang['setting_access_resource_group_enabled'] = 'فحص موارد مجموعة الوصول';
$_lang['setting_access_resource_group_enabled_desc'] = 'استخدم هذا لتفعيل أو تعطيل فحوصات ACL لمجموعة المصدر (لكل سياق). <strong>ملاحظة: إذا تم ضبط هذا الخيار إلى لا، عندها سيتم تجاهل كل صلاحيات الوصول لكل مجموعة المصدر!</strong>';

$_lang['setting_allow_mgr_access'] = 'مدير واجهة الوصول';
$_lang['setting_allow_mgr_access_desc'] = 'استخدم هذا الخيار لتفعيل أو تعطيل الوصول إلى واجهة المدير. <strong>ملاحظة: إذا تم ضبط هذا الخيار إلى لا، عندها سيتم إعادة توجيه المستخدم إلى صفحة بداية تسجيل الدخول للمدير أو إلى صفحة وب بداية الموقع!</strong>';

$_lang['setting_failed_login'] = 'محاولات تسجيل الدخول الفاشلة';
$_lang['setting_failed_login_desc'] = 'هنا يمكنك إدخال عدد المحاولات الفاشلة لتسجيل الدخول المسموح بها قبل ان يتم حجب المستخدم.';

$_lang['setting_login_allowed_days'] = 'الأيام المسموح بها';
$_lang['setting_login_allowed_days_desc'] = 'حدد الأيام التي يسمح بها لهذا المستخدم تسجيل الدخول.';

$_lang['setting_login_allowed_ip'] = 'عنوان IP المسموح';
$_lang['setting_login_allowed_ip_desc'] = 'أدخل عناوين IP التي يسمح لهذا المستخدم بتسجيل الدخول منها. <strong>لاحظ: فصل عدة عناوين IP يتم باستخدام الفاصلة (,)<\strong>';

$_lang['setting_login_homepage'] = 'صفحة تسجيل الدخول الرئيسية';
$_lang['setting_login_homepage_desc'] = 'أدخل المعرف ID للمستند الذي ترغب بإرساله للمستخدم بعد قيامه/قيامها بتسجيل الدخول. 
<strong>ملاحظة: تأكد من أن المعرف ID الذي قمت بإدخاله ينتمي إلى مستند موجود، وقد تم نشره ومن الممكن الوصول اليه عن طريق هذا المستخدم!</strong>';

// system settings
$_lang['setting_access_policies_version'] = 'إصدار هيكل سياسة الوصول';
$_lang['setting_access_policies_version_desc'] = 'نسخة نظام سياسة الوصول.
لم تتغير.';

$_lang['setting_allow_forward_across_contexts'] = 'السماح بالتقدم عبر السياقات';
$_lang['setting_allow_forward_across_contexts_desc'] = 'في حال التفعيل, الروابطة الرمزية واستدعاء modX::sendForward() يستطيع تحويل الطلبات الى مصادر في سياقات أخرى.';

$_lang['setting_allow_manager_login_forgot_password'] = 'السماح ب نسيان كلمة المرور في شاشة تسجيل دخول المدير';
$_lang['setting_allow_manager_login_forgot_password_desc'] = 'وضع هذا ك "لا" سيؤدي الى عدم اتاحة خيار نسيان كلمة المرور في شاشة تسجيل دخول المدير.';

$_lang['setting_allow_tags_in_post'] = 'اسمح للتاغات في المنشور';
$_lang['setting_allow_tags_in_post_desc'] = 'اذا كانت غير مفعلة, جميع  متغيرات المنشورات سيتم حذف تاغات HTMLمنها, وكذلك الكائنات العددية, وتاغات مودكس. مودكس ينصح بتركها غير مفعلة للسياقات بخلاف المدير, حيث انها مفعلة بشكل افتراضي.';

$_lang['setting_allow_tv_eval'] = 'Enable eval in TV bindings';
$_lang['setting_allow_tv_eval_desc'] = 'Select this option to enable or disable eval in TV bindings. If this option is set to no, the code/value will just be handled as regular text.';

$_lang['setting_anonymous_sessions'] = 'جلسة مجهولة';
$_lang['setting_anonymous_sessions_desc'] = 'في حالة تعطيل، سيكون المستخدمين المصادق عليهم فقط الوصول إلى جلسة PHP. وهذا يمكن أن تقلل من الحمولة للمستخدمين المجهولين والحمولة التي تفرضها على موقع MODX إذا أنها لا تحتاج الوصول إلى جلسة عمل فريدة من نوعها. إذا كان session_enabled غير مفعل، فإن هذا الإعداد لن يكون له تأثير على الجلسات ستكون متاحة ابدأ.';

$_lang['setting_archive_with'] = 'فرض PCLZip أرشيف';
$_lang['setting_archive_with_desc'] = 'في حال التفعيل, سيتم استخدام PCLZip بدلاً من ZipArchive كلاحقة zip. قم بتفعيل هذا اذا كان يواجهك أخطاء في فك الضغط او مشاكل في فك ضغط في مدير الحزمة.';

$_lang['setting_auto_menuindex'] = 'فهرس القائمة الافتراضي';
$_lang['setting_auto_menuindex_desc'] = 'اختر ’نعم’ لتشغيل زيادة فهرس القائمة الأوتوماتيكي بشكل افتراضي.';

$_lang['setting_auto_check_pkg_updates'] = 'التحقق الآلي من تحديثات الحزمة';
$_lang['setting_auto_check_pkg_updates_desc'] = 'إذا ’نعم’، سيقوم مودكس بشكل أوتوماتيكي بفحص وجود ترقيات للحزم في مدير الحزم. من الممكن أن يبطئ هذا تحميل الشبكة.';

$_lang['setting_auto_check_pkg_updates_cache_expire'] = 'زمن صلاحية الذاكرة المؤقتة من أجل التحقق الآلي من تحديثات الحزمة';
$_lang['setting_auto_check_pkg_updates_cache_expire_desc'] = 'عدد الدقائق التي ستقوم بها إدارة الحزمة بتخزين النتائج للتحقق من وجود تحديثات حزمة تخزين مؤقت.';

$_lang['setting_allow_multiple_emails'] = 'السماح بتكرار رسائل البريد الإلكتروني للمستخدمين';
$_lang['setting_allow_multiple_emails_desc'] = 'عند التفعيل، قد يتشارك المستخدمون نفس عنوان البريد الإلكتروني.';

$_lang['setting_automatic_alias'] = 'إنشاء أسماء مستعارة تلقائياً';
$_lang['setting_automatic_alias_desc'] = 'اختر ’نعم, لتجعل النظام يولد بشكل أوتوماتيكي اسم مستعار بالاعتماد على عنوان الصفحة للمصدر أثناء الخفظ.';

$_lang['setting_automatic_template_assignment'] = 'Automatic Template Assignment';
$_lang['setting_automatic_template_assignment_desc'] = 'Choose how templates are assigned to new Resources on creation. Options include: system (default template from system settings), parent (inherits the parent template), or sibling (inherits the most used sibling template)';

$_lang['setting_base_help_url'] = 'URL المساعدة الأساسي';
$_lang['setting_base_help_url_desc'] = 'الـ URL الأساسي الذي بواسطته سيتم بناء روابط المساعدة في أعلى ويمين الصفحة في المدير.';

$_lang['setting_blocked_minutes'] = 'دقائق محظورة';
$_lang['setting_blocked_minutes_desc'] = 'هنا يمكنك إدخال عدد الدقائق التي سيتم حجب المستخدم خلالها في حال وصولهم للحد الاقصى لعدد المرات المسموح بها بمحاولات تسجيل الدخول الفاشلة. الرجاء إدخال هذه القيمة كرقم فقط (لا فواصل، ولا فراغات الخ.)';

$_lang['setting_cache_alias_map'] = 'تمكين ذاكرة التخزين المؤقت لخريطة السياقات المستعارة';
$_lang['setting_cache_alias_map_desc'] = 'عند التفعيل، سيتم تخزين كل URIs المصدر بشكل مؤقت في السياق. لأداء أفضل فعل في المواقع الأصغر وعطل في المواقع الأكبر.';

$_lang['setting_use_context_resource_table'] = 'Use the context resource table';
$_lang['setting_use_context_resource_table_desc'] = 'When enabled, context refreshes use the context_resource table. This enables you to programmatically have one resource in multiple contexts. If you do not use those multiple resource contexts via the API, you can set this to false. On large sites you will get a potential performance boost in the manager then.';

$_lang['setting_cache_context_settings'] = 'تفعيل الذاكرة المؤقتة لإعداد السياق';
$_lang['setting_cache_context_settings_desc'] = 'عند التفعيل، إعدادات السياق سوف يتم حفظها بالذاكرة المؤقتة لتقليل عدد عمليات التحميل.';

$_lang['setting_cache_db'] = 'تمكين ذاكرة التخزين المؤقت لقاعدة البيانات';
$_lang['setting_cache_db_desc'] = 'عند التفعيل، سيتم تخزين الكائنات ومجموعة النتيجة الأولية بشكل مؤقت من أجل التقليل إلى حد كبير في تحميل قاعدة المعطيات.';

$_lang['setting_cache_db_expires'] = 'وقت انتهاء الصلاحية لذاكرة التخزين المؤقت للـ DB';
$_lang['setting_cache_db_expires_desc'] = 'هذه القيمة (مقدرة بالثواني) تعين مقدار الوقت الذي ستبقى فيه الملفات المخزنة بشكل مؤقت للتخزين المؤقت لمجموعة نتيجة قاعدة البيانات.';

$_lang['setting_cache_db_session'] = 'تمكين الذاكرة المخبئية لجلسة قاعدة المعطيات';
$_lang['setting_cache_db_session_desc'] = 'عند التمكين، وعند تمكين cache_db، جلسات قاعدة المعطيات سوف توضع في الذاكرة المؤقتة لمجموعة النتائج.';

$_lang['setting_cache_db_session_lifetime'] = 'التخزين المؤقت لوقت انتهاء صلاحية جلسة قاعدة المعطيات';
$_lang['setting_cache_db_session_lifetime_desc'] = 'هذه القيمة (بالثواني) تحدد مقدار الوقت للذاكرة المؤقتة للملفات لإبقاء مدخلات الجلسات ضمن مجموعة نتائج قاعدة المعطيات.';

$_lang['setting_cache_default'] = 'افتراضياً قابلة للتخزين المؤقت';
$_lang['setting_cache_default_desc'] = 'اختر \'نعم\' لجعل جميع الموارد الجديدة قابلة للتخزين المؤقت بشكل افتراضي.';
$_lang['setting_cache_default_err'] = 'الرجاء الإعلان فيما إذا كنت تريد أو لا أن يتم تخزين الملفات بالذاكرة المؤقتة افتراضياً.';

$_lang['setting_cache_expires'] = 'وقت انتهاء الصلاحية الافتراضي للذاكرة المؤقتة';
$_lang['setting_cache_expires_desc'] = 'هذه القيمة (بالثواني) تحدد مقدار الوقت للذاكرة المؤقتة للملفات من التخزين المؤقت الافتراضي.';

$_lang['setting_cache_resource_clear_partial'] = 'Clear Partial Resource Cache for provided contexts';
$_lang['setting_cache_resource_clear_partial_desc'] = 'When enabled, MODX refresh will only clear resource cache for the provided contexts.';

$_lang['setting_cache_format'] = 'تنسيق التخزين المؤقت للاستخدام';
$_lang['setting_cache_format_desc'] = '0 = PHP, 1 = JSON, 2 = serialize، واحد من التنسيقات';

$_lang['setting_cache_handler'] = 'الصف المعالج للذاكرة المؤقتة';
$_lang['setting_cache_handler_desc'] = 'اسم الصف لنوع المعالج لاستخدامه في التخزين المؤقت.';

$_lang['setting_cache_lang_js'] = 'معجم السلاسل النصية JS للتخزين المؤقت';
$_lang['setting_cache_lang_js_desc'] = 'اذا كان مضبوط على صحيح، سوف يستخدم ترويسات المخدم للتخزين المؤقت من أجل السلاسل النصية للمعجم المحملة ضمن JavaScript من أجل واجهة المدير.';

$_lang['setting_cache_lexicon_topics'] = 'مواضيع معجم التخزين المؤقت';
$_lang['setting_cache_lexicon_topics_desc'] = 'عند التفعيل، سيتم تحزين كل مواضيع المعاجم بشكل مؤقت وذلك للحد بشكل كبير من مرات التحميل وظائف التعميم. مودكس يوصي بشدة ترك هذا مضبوط إلى ’نعم’.';

$_lang['setting_cache_noncore_lexicon_topics'] = 'التخزين المؤقت لمواضيع المعجم الغير أساسية';
$_lang['setting_cache_noncore_lexicon_topics_desc'] = 'عند التعطيل، لن يتم تخزين مواضيع المعجم الغير أساسية بشكل مؤقت. هذا مفيد أن يتم تعطيله عندما تقوم بتطوير الإضافات الخاصة بك.';

$_lang['setting_cache_resource'] = 'تفعيل التخزين المؤقت الجزئي للمصدر';
$_lang['setting_cache_resource_desc'] = 'التخزين المؤقت الجزئي للمصدر مهيأ من المصدر عند تفعيل هذه الميزة. تعطيل هذه الميزة سيعطلها بشكل عام.';

$_lang['setting_cache_resource_expires'] = 'وقت انتهاء الصلاحية للتخزين المؤقت الجزئي للمصدر';
$_lang['setting_cache_resource_expires_desc'] = 'هذه القيمة (مقدرة بالثواني) تعين مقدار الوقت الذي ستبقى فيه الملفات المخزنة بشكل مؤقت للتخزين المؤقت الجزئي للمصدر.';

$_lang['setting_cache_scripts'] = 'تمكين التخزين المؤقت للسكريبت';
$_lang['setting_cache_scripts_desc'] = 'عند التفعيل، سيقوم مودكس بتخزين كل السكريبتات (كتل الكود والإضافات) بشكل مؤقت إلى الملف وذلك لتقليل مرات التحميل. مودكس يوصي بإبقاء هذه مضبوطة إلى ’نعم’.';

$_lang['setting_cache_system_settings'] = 'تفعيل التخزين المؤقت لإعدادات النظام';
$_lang['setting_cache_system_settings_desc'] = 'عند التفعيل، سيتم تخزين إعدادات النظام بشكل مؤقت لتقليل مرات التحميل. مودكس يقترح ترك هذه مفعلة.';

$_lang['setting_clear_cache_refresh_trees'] = 'تحديث الأشجار عند مسح ذاكرة التخزين المؤقت للموقع';
$_lang['setting_clear_cache_refresh_trees_desc'] = 'عند التفعيل، سيتم تحديث الأشجار بعد مسح ذاكرة التخزين المؤقتة للموقع.';

$_lang['setting_compress_css'] = 'استخدام CSS مضغوط';
$_lang['setting_compress_css_desc'] = 'عند اتاحة هذا الخيار، مودكس ستستخدم نسخة مضغوطة من تنسيق css الخاص بها في واجهة المدير. مما يقلل بشكل كبير من الحمل ووقت التنفيذ في واجهة المدير.
أوقف تفعيل هذا الخيار فقط إذا كنت تعدل العناصر الأساسية.';

$_lang['setting_compress_js'] = 'استخدم مكتبات جافا سكريبت المضغوطة';
$_lang['setting_compress_js_desc'] = 'عند اتاحة هذا الخيار، مودكس ستستخدم نسختها المضغوطةمن مكتبات جافا سكريبت بشكل اختياري في واجهة المدير. مما يقلل بشكل كبير من الحمل ووقت التنفيذ في واجهة المدير.
أوقف تفعيل هذا الخيار فقط إذا كنت تعدل العناصر الأساسية.';

$_lang['setting_compress_js_groups'] = 'استخدام التجميع عند ضغط جافا سكريبت';
$_lang['setting_compress_js_groups_desc'] = 'تجميع جافا سكريبت مدير نواة مودكس باستخدام using minify\'s groupsConfig. اضبط إلى نعم إذا كنت تستخدم suhosin أو عوامل حد أخرى.';

$_lang['setting_concat_js'] = 'استخدم مكتبات جافا سكريبت المتسلسلة';
$_lang['setting_concat_js_desc'] = 'عند اتاحة هذا الخيار، مودكس ستستخدم نسختها المتسلسلة من مكتبات جافا سكريبت العامة في واجهة المدير. مما يقلل بشكل كبير من الحمل ووقت التنفيذ في واجهة المدير.
أوقف تفعيل هذا الخيار فقط إذا كنت تعدل العناصر الأساسية.';

$_lang['setting_confirm_navigation'] = 'تأكيد التنقل مع التغييرات غير المحفوظة';
$_lang['setting_confirm_navigation_desc'] = 'عند تفعيل هذا الخيار ، سيتم مطالبة المستخدمون بتأكيد نيتهم إذا كان هناك تغييرات غير محفوظة.';

$_lang['setting_container_suffix'] = 'لاحقة الحاوي';
$_lang['setting_container_suffix_desc'] = 'اللاحقة التي يجب إضافتها للمصادر يتم ضبطها كحاويات عند استخدام FURLs.';

$_lang['setting_context_tree_sort'] = 'تمكين فرز السياقات في شجرة الموارد';
$_lang['setting_context_tree_sort_desc'] = 'اذا كان الخيار نعم، فالسياقات ستكون مرتبة أبجدياً وعددياً في شجرة المصادر اليسرى.';
$_lang['setting_context_tree_sortby'] = 'حقل فرز السياقات في شجرة المصادر';
$_lang['setting_context_tree_sortby_desc'] = 'الحقل لفرز السياقات بواسطته في شجرة المصادر، إذا كان الفرز مفعل.';
$_lang['setting_context_tree_sortdir'] = 'فرز اتجاه السياقات في شجرة المصادر';
$_lang['setting_context_tree_sortdir_desc'] = 'اتجاه فرز السياقات في شجرة المصادر إذا كان الفرز متاحاً.';

$_lang['setting_cultureKey'] = 'اللغة';
$_lang['setting_cultureKey_desc'] = 'حدد اللغة لجميع السياقات الغير إدارية، بما في ذلك الوب.';

$_lang['setting_date_timezone'] = 'المنطقة الزمنية الافتراضية';
$_lang['setting_date_timezone_desc'] = 'تتحكم باعدادات المنطقة الزمنية الافتراضية من أجل اجراءات التاريخ بلغة PHP، إذا كان غير فارغ. اذا كان فارغ واذا كان الخيار  date.timezone ini غير محدد في البيئة الخاصة بك إذا لم يتم تعيين فارغة والإعداد ini date.timezone بي في البيئة الخاصة بك، سيتم افتراض UTC.';

$_lang['setting_manager_datetime_empty_value'] = 'Datetime Empty Value';
$_lang['setting_manager_datetime_empty_value_desc'] = 'The text (if any) that will show in grids and forms when a datetime field’s value has not been set. (Default: “–” [a single en dash])';

$_lang['setting_manager_datetime_separator'] = 'Datetime Separator';
$_lang['setting_manager_datetime_separator_desc'] = 'When the date and time are shown as a combined element, these characters will be used to visually separate them. (Default: “, ” [comma and space])';

$_lang['setting_debug'] = 'التنقيح';
$_lang['setting_debug_desc'] = 'تتحكم بتشغيل/تعطيل تصحيح الأخطاء و/أو ضبط مستوى error_reporting في PHP. مثلا \'\' = use current error_reporting, \'0\' = false (error_reporting = 0), \'1\' = true (error_reporting = -1)، أو أي قيمة  error_reporting صالحة (كعدد صحيح).';

$_lang['setting_default_content_type'] = 'نوع المحتوى الافتراضي';
$_lang['setting_default_content_type_desc'] = 'حدد النوع الافتراضي للمحتوى الذي ترغب باستخدامه من أجل مصادر جديدة. مايزال بإمكانك تحديد نوع محتوى مختلف في محرر المصدر؛ هذا الخيار يمكنك من التحديد المسبق لواحدة من انماط المحتوى الخاصة بك.';

$_lang['setting_default_duplicate_publish_option'] = 'خيار نشر المصدر المكرر الافتراضي';
$_lang['setting_default_duplicate_publish_option_desc'] = 'الخيار المحدد الافتراضي عند تكرار المصدر. ممكن ان يكون "عدم نشر" إلى عدم نشر كل التكرارات، "نشر" إلى نشر كل التكرارات، أو "الحفاظ" إلى الحفاظ على حالة النشر اعتماداً على المصدر المكرر.';

$_lang['setting_default_media_source'] = 'مصدر الوسائط الافتراضي';
$_lang['setting_default_media_source_desc'] = 'مصدر الوسائط الافتراضي للتحميل.';

$_lang['setting_default_media_source_type'] = 'Default Media Source Type';
$_lang['setting_default_media_source_type_desc'] = 'The default selected Media Source Type when creating a new Media Source.';

$_lang['setting_photo_profile_source'] = 'User Profile Photo Source';
$_lang['setting_photo_profile_source_desc'] = 'Specifies the Media Source to use for storing and retrieving profile photos/avatars. If not specified, the default Media Source will be used.';

$_lang['setting_default_template'] = 'القالب الافتراضي';
$_lang['setting_default_template_desc'] = 'حدد القالب الافتراضي الذي تريد استخدامه للمصادر الجديدة. مازال بإمكانك تحديد قالب مختلف في محرر المصدر، هذا الإعداد فقط يحدد مسبقاً أحد القوالب الخاصة بك.';

$_lang['setting_default_per_page'] = 'الافتراضي في الصفحة الواحدة';
$_lang['setting_default_per_page_desc'] = 'الرقم الافتراضي من النتائج للعرض في الشبكة عن طريق المدير.';

$_lang['setting_emailsender'] = 'تسجيل البريد الإلكتروني عن طريق العنوان';
$_lang['setting_emailsender_desc'] = 'هنا تستطيع تحديد عنوان البريد المستخدم عندما يقوم المستخدمين بإرسال أسماء المستخدمين وكلمات المرور.';
$_lang['setting_emailsender_err'] = 'الرجاء توضيح عنوان البريد الالكتروني الخاص بالإدارة.';

$_lang['setting_enable_dragdrop'] = 'اتاحة السحب/الإفلات في أشجار المصدر/العنصر';
$_lang['setting_enable_dragdrop_desc'] = 'في حالة الإيقاف، سيتم منع السحب والإفلات في أشجار المصدر والعنصر.';

$_lang['setting_enable_template_picker_in_tree'] = 'Enable the Template Picker in Resource Trees';
$_lang['setting_enable_template_picker_in_tree_desc'] = 'Enable this to use the template picker modal window when creating a new resource in the tree.';

$_lang['setting_error_page'] = 'صفحة الخطأ';
$_lang['setting_error_page_desc'] = 'أدخل معرف المستند الذي تريد إرساله للمستخدمين إذا طلبوا مستند غير موجود بشكل فعلي (404 لم يتم العثور على الصفحة). <strong>ملاحظة: تأكد من أن هذا المعرف الذي قمت بإدخاله ينتمي إلى مستند موجود، وأنه قد تم نشره مسبقا!</strong>';
$_lang['setting_error_page_err'] = 'الرجاء تحديد المعرف ID للمستند الذي يمثل صفحة الخطأ.';

$_lang['setting_ext_debug'] = 'تنقيح ExtJS';
$_lang['setting_ext_debug_desc'] = 'تحميل أو عدم تحميل ext-all-debug.js للمساعدة في تصحيح أخطاء كود ExtJS.';

$_lang['setting_extension_packages'] = 'حزم التوسيع';
$_lang['setting_extension_packages_desc'] = 'مصفوفة JSON من الحزم لتحميلها في تثبيت مودكس. بالصيغة [{"packagename":{"path":"path/to/package"}},{"anotherpackagename":{"path":"path/to/otherpackage"}}]';

$_lang['setting_enable_gravatar'] = 'تمكين Gravatar';
$_lang['setting_enable_gravatar_desc'] = 'اذا تم التفعيل سيتم استعمال Gravatar كصورة الملف الشخصي (اذا لم يكن المستخدم يملك صورة شخصية مرفعة).';

$_lang['setting_failed_login_attempts'] = 'محاولات تسجيل الدخول الفاشلة';
$_lang['setting_failed_login_attempts_desc'] = 'عدد محاولات تسجيل الدخول الفاشلة المسموحة للمستخدم قبل أن يصبح \'محظور\'.';

$_lang['setting_feed_modx_news'] = 'URL مزود أخبار مودكس';
$_lang['setting_feed_modx_news_desc'] = 'ضبط URL من أجل مزود RSS من أجل لوحة أخبار مودكس في المدير.';

$_lang['setting_feed_modx_news_enabled'] = 'مزود أخبار مودكس مفعل';
$_lang['setting_feed_modx_news_enabled_desc'] = 'اذا "لا"، مودكس سوف يخفي مزود الأخبار من قسم الترحيب في المدير.';

$_lang['setting_feed_modx_security'] = 'URL مزود تنبيهات الأمان لمودكس';
$_lang['setting_feed_modx_security_desc'] = 'ضبط URL من أجل مزود RSS من أجل لوحة تنبيهات الأمان لمودكس في المدير.';

$_lang['setting_feed_modx_security_enabled'] = 'مزود أمان مودكس مفعل';
$_lang['setting_feed_modx_security_enabled_desc'] = 'اذا "لا"، مودكس سوف يخفي مزود الأمان من قسم الترحيب في المدير.';

$_lang['setting_form_customization_use_all_groups'] = 'استخدام جميع أعضاء مجموعة المستخدم من أجل تخصيص النموذج';
$_lang['setting_form_customization_use_all_groups_desc'] = 'إذا كانت مضبوطة إلى صحيح، سيستخدم FC *كل* الإعدادات لـ *كل* مجموعات المستخدم التي يوجد بها العضو عند تطبيق إعدادات تخصيص النموذج. وإلا سيقوم فقط باستخدام الإعداد الذي ينتمي إلى المجموعة الرئيسة للمستخدم. ملاحظة: من الممكن أن يسبب ضبط هذه إلى نعم أخطاء مع مجموعات FC متضاربة.';

$_lang['setting_forward_merge_excludes'] = 'sendForward استثناء الحقول عند الدمج';
$_lang['setting_forward_merge_excludes_desc'] = 'الرابط الرمزي يدمج قيم الحقل الغير فارغة مع القيم في المصدر الهدف؛ استخدام هذه القائمة المحددة بفواصل من الاستثناءات يمنع الرابط الرمزي من الكتابة فوق الحقول المحددة.';

$_lang['setting_friendly_alias_lowercase_only'] = 'أسماء مستعارة بأحرف صغيرة لـ FURL';
$_lang['setting_friendly_alias_lowercase_only_desc'] = 'تحدد فيما اذا يجب السماح بالأحرف الصغيرة ضمن الاسم المستعار للمصدر.';

$_lang['setting_friendly_alias_max_length'] = 'الطول الأعظمي للاسم المستعار FURL';
$_lang['setting_friendly_alias_max_length_desc'] = 'إذا كان أكبر من الصفر، الحد الأقصى لعدد الأحرف المسموح به في اسم مستعار لمصدر. يساوي الصفر غير محدود.';

$_lang['setting_friendly_alias_realtime'] = 'اسم مستعار لعنوان الانترنت المعدّل في الوقت الحقيقي';
$_lang['setting_friendly_alias_realtime_desc'] = 'يحدد ما إذا كان يجب إنشاء اسم مستعار لمورد أثناء الكتابة في "عنوان الصفحة" أو إذا كان يجب أن يحدث هذا عندما يتم حفظ المورد (يحتاج تفعيل automatic_alias لهذا أن يكون لها أثر).';

$_lang['setting_friendly_alias_restrict_chars'] = 'طريقة تقييد محارف الاسم المستعار لـ FURL';
$_lang['setting_friendly_alias_restrict_chars_desc'] = 'الطريقة المستخدمة لتقييد المحارف المستخدمة في الاسم المستعار للمصدر. "النمط" يسمح أن يتم التزويد بالنمط RegEx، "شرعي" يسمح أية محارف URL شرعية، "ألفا" يسمح فقط الأحرف الأبجدية، و"الأبجدية الرقمية" يسمح فقط الأحرف والأرقام.';

$_lang['setting_friendly_alias_restrict_chars_pattern'] = 'نمط قيود محارف الاسم المستعار لـ FURL';
$_lang['setting_friendly_alias_restrict_chars_pattern_desc'] = 'طريقة RegEx الصالحة لتقييد الأحرف المستخدمة في اسم مستعار لمصدر.';

$_lang['setting_friendly_alias_strip_element_tags'] = 'وسوم عنصر قطاع الاسم المستعار لـ FURL';
$_lang['setting_friendly_alias_strip_element_tags_desc'] = 'تحدد فيما إذا كانت وسوم العنصر يجب أن تقتطع من الاسم المستعار للمصدر.';

$_lang['setting_friendly_alias_translit'] = 'نقل حروف الاسم المستعار لـ FURL';
$_lang['setting_friendly_alias_translit_desc'] = 'طريقة نقل الحروف التي تستخدم على الاسم المستعار المحدد لمصدر. فارغ أو "لا شئ" هي القيمة الافتراضية التي تتجاوز نقل الحروف. القيم الأخرى المحتملة هي "iconv" (إذا كان متوفر) أو جدول نقل حروف مسمى مزود بواسطة صف خدمة نقل حروف مخصص.';

$_lang['setting_friendly_alias_translit_class'] = 'صف خدمة نقل حروف الاسم المستعار لـ FURL';
$_lang['setting_friendly_alias_translit_class_desc'] = 'صف خدمة اختياري لتزويد خدمات نقل حروف مسماة لتوليد/فلترة FURL الاسم المستعار.';

$_lang['setting_friendly_alias_translit_class_path'] = 'مسار صف خدمة نقل حروف الاسم المستعار لـ FURL';
$_lang['setting_friendly_alias_translit_class_path_desc'] = 'موقع حزمة النموذج حيث سيتم تحميل صف خدمة نقل حروف الاسم المستعار FURL منه.';

$_lang['setting_friendly_alias_trim_chars'] = 'اقتطاع محارف الاسم المستعار لـ FURL';
$_lang['setting_friendly_alias_trim_chars_desc'] = 'الأحرف للتقليم من نهاية الاسماء المستعارة المزودة للمصدر.';

$_lang['setting_friendly_alias_word_delimiter'] = 'محدد الكلمات المستعارة لـ FURL';
$_lang['setting_friendly_alias_word_delimiter_desc'] = 'محدد الكلمة المفضلة لقطع الاسم المستعار المألوف للـ URL.';

$_lang['setting_friendly_alias_word_delimiters'] = 'محددات كلمات الأسماء المستعارة لـ FURL';
$_lang['setting_friendly_alias_word_delimiters_desc'] = 'المحارف التي تمثل محددات الكلمة عند معالجة قطع الاسم المستعار المألوف للـ URL. سيتم تحويل هذه المحارف وتوحيدها إلى محدد كلمة الاسم المستعار المفضل لـ FURL.';

$_lang['setting_friendly_urls'] = 'استخدام URLs صديقة';
$_lang['setting_friendly_urls_desc'] = 'يسمح لك هذا باستخدام محرك بحث URLs مألوفة مع مودكس. الرجاء لاحظ، هذا يعمل فقط في تثبيتات مودكس التي تعمل على Apache. وستحتاج أن تكتب الملف htaccess. ليعمل هذا. للمزيد من المعلومات انظر إلى الملف htaccess. المضمن في التوزيعة.';
$_lang['setting_friendly_urls_err'] = 'الرجاء وضح فيما إذا كنت أو لم تكن تريد استخدام URLs المألوفة.';

$_lang['setting_friendly_urls_strict'] = 'استخدام URLs صديقة صارمة';
$_lang['setting_friendly_urls_strict_desc'] = 'عندما يتم تمكين URLs الصديقة، يفرض هذا الخيار طلبات غير متعارف عليها تطابق مصدر لإعادة توجيه 301 إلى URI متعارف عليه لهذا المصدر. تحذير: لا تقم بالتمكين إذا كنت تستخدم إعادة كتابة القواعد بشكل مخصص و التي لا تطابق على الأقل البداية المتعارف عليها لـ URI. على سبيل المثال، URI متعارف عليه ل foo/مع معيد كتابة مخصص ل foo/bar.html سوف يعمل، ولكن المحاولات لإعادة كتابة bar/foo.html  ك foo/ سوف يفرض إعادة توجيه إلى foo/ مع تمكين هذا الخيار.';

$_lang['setting_global_duplicate_uri_check'] = 'التحقق من وجود URIs مكررة خلال جميع السياقات';
$_lang['setting_global_duplicate_uri_check_desc'] = 'اختر ’نعم’ لجعل فحص URI المكرر يضم كل السياقات في البحث. وإلا، سيتم فحص السياق الذي تم حفظ المصدر فيه فقط.';

$_lang['setting_hidemenu_default'] = 'اخفاء من القوائم الافتراضية';
$_lang['setting_hidemenu_default_desc'] = 'اختر "نعم" لجعل جميع المصادر الجديد مخفية عن القوائم بشكل افتراضي.';

$_lang['setting_inline_help'] = 'إظهار نص المساعدة السطري للحقول';
$_lang['setting_inline_help_desc'] = 'إذا ’نعم’، عندها ستقوم الحقول بعرض نص المساعدة الخاص بها بشكل مباشر تحت الحقل. إذا ’لا’، كل الحقول ستملك مساعدة معتمدة على أداة التلميح.';

$_lang['setting_link_tag_scheme'] = 'مخطط توليد URL';
$_lang['setting_link_tag_scheme_desc'] = 'مخطط توليد URL للوسم [[~id]]. الخيارات المتوفرة <a href="http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#\modX::makeUrl()">هنا</a>.';

$_lang['setting_locale'] = 'محلي';
$_lang['setting_locale_desc'] = 'تعيين الإعدادات المحلية للنظام. اترك المساحة فارغة لاستخدام الافتراضي. راجع <a href="http://php.net/setlocale" target="_blank"> the PHP documentation</a> للحصول على مزيد من المعلومات.';

$_lang['setting_lock_ttl'] = 'قفل Time-to-Live';
$_lang['setting_lock_ttl_desc'] = 'عدد الثواني الذي سيبقى فيه القفل على المصدر إذا كان المستخدم غير نشط.';

$_lang['setting_log_level'] = 'مستوى التسجيل';
$_lang['setting_log_level_desc'] = 'مستوى التسجيل الافتراضي؛ كلما كان المستوى أخفض يتم تسجيل رسائل أقل. الخيارات المتوفرة: 0 (خطأ جسيم)، 1 (خطأ)، 2 (تحذير)، 3 (معلومات)، و 4 (تصحيح).';

$_lang['setting_log_target'] = 'هدف التسجيل';
$_lang['setting_log_target_desc'] = 'هدف التسجيل الافتراضي حيث يتم كتابة رسائل السجل. الخيارات المتاحة: \'FILE\'، \'HTML\'، أو \'ECHO\'. القيمة الافتراضية هي \'FILE\' إذا لم يتم تحديد شئ آخر.';

$_lang['setting_log_deprecated'] = 'Log Deprecated Functions';
$_lang['setting_log_deprecated_desc'] = 'Enable to receive notices in your error log when deprecated functions are used.';

$_lang['setting_mail_charset'] = 'محارف البريد';
$_lang['setting_mail_charset_desc'] = 'مجموعة المحارف الافتراضية لرسائل البريد الإلكتروني، مثلا، \'iso-8859-1\' أو \'utf-8\'';

$_lang['setting_mail_encoding'] = 'ترميز البريد الإلكتروني';
$_lang['setting_mail_encoding_desc'] = 'ضبط ترميز الرسالة. الخيارات لهذا هي "8بت"، "7بت"، "ثنائي"، "base64"، و "quoted-printable".';

$_lang['setting_mail_use_smtp'] = 'استخدام SMTP';
$_lang['setting_mail_use_smtp_desc'] = 'إذا كان صحيح، سيحاول مودكس استخدام SMTP في وظائف البريد الإلكتروني.';

$_lang['setting_mail_smtp_auth'] = 'مصادقة SMTP';
$_lang['setting_mail_smtp_auth_desc'] = 'ضبط مصادقة SMTP. يستخدم إعدادات mail_smtp_user و mail_smtp_pass.';

$_lang['setting_mail_smtp_helo'] = 'رسالة مرحبا SMTP';
$_lang['setting_mail_smtp_helo_desc'] = 'تضبط SMTP HELO  للرسالة (القيم الافتراضية إلى اسم المضيف).';

$_lang['setting_mail_smtp_hosts'] = 'مضيفين SMTP';
$_lang['setting_mail_smtp_hosts_desc'] = 'تضبط مضيفي SMTP. يجب أن يتم فصل كل المضيفين بواسطة فاصلة منقوطة. يمكنك أيضا تحديد منفذ مختلف لكل مضيف باستخدام هذا التنسيق: [hostname:port] (مثلا، "smtp1.example.com:25;smtp2.example.com"). سيتم تجربة المضيفين حسب الترتيب.';

$_lang['setting_mail_smtp_keepalive'] = 'استمرار نشاط SMTP';
$_lang['setting_mail_smtp_keepalive_desc'] = 'منع إغلاق اتصال SMTP بعد كل إرسال بريد إلكتروني. لا ينصح به.';

$_lang['setting_mail_smtp_pass'] = 'كلمة مرور SMTP';
$_lang['setting_mail_smtp_pass_desc'] = 'كلمة المرور للمصادقة مقابلها إلى SMTP.';

$_lang['setting_mail_smtp_port'] = 'منفذ SMTP';
$_lang['setting_mail_smtp_port_desc'] = 'ضبط منفذ المخدم SMTP الافتراضي.';

$_lang['setting_mail_smtp_secure'] = 'SMTP Secure';
$_lang['setting_mail_smtp_secure_desc'] = 'Sets SMTP secure encryption type. Options are "", "ssl" or "tls"';

$_lang['setting_mail_smtp_autotls'] = 'SMTP Auto TLS';
$_lang['setting_mail_smtp_autotls_desc'] = 'Whether to enable TLS encryption automatically if a server supports it, even if "SMTP Secure" is not set to "tls"';

$_lang['setting_mail_smtp_single_to'] = 'SMTP Single To';
$_lang['setting_mail_smtp_single_to_desc'] = 'يوفر قدرة الحصول على معالجة الحقل TO لرسائل البريد الإلكتروني المستقلة، بدلا من الإرسال إلى كل العناوين TO.';

$_lang['setting_mail_smtp_timeout'] = 'انتهاء وقت SMTP';
$_lang['setting_mail_smtp_timeout_desc'] = 'ضبط مهلة المخدم SMTP مقدرة بالثواني. هذه الوظيفة لن تعمل في المخدمات win32.';

$_lang['setting_mail_smtp_user'] = 'مستخدم SMTP';
$_lang['setting_mail_smtp_user_desc'] = 'المستخدم للمصادقة مقابله إلى SMTP.';

$_lang['setting_mail_dkim_selector'] = 'DKIM Selector';
$_lang['setting_mail_dkim_selector_desc'] = 'The DKIM domain selector where the public key stored.';

$_lang['setting_mail_dkim_identity'] = 'DKIM Identity';
$_lang['setting_mail_dkim_identity_desc'] = 'DKIM identity you\'re signing as - usually your From address';

$_lang['setting_mail_dkim_domain'] = 'DKIM Domain';
$_lang['setting_mail_dkim_domain_desc'] = 'DKIM signing domain name.';

$_lang['setting_mail_dkim_privatekeyfile'] = 'DKIM Private key file';
$_lang['setting_mail_dkim_privatekeyfile_desc'] = 'DKIM private key file path. You can use DKIM Private key string instead of this.';

$_lang['setting_mail_dkim_privatekeystring'] = 'DKIM Private key string';
$_lang['setting_mail_dkim_privatekeystring_desc'] = 'Takes precedence over DKIM Private key file.';

$_lang['setting_mail_dkim_passphrase'] = 'DKIM Passphrase';
$_lang['setting_mail_dkim_passphrase_desc'] = 'Used only if your key is encrypted.';

$_lang['setting_main_nav_parent'] = 'أصل القائمة الرئيسية';
$_lang['setting_main_nav_parent_desc'] = 'الحاوية مستخدمة لسحب كافة السجلات للقائمة الرئيسية.';

$_lang['setting_manager_direction'] = 'اتجاه النص للمدير';
$_lang['setting_manager_direction_desc'] = 'اختر الاتجاه الذي سيتم إعادة رسم النص به في المدير، اليسار إلى اليمين أو اليمين إلى اليسار.';

$_lang['setting_manager_date_format'] = 'تنسيق التاريخ في المدير';
$_lang['setting_manager_date_format_desc'] = 'سلسلة محارف التنسيق، في PHP التنسيق date()، من أجل التواريخ الممثلة في المدير.';

$_lang['setting_manager_favicon_url'] = 'Favicon URL للمدير';
$_lang['setting_manager_favicon_url_desc'] = 'إذا كانت مضبوطة، سيتم تحميل هذا الـ URL كـ Favicon من أجل مدير مودكس. يجب أن يكون URL ذو صلة بالمدير/ الدليل، أو URL مطلق.';

$_lang['setting_manager_login_url_alternate'] = 'URL تسجيل الدخول الديل للمدير';
$_lang['setting_manager_login_url_alternate_desc'] = 'الـ URL البديل لإرسال المستخدمين غير المصرح بهم إليه عندما يحتاجون إلى تسجيل الدخول إلى المدير. نموذج تسجيل الدخول هناك يجب أن يقوم بتسجيل دخول المستخدم إلى السياق "mgr" ليعمل.';

$_lang['setting_manager_tooltip_enable'] = 'Enable Manager Tooltips';
$_lang['setting_manager_tooltip_delay'] = 'Delay Time for Manager Tooltips';

$_lang['setting_login_background_image'] = 'Login Background Image';
$_lang['setting_login_background_image_desc'] = 'The background image to use in the manager login. This will automatically stretch to fill the screen.';

$_lang['setting_login_logo'] = 'Login Logo';
$_lang['setting_login_logo_desc'] = 'The logo to show in the top left of the manager login. When left empty, it will show the MODX logo.';

$_lang['setting_login_help_button'] = 'Show Help Button';
$_lang['setting_login_help_button_desc'] = 'When enabled you will find a help button on the login screen. It\'s possible to customize the information shown with the following lexicon entries in core/login: login_help_button_text, login_help_title, and login_help_text.';

$_lang['setting_manager_login_start'] = 'صفحة بداية تسجيل الدخول للمدير';
$_lang['setting_manager_login_start_desc'] = 'أدخل معرف المستند الذي تريد إرسال المستخدم إليه بعد أن يقوم/تقوم بتسجيل الدخول إلى المدير. <strong>ملاحظة: قم بالتأكد من أن المعرف الذي أدخلته ينتمي إلى مستند موجود، وأنه قد تم نشره مسبقا وأنه قابل للوصول لهذا المستخدم!</strong>';

$_lang['setting_manager_theme'] = 'موضوع المدير';
$_lang['setting_manager_theme_desc'] = 'اختر الموضوع  لمدير المحتوى.';

$_lang['setting_manager_logo'] = 'Manager Logo';
$_lang['setting_manager_logo_desc'] = 'The logo to show in the Content Manager header.';

$_lang['setting_manager_time_format'] = 'تنسيق وقت المدير';
$_lang['setting_manager_time_format_desc'] = 'سلسلة محارف التنسيق، في التنسيق date() في PHP، من أجل إعدادات الوقت الممثلة في المدير.';

$_lang['setting_manager_use_tabs'] = 'استخدام علامات التبويب في مخطط صفحة الادارة';
$_lang['setting_manager_use_tabs_desc'] = 'المدير إذا كانت القيمة true، سيتم استخدام علامات التبويب للتقديم في أجزاء المحتوى. خلاف ذلك، فإنه سيتم استخدام بوابات.';

$_lang['setting_manager_week_start'] = 'بداية الأسبوع';
$_lang['setting_manager_week_start_desc'] = 'عرف يوم بداية الأسبوع. استخدم 0 (أو دعه فارغا) ليوم الأحد، 1 ليوم الاثنين وهكذا...';

$_lang['setting_mgr_tree_icon_context'] = 'أيقونة شجرة السياق';
$_lang['setting_mgr_tree_icon_context_desc'] = 'تحديد صنف CSS المستخدم هنا لإظهار رمز السياق في الشجرة .تستطيع استخدام هذه الاعدادات على  كل سياق لتخصيص رمز كل سياق.';

$_lang['setting_mgr_source_icon'] = 'ايقونة "مصدر الوسائط"';
$_lang['setting_mgr_source_icon_desc'] = 'يشير صنف ل CSS ليكون مستخدماً لإظهار ايقونات "مصادر الوسائط" في شجرة الملفات.افتراضياً ل "أيقونة-مجلد-فتح-O"';

$_lang['setting_modRequest.class'] = 'طلب صف المعالج';
$_lang['setting_modRequest.class_desc'] = '';

$_lang['setting_modx_browser_tree_hide_files'] = 'شجرة مستعرض الوسائط  تخفي الملفات';
$_lang['setting_modx_browser_tree_hide_files_desc'] = 'If true the files inside folders are not displayed in the Media Browser source tree.';

$_lang['setting_modx_browser_tree_hide_tooltips'] = 'شجرة مستعرض الوسائط تخفي التلميحات';
$_lang['setting_modx_browser_tree_hide_tooltips_desc'] = 'اذا كانت القيمة TRUE, لا تعرض تلميحات معاينة الصورة عندما تحوم فوق ملف في شجرة مستعرض الوسائط.الافتراضي TRUE.';

$_lang['setting_modx_browser_default_sort'] = 'الفرز الافتراضي لمستعرض الوسائط';
$_lang['setting_modx_browser_default_sort_desc'] = 'أسلوب الفرز الافتراضي عندما تستخدم مستعرض الوسائط  في الإدارة . القيم الافتراضية المتاحة :الاسم,الحجم,التعديل الأخير.';

$_lang['setting_modx_browser_default_viewmode'] = 'وضع العرض الافتراضي لمستعرض الوسائط';
$_lang['setting_modx_browser_default_viewmode_desc'] = 'وضع العرض الافتراضي عند استخدام مستعرض الوسائط في الإدارة.القيم المتاحة:الشبكة,القائمة.';

$_lang['setting_modx_charset'] = 'ترميز المحرف';
$_lang['setting_modx_charset_desc'] = 'الرجاء اختيار أي مرمز محارف تريد استخدامه. الرجاء لاحظ أنه قد تم اختبار مودكس مع العديد من هذه الترميزات، ولكن ليس جميعهم. من أجل معظم اللغات، الإعداد الافتراضي UTF-8 هو المفضل.';

$_lang['setting_new_file_permissions'] = 'صلاحيات الملف الجديد';
$_lang['setting_new_file_permissions_desc'] = 'عند رفع ملف جديد في مدير الملفات، سيحاول مدير الملفات تغيير صلاحيات الملف إلى تلك المدخلة في هذا الإعداد. من الممكن ألا يعمل هذا في بعض التنصيبات، مثل IIS، ستحتاج في مثل هذه الحالة إلى تغيير الصلاحيات بشكل يدوي.';

$_lang['setting_new_folder_permissions'] = 'صلاحيات المجلد الجديد';
$_lang['setting_new_folder_permissions_desc'] = 'عند إنشاء مجلد جديد في مدير الملفات، سيحاول مدير الملفات تغيير صلاحيات المجلد إلى تلك المدخلة في هذا الإعداد. من الممكن ألا يعمل هذا في بعض التنصيبات، مثل IIS، ستحتاج في مثل هذه الحالة إلى تغيير الصلاحيات بشكل يدوي.';

$_lang['setting_package_installer_at_top'] = 'Pin Package-Installer at top';
$_lang['setting_package_installer_at_top_desc'] = 'If enabled, the Installer entry will be pinned to the top of the Extras menu. Otherwise it will be positioned according to its menuindex.';

$_lang['setting_parser_recurse_uncacheable'] = 'تأخير التحليل الغير قابل للحفظ في الذاكرة المؤقتة';
$_lang['setting_parser_recurse_uncacheable_desc'] = 'إذا كان معطلاً، فإن العناصرالغير قابلة للحفظ في الذاكرة المؤقتة تكون مخرجاتها محفوظة مؤقتاً داخل محتوى العنصر قابل للتخزين المؤقت. تعطيل هذا فقط إذا كنت تواجه مشاكل مع تحليل العقد المتداخلة التي توقفت عن العمل كما هو متوقع.';

$_lang['setting_password_generated_length'] = 'طول كلمة المرور المنشأة أوتوماتيكيا';
$_lang['setting_password_generated_length_desc'] = 'طول كلمة المرور المنشأة أوتوماتيكيا لمستخدم.';

$_lang['setting_password_min_length'] = 'الحد الأدنى لطول كلمة المرور';
$_lang['setting_password_min_length_desc'] = 'الحد الأدنى لطول كلمة المرور لمستخدم.';

$_lang['setting_preserve_menuindex'] = 'الحفاظ على فهرس القائمة عند تكرار الموارد';
$_lang['setting_preserve_menuindex_desc'] = 'عند تكرار الموارد، سيتم أيضا الاحتفاظ بترتيب فهرس القائمة.';

$_lang['setting_principal_targets'] = 'أهداف ACL للتحميل';
$_lang['setting_principal_targets_desc'] = 'تخصيص أهداف ACL للتحميل لمستخدمي مودكس.';

$_lang['setting_proxy_auth_type'] = 'نوع مصادقة البروكسي';
$_lang['setting_proxy_auth_type_desc'] = 'تدعم إما BASIC أو NTLM.';

$_lang['setting_proxy_host'] = 'مضيف البروكسي';
$_lang['setting_proxy_host_desc'] = 'إذا كان المخدم الخاص بك يستخدم بروكسي، اضبط اسم المضيف هنا لتفعيل ميزات مودكس التي من الممكن أن تحتاج استخدام البروكسي، مثل إدارة الحزمة.';

$_lang['setting_proxy_password'] = 'كلمة مرور البروكسي';
$_lang['setting_proxy_password_desc'] = 'كلمة المرور مطلوبة من أجل المصادقة لمخدم البروكسي الخاص بك.';

$_lang['setting_proxy_port'] = 'منفذ البروكسي';
$_lang['setting_proxy_port_desc'] = 'المنفذ لمخدم البروكسي الخاص بك.';

$_lang['setting_proxy_username'] = 'اسم مستخدم البروكسي';
$_lang['setting_proxy_username_desc'] = 'اسم المستخدم للمصادقة مقابله مع مخدم البروكسي الخاص بك.';

$_lang['setting_phpthumb_allow_src_above_docroot'] = 'السماح لـ src فوق جذر المستند لـ phpThumb';
$_lang['setting_phpthumb_allow_src_above_docroot_desc'] = 'تشير فيما إذا كان مسار src مسموح خارج جذر المستند. هذا مفيد من أجل عمليات النشر لسياق متعدد مع مضيفين افتراضيين متعددين.';

$_lang['setting_phpthumb_cache_maxage'] = 'عمر ذاكرة التخزين المؤقت الأعظمي لـ phpThumb';
$_lang['setting_phpthumb_cache_maxage_desc'] = 'حذف الصور المصغرة المصغرة المخزنة بشكل مؤقت التي لم يتم الوصول إليها لأكثر من X يوم.';

$_lang['setting_phpthumb_cache_maxsize'] = 'حجم ذاكرة التخزين المؤقت الأعظمي لـ phpThumb';
$_lang['setting_phpthumb_cache_maxsize_desc'] = 'حذف الصور المصغرة الأقل وصولا مؤخرا عند زيادة حجم ذاكرة التخزين المؤقت أكبر من X ميغابايت بالحجم.';

$_lang['setting_phpthumb_cache_maxfiles'] = 'عدد ملفات ذاكرة التخزين المؤقت الأعظمي لـ phpThumb';
$_lang['setting_phpthumb_cache_maxfiles_desc'] = 'حذف الصور المصغرة الأقل وصولا مؤخرا عندما تحوي ذاكرة التخزين المؤقت أكثر من X ملف.';

$_lang['setting_phpthumb_cache_source_enabled'] = 'ملفات مصدر ذاكرة التخزين المؤقت لـ phpThumb';
$_lang['setting_phpthumb_cache_source_enabled_desc'] = 'تخزين أو عدم تخزين ملفات المصدر بشكل مؤقت عندما يتم تحميلها. ينصح بتعطيلها.';

$_lang['setting_phpthumb_document_root'] = 'جذر مستند PHPThumb';
$_lang['setting_phpthumb_document_root_desc'] = 'اضبط هذا إذا كنت تواجه مشاكل مع متحول المخدم DOCUMENT_ROOT، أو تتلقى أخطاء مع OutputThumbnail أو !is_resource. اضبطه إلى مسار جذر المستند المطلق الذي تود استخدامه. إذا كان هذا فارغا، سيستخدم مودكس متحول المخدم DOCUMENT_ROOT.';

$_lang['setting_phpthumb_error_bgcolor'] = 'لون خلفية الخطأ لـ phpThumb';
$_lang['setting_phpthumb_error_bgcolor_desc'] = 'قيمة ست عشرية، بدون #، تدل على لون الخلفية لخرج خطأ phpThumb.';

$_lang['setting_phpthumb_error_fontsize'] = 'حجم خط الخطأ لـ phpThumb';
$_lang['setting_phpthumb_error_fontsize_desc'] = 'قيمة em تدل على حجم الخط المستخدم لإظهار النص في خرج الخطأ لـ phpThumb.';

$_lang['setting_phpthumb_error_textcolor'] = 'لون خط الخطأ لـ phpThumb';
$_lang['setting_phpthumb_error_textcolor_desc'] = 'قيمة ست عشرية، بدون #، تدل على لون الخط لإظهار النص في خرج الخطأ لـ phpThumb.';

$_lang['setting_phpthumb_far'] = 'إجبار نسبة العرض إلى الارتفاع لـ phpThumb';
$_lang['setting_phpthumb_far_desc'] = 'إعداد البعد الافتراضي لـ phpThumb عند استخدامه في مودكس. الافتراضي إلى c لإجبار نسبة العرض إلى الارتفاع باتجاه المركز.';

$_lang['setting_phpthumb_imagemagick_path'] = 'مسار ImageMagick لـ phpThumb';
$_lang['setting_phpthumb_imagemagick_path_desc'] = 'اختياري. اضبط مسار ImageMagick بديل هنا لتوليد صور مصغرة باستخدام phpThumb، إذا لم تكن في الإعدادات الافتراضية لـ PHP.';

$_lang['setting_phpthumb_nohotlink_enabled'] = 'Hotlinking معطلة لـ phpThumb';
$_lang['setting_phpthumb_nohotlink_enabled_desc'] = 'المخدمات المتحكمة مسموحة في المتحول src إلا إذا قمت بتعطيل hotlinking  في phpThumb.';

$_lang['setting_phpthumb_nohotlink_erase_image'] = 'مسح صورة Hotlinking لـ phpThumb';
$_lang['setting_phpthumb_nohotlink_erase_image_desc'] = 'تشير إذا كانت الصورة المولدة من المخدم المتحكم يجب أن تمسح عندما يكون غير مسموح.';

$_lang['setting_phpthumb_nohotlink_text_message'] = 'رسالة Hotlinking غير مسموح لـ phpThumb';
$_lang['setting_phpthumb_nohotlink_text_message_desc'] = 'الرسالة التي سيعاد رسمها بدلا من الصورة المصغرة عندما يتم رفض محاولة hotlinking.';

$_lang['setting_phpthumb_nohotlink_valid_domains'] = 'نطاقات Hotlinking الصالحة لـ phpThumb';
$_lang['setting_phpthumb_nohotlink_valid_domains_desc'] = 'قائمة محددة بفواصل من أسماء المضيفين الصالحة في src URLs.';

$_lang['setting_phpthumb_nooffsitelink_enabled'] = 'الربط خارج الموقع معطل لـ phpThumb';
$_lang['setting_phpthumb_nooffsitelink_enabled_desc'] = 'تعطل قدرة الآخرين على استخدام phpThumb لإعادة رسم الصور في مواقعهم الخاصة.';

$_lang['setting_phpthumb_nooffsitelink_erase_image'] = 'مسح صورة الربط خارج الموقع لـ phpThumb';
$_lang['setting_phpthumb_nooffsitelink_erase_image_desc'] = 'تدل إذا يجب مسح الصورة المرتبطة من المخدم المتحكم عندما يكون غير مسموح.';

$_lang['setting_phpthumb_nooffsitelink_require_refer'] = 'الربط خارج الموقع لـ phpThumb يتطلب مرجع';
$_lang['setting_phpthumb_nooffsitelink_require_refer_desc'] = 'إذا كان مفعل، سيتم رفض أي محاولات ربط خارج الموقع بدون ترويسة مرجع صالح.';

$_lang['setting_phpthumb_nooffsitelink_text_message'] = 'رسالة الربط خارج الموقع غير مسموح لـ phpThumb';
$_lang['setting_phpthumb_nooffsitelink_text_message_desc'] = 'الرسالة التي سيتم إعادة رسمها بدلا عن الصورة المصغرة عندما يتم رفض محاولة الربط خارج الموقع.';

$_lang['setting_phpthumb_nooffsitelink_valid_domains'] = 'النطاقات الصالحة للربط خارج الموقع لـ phpThumb';
$_lang['setting_phpthumb_nooffsitelink_valid_domains_desc'] = 'قائمة محددة بفواصل من أسماء المضيفين التي تعد مراجع صالحة للربط خارج الموقع.';

$_lang['setting_phpthumb_nooffsitelink_watermark_src'] = 'مصدر العلامة المائية للربط خارج الموقع لـ phpThumb';
$_lang['setting_phpthumb_nooffsitelink_watermark_src_desc'] = 'اختياري. مسار نظام ملف صالح لملف لاستخدامه كمصدر علامة مائية عندما يتم إعادة رسم الصور الخاصة بك خارج الموقع باستخدام phpThumb.';

$_lang['setting_phpthumb_zoomcrop'] = 'اقتطاع-تقريب لـ phpThumb';
$_lang['setting_phpthumb_zoomcrop_desc'] = 'إعداد zc الافتراضي لـ phpThumb عند استخدامه في مودكس. الافتراضي إلى 0 لمنع اقتطاع التقريب.';

$_lang['setting_publish_default'] = 'الافتراضي منشور';
$_lang['setting_publish_default_desc'] = 'اختر ’نعم’ لجعل كل المصادر الجديدة منشورة بشكل افتراضي.';
$_lang['setting_publish_default_err'] = 'الرجاء تحديد فيما إذا أو لم تكن تريد أن تكون المستندات منشورة بشكل افتراضي.';

$_lang['setting_quick_search_in_content'] = 'Allow search in content';
$_lang['setting_quick_search_in_content_desc'] = 'If \'Yes\', then the content of the element (resource, template, chunk, etc.) will also be available for quick search.';

$_lang['setting_quick_search_result_max'] = 'Number of items in search result';
$_lang['setting_quick_search_result_max_desc'] = 'Maximum number of elements for each type (resource, template, chunk, etc.) in the quick search result.';

$_lang['setting_request_controller'] = 'طلب اسم ملف المتحكم';
$_lang['setting_request_controller_desc'] = 'اسم الملف لمتحكم الطلب الأساسي الذي يتم تحميل مودكس منه. يمكن لمعظم المستخدمين ترك هذا كـ index.php.';

$_lang['setting_request_method_strict'] = 'طريقة الطلب المقيدة';
$_lang['setting_request_method_strict_desc'] = 'إذا كان مفعلا، سيتم تجاهل الطلبات عبر بارامتر معرف الطلب عندما يكون FURLs مفعلا، والطلبات عبر بارامتر الاسم المستعار للطلب سيتم تجاهلها بدون تفعيل FURLs.';

$_lang['setting_request_param_alias'] = 'طلب متحول الاسم المستعار';
$_lang['setting_request_param_alias_desc'] = 'اسم بارامتر GET لتعريف الأسماء المستعارة للمصدر عند إعادة التوجيه باستخدام FURLs.';

$_lang['setting_request_param_id'] = 'طلب متحول المعرف';
$_lang['setting_request_param_id_desc'] = 'اسم بارامتر GET لتعريف معرفات المصدر عند عدم استخدام FURLs.';

$_lang['setting_resource_tree_node_name'] = 'حقل عقده شجرة المصدر';
$_lang['setting_resource_tree_node_name_desc'] = 'حدد حقل المصدر الذي تود استخدامه عند إعادة رسم العقد في شجرة المصدر. الافتراضي إلى اسم الصفحة، مع ذلك يمكن استخدام أي حقل مصدر، مثل اسم القائمة، الاسم المستعار، العنوان الطويل، وغيرها.';

$_lang['setting_resource_tree_node_name_fallback'] = 'الحقل الاحتياطي لعقدة شجرة المصدر';
$_lang['setting_resource_tree_node_name_fallback_desc'] = 'حدد حقل المصدر ليستخدم كاحتياطي عند إعادة رسم العقد في شجرة المصدر. سيتم استخدام هذا إذا كان المصدر يمتلك قيمة فارغة لحقل عقدة شجرة المصدر المهيأ.';

$_lang['setting_resource_tree_node_tooltip'] = 'حقل أداة تلميح شجرة المصدر';
$_lang['setting_resource_tree_node_tooltip_desc'] = 'حدد حقل المصدر لاستخدامه عند إعادة رسم العقد في شجرة المصدر. يمكن استخدام أي حقل مصدر، مثل اسم القائمة، الاسم المستعار، العنوان الطويل، وغيرها. إذا كان فارغا، سيكون العنوان الطويل مع توصيف أسفله.';

$_lang['setting_richtext_default'] = 'الافتراضي النص المنسق';
$_lang['setting_richtext_default_desc'] = 'اختر ’نعم’ لجعل كل المصادر الجديدة تستخدم محرر النص المنسق بشكل افتراضي.';

$_lang['setting_search_default'] = 'الافتراضي قابل للبحث';
$_lang['setting_search_default_desc'] = 'اختر ’نعم’ لجعل كل المصادر الجديدة قابلة للبحث بشكل افتراضي.';
$_lang['setting_search_default_err'] = 'الرجاء حدد فيما إذا كنت تريد أو لا تريد أن تكون المستندات قابلة للبحث بشكل افتراضي.';

$_lang['setting_server_offset_time'] = 'وقت إزاحة المخدم';
$_lang['setting_server_offset_time_desc'] = 'اختر عدد ساعات فرق التوقيت بين مكان وجودك ومكان وجود المخدم.';

$_lang['setting_session_cookie_domain'] = 'نطاق كوكي الجلسة';
$_lang['setting_session_cookie_domain_desc'] = 'استخدم هذا الإعداد لتخصيص نطاق كوكي الجلسة. اتركه فارغا لاستخدام النطاق الحالي.';

$_lang['setting_session_cookie_samesite'] = 'Session Cookie Samesite';
$_lang['setting_session_cookie_samesite_desc'] = 'Choose Lax or Strict.';

$_lang['setting_session_cookie_lifetime'] = 'عمر حياة كوكي الجلسة';
$_lang['setting_session_cookie_lifetime_desc'] = 'استخدم هذا الإعداد لتخصيص عمر حياة كوكي الجلسة مقدرا بالثواني. يستخدم هذا لضبط عمر حياة كوكي الجلسة للزبون عندما يقوم باختيار الخيار ’تذكرني’ عند تسجيل الدخول.';

$_lang['setting_session_cookie_path'] = 'مسار كوكي الجلسة';
$_lang['setting_session_cookie_path_desc'] = 'استخدم هذا الإعداد لتخصيص مسار الكوكي من أجل تعريف كوكيز الجلسة الخاصة بالموقع. اتركه فارغا ليتم استخدام MODX_BASE_URL.';

$_lang['setting_session_cookie_secure'] = 'تأمين كوكي الجلسة';
$_lang['setting_session_cookie_secure_desc'] = 'تفعيل هذا الإعداد ليتم استخدام كوكيز الجلسة الآمنة. هذا يتطلب أن يكون موقعك قابلا للوصول عبر https، وإلا الموقع و/أو المدير الخاص بك سيصبح غير قابل للوصول.';

$_lang['setting_session_cookie_httponly'] = 'HttpOnly لكوكي الجلسة';
$_lang['setting_session_cookie_httponly_desc'] = 'استخدم هذا الإعداد لضبط علامة HttpOnly على كوكي الجلسة.';

$_lang['setting_session_gc_maxlifetime'] = 'وقت الحياة الأعظمي لجامع قمامة الجلسة';
$_lang['setting_session_gc_maxlifetime_desc'] = 'Allows customization of the session.gc_maxlifetime PHP ini setting when using \'MODX\\Revolution\\modSessionHandler\'.';

$_lang['setting_session_handler_class'] = 'اسم صف معالج الجلسة';
$_lang['setting_session_handler_class_desc'] = 'For database managed sessions, use \'MODX\\Revolution\\modSessionHandler\'.  Leave this blank to use standard PHP session management.';

$_lang['setting_session_name'] = 'اسم الجلسة';
$_lang['setting_session_name_desc'] = 'استخدم هذا الإعداد لتخصيص اسم الجلسة المستخدم من أجل الجلسات في مودكس. اتركه فارغا لاستخدام اسم الجلسة الافتراضي في PHP.';

$_lang['setting_settings_version'] = 'إصدار الإعدادات';
$_lang['setting_settings_version_desc'] = 'نسخة مودكس المثبتة حاليا.';

$_lang['setting_settings_distro'] = 'توزيع الإعدادات';
$_lang['setting_settings_distro_desc'] = 'توزيعة مودكس المثبتة حاليا.';

$_lang['setting_set_header'] = 'ضبط ترويسات HTTP';
$_lang['setting_set_header_desc'] = 'عند التفعيل، سيحاول مودكس ضبط ترويسات HTTP للمصادر.';

$_lang['setting_send_poweredby_header'] = 'إرسالل الترويسة X-Powered-By';
$_lang['setting_send_poweredby_header_desc'] = 'عند التفعيل، سوف يقوم MODX بإرسال رأس "X-Powered-By" لتحديد ان هذا الموقع بني بواسطة MODX. وهذا يساعد على تتبع استخدام MODX عالمياً من خلال طرف ثالث بتتبع يتفقد موقع الويب الخاص بك. لأن هذا يجعل من الأسهل لتحديد ما هو بناء موقع الويب الخاص بك مع، قد يشكل مخاطرة أمنية زيادة طفيفة إذا تم العثور على مشكلة عدم حصانة في MODX.';

$_lang['setting_show_tv_categories_header'] = 'عرض ترويسة التبويبات "التصنيفات" مع عناصر القالب';
$_lang['setting_show_tv_categories_header_desc'] = 'إذا كان "نعم"، سيعرض مودكس ترويسة "التصنيفات" فوق أول تبويب تصنيف عند تعديل عناصر القالب في مصدر.';

$_lang['setting_signupemail_message'] = 'البريد الإلكتروني للتسجيل';
$_lang['setting_signupemail_message_desc'] = 'هنا يمكنك ضبط الرسالة المرسلة إلى مستخدميك عندما تقوم بإنشاء حساب لهم والسماح لمودكس بأن يرسل لهم بريد إلكتروني يحوي اسم المستخدم وكلمة المرور الخاصة بهم. <br /><strong>ملاحظة:</strong> حوامل العناصر التالية تستبدل بواسطة مدير المحتوى عندما يتم إرسال الرسالة: <br /><br />[[+sname]] - اسم الموقع الخاص بك، <br />[[+saddr]] - عنوان البريد الإلكتروني لموقع الوب الخاص بك، <br />[[+surl]] - الـ URL الخاص بموقعك، <br />[[+uid]] - اسم أو معرف تسجيل الدخول للمستخدم، <br />[[+pwd]] - كلمة مرور المستخدم، <br />[[+ufn]]  - اسم المستخدم الكامل. <br /><br /><strong>اترك [[+uid]] و [[+pwd]] في البريد الإلكتروني، أو لن يتم إرسال اسم المستخدم وكلمة المرور بالبريد الإلكتروني ولن يعرف مستخدميك اسم المستخدم أو كلمة المرور الخاصة بهم!</strong>';
$_lang['setting_signupemail_message_default'] = 'مرحبا  [[+uid]] \n\n يوجد هنا تفاصيل تسجيل الدخول الخاصة بك لـ  [[+sname]] مدير المحتوى:\n\nاسم المستخدم: [[+uid]]\n كلمة المرور: [[+pwd]]\n\n عند تسجيل دخولك إلى مدير المحتوى ([[+surl]])، يمكنك تغيير كلمة المرور الخاصة بك.\n\nتحياتي،\nمسؤول الموقع';

$_lang['setting_site_name'] = 'اسم الموقع';
$_lang['setting_site_name_desc'] = 'أدخل إسم الموقع الخاص بك هنا.';
$_lang['setting_site_name_err']  = 'الرجاء إدخال اسم الموقع.';

$_lang['setting_site_start'] = 'بداية الموقع';
$_lang['setting_site_start_desc'] = 'أدخل معرف المصدر الذي تريد استخدامه كصفحة رئيسية هنا. <strong>ملاحظة: تأكد من أن هذا المعرف الذي أدخلته ينتمي إلى مصدر موجود، وأن منشور مسبقا!</strong>';
$_lang['setting_site_start_err'] = 'الرجاء تحديد معرف المصدر الذي يكون بداية الموقع.';

$_lang['setting_site_status'] = 'حالة الموقع';
$_lang['setting_site_status_desc'] = 'اختر ’نعم’ لنشر موقعك على الوب. إذا اخترت ’لا’، سيرى زوارك ’رسالة الموقع غير متاح’، ولن يكون باستطاعتهم تصفح الموقع.';
$_lang['setting_site_status_err'] = 'الرجاء اختيار فيما إذا كان أو لم يكن الموقع متصل (نعم) أو غير متصل (لا).';

$_lang['setting_site_unavailable_message'] = 'رسالة الموقع غير متاح';
$_lang['setting_site_unavailable_message_desc'] = 'الرسالة التي سيتم إظهارها عندما يكون الموقع غير متصل أو عند حصول خطأ. <strong>ملاحظة: سيتم إظهار هذه الرسالة فقط إذا كان خيار صفحة الموقع غير متوفر غير مضبوط.</strong>';

$_lang['setting_site_unavailable_page'] = 'صفحة الموقع غير متوفر';
$_lang['setting_site_unavailable_page_desc'] = 'أدخل معرف المصدر الذي تريد استخدامه كصفحة غير متصل هنا. <strong>ملاحظة: تأكد من أن هذا المعرف الذي أدخلته ينتمي إلى مصدر موجود، وتم نشره مسبقا!</strong>';
$_lang['setting_site_unavailable_page_err'] = 'الرجاء تحديد معرف المستند لصفحة الموقع غير متوفر.';

$_lang['setting_static_elements_automate_templates'] = 'Automate static elements for templates?';
$_lang['setting_static_elements_automate_templates_desc'] = 'This will automate the handling of static files, such as creating and deleting static files for templates.';

$_lang['setting_static_elements_automate_tvs'] = 'Automate static elements for TVs?';
$_lang['setting_static_elements_automate_tvs_desc'] = 'This will automate the handling of static files, such as creating and deleting static files for TVs.';

$_lang['setting_static_elements_automate_chunks'] = 'Automate static elements for chunks?';
$_lang['setting_static_elements_automate_chunks_desc'] = 'This will automate the handling of static files, such as creating and deleting static files for chunks.';

$_lang['setting_static_elements_automate_snippets'] = 'Automate static elements for snippets?';
$_lang['setting_static_elements_automate_snippets_desc'] = 'This will automate the handling of static files, such as creating and deleting static files for snippets.';

$_lang['setting_static_elements_automate_plugins'] = 'Automate static elements for plugins?';
$_lang['setting_static_elements_automate_plugins_desc'] = 'This will automate the handling of static files, such as creating and deleting static files for plugins.';

$_lang['setting_static_elements_default_mediasource'] = 'Static elements default mediasource';
$_lang['setting_static_elements_default_mediasource_desc'] = 'Specify a default mediasource where you want to store the static elements in.';

$_lang['setting_static_elements_default_category'] = 'Static elements default category';
$_lang['setting_static_elements_default_category_desc'] = 'Specify a default category for creating new static elements.';

$_lang['setting_static_elements_basepath'] = 'Static elements basepath';
$_lang['setting_static_elements_basepath_desc'] = 'Basepath of where to store the static elements files.';

$_lang['setting_resource_static_allow_absolute'] = 'Allow absolute static resource path';
$_lang['setting_resource_static_allow_absolute_desc'] = 'This setting enables users to enter a fully qualified absolute path to any readable file on the server as the content of a static resource. Important: enabling this setting may be considered a significant security risk! It\'s strongly recommended to keep this setting disabled, unless you fully trust every single manager user.';

$_lang['setting_resource_static_path'] = 'Static resource base path';
$_lang['setting_resource_static_path_desc'] = 'When resource_static_allow_absolute is disabled, static resources are restricted to be within the absolute path provided here.  Important: setting this too wide may allow users to read files they shouldn\'t! It is strongly recommended to limit users to a specific directory such as {core_path}static/ or {assets_path} with this setting.';

$_lang['setting_symlink_merge_fields'] = 'دمج حقول المصدر في الروابط الرمزية';
$_lang['setting_symlink_merge_fields_desc'] = 'إذا كانت مضبوطة إلى ’نعم’، سيتم بشكل أوتوماتيكي دمج الحقول الغير فارغة مع المصدر الهدف عند الاستمرار باستخدام الروابط الرمزية.';

$_lang['setting_syncsite_default'] = 'إفراغ محتوى ذاكرة التخزين المؤقت الافتراضي';
$_lang['setting_syncsite_default_desc'] = 'اختر \'نعم\' لإفراغ ذاكرة التخزين المؤقت بعد حفظ مصدر كافتراضي.';
$_lang['setting_syncsite_default_err'] = 'يرجى ذكر إذا كنت تريد أو لا تريد إفراغ ذاكرة التخزين الؤقت بعد حفظ مصدر كافتراضي.';

$_lang['setting_topmenu_show_descriptions'] = 'Show Descriptions in Main Menu';
$_lang['setting_topmenu_show_descriptions_desc'] = 'If set to \'No\', MODX will hide the descriptions from main menu items in the manager.';

$_lang['setting_tree_default_sort'] = 'حقل الفرز الافتراضي لشجرة المصدر';
$_lang['setting_tree_default_sort_desc'] = 'حقل الفرز الافتراضي لشجرة المصدر عند تحميل المدير.';

$_lang['setting_tree_root_id'] = 'معرف جذر الشجرة';
$_lang['setting_tree_root_id_desc'] = 'اضبط هذا إلى معرف صالح لمصدر لبدء شجرة المصدر اليسرى عند أسفل تلك العقدة كجذر. يمكن للمستخدم أن يرى فقط المصادر الأبناء للمصدر المحدد.';

$_lang['setting_tvs_below_content'] = 'انقل عناصر القالب أسفل المحتوى';
$_lang['setting_tvs_below_content_desc'] = 'Set this to Yes to move TVs below the Content when editing Resources.';

$_lang['setting_ui_debug_mode'] = 'وضع تصحيح أخطاء واجهة المستخدم';
$_lang['setting_ui_debug_mode_desc'] = 'اضبط هذا إلى نعم لإخراج رسائل تصحيح الأخطاء عند استخدام UI لموضوع المدير الافتراضي: يجب عليك أن تستخدم المتصفح الذي يدعم  console.log.';

$_lang['setting_unauthorized_page'] = 'صفحة غير مصرح بها';
$_lang['setting_unauthorized_page_desc'] = 'أدخل معرف المصدر الذي تريد أن ترسل إليه المستخدمين إذا قاموا بطلب مصدر غير مؤمن أو غير مصرح به. <strong>ملاحظة: تأكد من أن المعرف الذي أدخلته ينتمي إلى مصدر موجود، وأنه منشور مسبقا وقابل للوصول بشكل عام!</strong>';
$_lang['setting_unauthorized_page_err'] = 'الرجاء تحديد معرف مصدر للصفحة الغير مصرح بها.';

$_lang['setting_upload_files'] = 'أنواع ملفات قابلة للرفع';
$_lang['setting_upload_files_desc'] = 'هنا يمكنك إدخال قائمة من الملفات التي يمكن أن ترفع إلى \'assets/files/\' باستخدام مدير المصدر. الرجاء إدخال الامتدادات لأنواع الملفات، مفصولة بفواصل.';

$_lang['setting_upload_file_exists'] = 'Check if uploaded file exists';
$_lang['setting_upload_file_exists_desc'] = 'When enabled an error will be shown when uploading a file that already exists with the same name. When disabled, the existing file will be quietly replaced with the new file.';

$_lang['setting_upload_maxsize'] = 'حجم الرفع الأعظمي';
$_lang['setting_upload_maxsize_desc'] = 'أدخل حجم الملف الأعظمي الذي يمكن رفعه باستخدام مدير الملفات. يجب إدخال حجم الملف المرفوع مقدرا بالبايت. <strong>ملاحظة: يمكن أن يستغرق رفع الملفات الكبيرة وقتا طويلا جدا!</strong>';

$_lang['setting_upload_translit'] = 'Transliterate names of uploaded files?';
$_lang['setting_upload_translit_desc'] = 'If this option is enabled, the name of an uploaded file will be transliterated according to the global transliteration rules.';

$_lang['setting_upload_translit_restrict_chars_pattern'] = 'File Name Character Restriction Pattern';
$_lang['setting_upload_translit_restrict_chars_pattern_desc'] = 'A valid RegEx pattern for restricting characters used in an uploaded file’s name.';

$_lang['setting_use_alias_path'] = 'استخدم مسار ذو اسم مستعار مألوف';
$_lang['setting_use_alias_path_desc'] = 'ضبط هذا الخيار إلى ’نعم’ سيعرض المسار الكامل للمصدر إذا كان المصدر يملك اسم مستعار. على سبيل المثال، إذا كان مصدر مع اسم مستعار يدعى \'child\' موجود ضمن مصدر حاوي مع اسم مستعار يدعى \'parent\'، عندها مسار الاسم المستعار الكامل للمصدر سيعرض كـ  \'/parent/child.html\'.<br /><strong>ملاحظة: عند ضبط هذا الخيار إلى ’نعم’ (تشغيل مسارات الاسم المستعار)، العناصر المرجعية (مثل الصور، ملفات CSS، ملفات جافا سكريبت، وغيرها) تستخدم المسار المطلق، مثلا، \'/assets/images\' بدلا من  \'assets/images\'. عند القيام بذلك ستمنع المتصفح (أو مخدم الوب) من إلحاق المسار ذو الصلة بمسار الاسم المستعار.</strong>';

$_lang['setting_use_editor'] = 'تفعيل محرر النص المنسق';
$_lang['setting_use_editor_desc'] = 'هل تريد تفعيل محرر النص المنسق، إذا كنت مرتاح أكثر بكتابة HTML، عندها يمكنك إيقاف تشغيل المحرر باستخدام هذه الإعدادات. لاحظ أن هذه الإعدادات تطبق على كل المستندات وكل المستخدمين!';
$_lang['setting_use_editor_err'] = 'الرجاء وضح فيما إذا كنت تريد أو لا تريد استخدام المحرر RTE.';

$_lang['setting_use_frozen_parent_uris'] = 'استخدم محددات الأصل المجمدة';
$_lang['setting_use_frozen_parent_uris_desc'] = 'عندما يكون ممكناً، سيكون URI للموارد الفروع بالنسبة إلى المحددات المجمدة من أحد الأبوين، تجاهل الأسماء مستعارة الموارد العالية في الشجرة.';

$_lang['setting_use_multibyte'] = 'استخدام إضافة متعددة البايت';
$_lang['setting_use_multibyte_desc'] = 'اضبط إلى صحيح اذا كنت تريد استخدام لاحقة mbstring من أجل المحارف متعددة البايت في تثبيت مودكس الخاص بك. فقط اضبط إلى صحيح اذا كنت تمتلك إضافة mbstring PHP مثبتة.';

$_lang['setting_use_weblink_target'] = 'استخدم هدف رابط الوب';
$_lang['setting_use_weblink_target_desc'] = 'اضبط إلى صحيح إذا كنت تريد أن تحصل على وسوم رابط مودكس وأن تقوم makeUrl() بتوليد روابط كـ URL هدف لروابط الوب. وإلا، سيتم توليد URL مودكس الداخلي بواسطة وسوم رابط والطريقة makeUrl().';

$_lang['setting_user_nav_parent'] = 'أصل قائمة المستخدم';
$_lang['setting_user_nav_parent_desc'] = 'الحاوية تستخدم لسحب كل السجلات لقائمة المستخدم .';

$_lang['setting_welcome_screen'] = 'عرض شاشة الترحيب';
$_lang['setting_welcome_screen_desc'] = 'إذا تم الضبط إلى صحيح، ستعرض شاشة الترحيب في التحميل الناجح التالي لصفحة الترحيب، وبعدها لن تظهر ثانية بعد ذلك.';

$_lang['setting_welcome_screen_url'] = 'URL شاشة الترحيب';
$_lang['setting_welcome_screen_url_desc'] = 'URL شاشة الترحيب التي تحمل عند التحميل الأول لمودكس الثوري.';

$_lang['setting_welcome_action'] = 'حدث الترحيب';
$_lang['setting_welcome_action_desc'] = 'المتحكم الافتراضي الذي سيتم تحميله عند الوصول إلى المدير عندما لا يتم تحديد أي متحكم في الـ URL.';

$_lang['setting_welcome_namespace'] = 'فضاء أسماء الترحيب';
$_lang['setting_welcome_namespace_desc'] = 'فضاء الأسماء الذي ينتمي له حدث الترحيب.';

$_lang['setting_which_editor'] = 'المحرر المستخدم';
$_lang['setting_which_editor_desc'] = 'هنا يمكنك اختيار أي محرر نص منسق تريد استخدامه. يمكنك تحميل وتثبيت محرر النص المنسق من إدارة الحزمة.';

$_lang['setting_which_element_editor'] = 'المحرر المستخدم من أجل العناصر';
$_lang['setting_which_element_editor_desc'] = 'هنا يمكنك اختيار أي محرر نص منسق تريد استخدامه عند تعديل العناصر. يمكنك تحميل وتثبيت محررات نص منسق إضافية من إدارة الحزمة.';

$_lang['setting_xhtml_urls'] = 'XHTML URLs';
$_lang['setting_xhtml_urls_desc'] = 'إذا كانت مضبوطة إلى صحيح، ستكون كل الـ URLs المولدة بواسطة مودكس متوافقة مع XHTML، بما في ذلك ترميز محرف العطف.';

$_lang['setting_default_context'] = 'السياق الافتراضي';
$_lang['setting_default_context_desc'] = 'حدد السياق الافتراضي الذي تريد استخدامه من أجل المصادر الجديدة.';

$_lang['setting_auto_isfolder'] = 'ضبط الحاوي بشكل أوتوماتيكي';
$_lang['setting_auto_isfolder_desc'] = 'إذا تم الضبط إلى نعم، سيتم تغيير خاصية الحاوي بشكل أوتوماتيكي.';

$_lang['setting_default_username'] = 'اسم المستخدم الافتراضي';
$_lang['setting_default_username_desc'] = 'اسم المستخدم الافتراضي لمستخدم غير مصادق.';

$_lang['setting_manager_use_fullname'] = 'إظهار الاسم الكامل في رأس صفحة الادارة ';
$_lang['setting_manager_use_fullname_desc'] = 'إذا كان تعيين إلى نعم، سيتم عرض محتويات الحقل "الاسم الكامل" في "صفحة الإدارة" بدلاً من "اسم المستخدم"';

$_lang['setting_log_snippet_not_found'] = 'Log snippets not found';
$_lang['setting_log_snippet_not_found_desc'] = 'If set to yes, snippets that are called but not found will be logged to the error log.';

$_lang['setting_error_log_filename'] = 'Error log filename';
$_lang['setting_error_log_filename_desc'] = 'Customize the filename of the MODX error log file (includes file extension).';

$_lang['setting_error_log_filepath'] = 'Error log path';
$_lang['setting_error_log_filepath_desc'] = 'Optionally set a absolute path the a custom error log location. You might use placeholders like {cache_path}.';

$_lang['setting_passwordless_activated'] = 'Activate passwordless login';
$_lang['setting_passwordless_activated_desc'] = 'When enabled, users will enter their email address to receive a one-time login link, rather than entering a username and password.';

$_lang['setting_passwordless_expiration'] = 'Passwordless login expiration';
$_lang['setting_passwordless_expiration_desc'] = 'How long a one-time login link is valid in seconds.';

$_lang['setting_static_elements_html_extension'] = 'Static elements html extension';
$_lang['setting_static_elements_html_extension_desc'] = 'The extension for files used by static elements with HTML content.';
