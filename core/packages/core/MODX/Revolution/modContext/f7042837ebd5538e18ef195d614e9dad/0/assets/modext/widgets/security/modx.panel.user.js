/**
 * @class MODx.panel.User
 * @extends MODx.FormPanel
 * @param {Object} config An object of configuration properties
 * @xtype modx-panel-user
 */
MODx.panel.User = function(config = {}) {
    Ext.applyIf(config, {
        url: MODx.config.connector_url,
        baseParams: {},
        id: 'modx-panel-user',
        cls: 'container',
        defaults: {
            collapsible: false,
            autoHeight: true
        },
        bodyStyle: '',
        items: [this.getPageHeader(config), {
            xtype: 'modx-tabs',
            id: 'modx-user-tabs',
            deferredRender: false,
            defaults: {
                autoHeight: true,
                layout: 'form',
                labelWidth: 150,
                bodyCssClass: 'tab-panel-wrapper',
                layoutOnTabChange: true
            },
            items: this.getFields(config)
        }],
        useLoadingMask: true,
        listeners: {
            setup: { fn: this.setup, scope: this },
            success: { fn: this.success, scope: this },
            beforeSubmit: { fn: this.beforeSubmit, scope: this }
        }
    });
    MODx.panel.User.superclass.constructor.call(this, config);
    const passwordPanel = Ext.getCmp('modx-user-panel-newpassword');
    passwordPanel.items.each(item => {
        item.getEl().set({ autocomplete: 'new-password' });
    });
    passwordPanel.getEl().dom.style.display = 'none';
    Ext.getCmp('modx-user-password-genmethod-s').on('check', this.showNewPassword, this);
    Ext.getCmp('modx-extended-form').disable();
};
Ext.extend(MODx.panel.User, MODx.FormPanel, {
    setup: function() {
        if (this.config.user === '' || this.config.user === 0) {
            Ext.get('modx-user-header').update(_('user_new'));
            this.fireEvent('ready');
            return false;
        }
        MODx.Ajax.request({
            url: this.config.url,
            params: {
                action: 'Security/User/Get',
                id: this.config.user,
                getGroups: true
            },
            listeners: {
                success: {
                    fn: function(response) {
                        const groupsGrid = Ext.getCmp('modx-grid-user-groups');

                        this.getForm().setValues(response.object);

                        if (groupsGrid) {
                            const
                                store = groupsGrid.getStore(),
                                groupsData = Ext.decode(response.object.groups)
                            ;
                            if (store) {
                                store.loadData(groupsData);
                            }
                        }
                        Ext.getCmp('modx-header-breadcrumbs').updateHeader(Ext.util.Format.htmlEncode(response.object.username));
                        this.fireEvent('ready', response.object);
                        MODx.fireEvent('ready');
                    },
                    scope: this
                }
            }
        });
    },

    beforeSubmit: function(o) {
        const
            data = {},
            userSettings = Ext.getCmp('modx-grid-user-settings'),
            userGroups = Ext.getCmp('modx-grid-user-groups'),
            remoteTree = Ext.getCmp('modx-remote-tree'),
            extendedFieldsTree = Ext.getCmp('modx-extended-tree')
        ;
        if (userSettings) {
            data.settings = userSettings.encodeModified();
        }
        if (userGroups) {
            data.groups = userGroups.encode();
        }
        if (remoteTree) {
            data.remote_data = remoteTree.encode();
        }
        if (extendedFieldsTree) {
            data.extended = extendedFieldsTree.encode();
        }
        Ext.apply(o.form.baseParams, data);
    },

    success: function(o) {
        const userId = this.config.user;
        if (Ext.getCmp('modx-user-passwordnotifymethod-s').getValue() && o.result.message !== '') {
            Ext.Msg.hide();
            Ext.Msg.show({
                title: _('password_notification'),
                msg: o.result.message,
                buttons: Ext.Msg.OK,
                fn: function(btn) {
                    if (userId === 0) {
                        MODx.loadPage('security/user/update', `id=${o.result.object.id}`);
                    }
                    return false;
                }
            });
            this.clearDirty();
        } else if (userId === 0) {
            MODx.loadPage('security/user/update', `id=${o.result.object.id}`);
        }
    },

    showNewPassword: function(cmp, checked) {
        const passwordPanel = Ext.getCmp('modx-user-panel-newpassword'),
              panelElement = passwordPanel.getEl(),
              fxOptions = { useDisplay: true }
        ;
        if (checked) {
            panelElement.slideIn('t', fxOptions);
            passwordPanel.doLayout();
        } else {
            panelElement.slideOut('t', fxOptions);
        }
    },

    getFields: function(config) {
        const fields = [{
            title: _('general_information'),
            defaults: {
                msgTarget: 'side',
                autoHeight: true
            },
            cls: 'main-wrapper form-with-labels',
            labelAlign: 'top',
            items: this.getGeneralFields(config)
        }];
        if (config.user !== 0 && MODx.perm.user_settings) {
            fields.push({
                title: _('settings'),
                autoHeight: true,
                defaults: {
                    autoHeight: true
                },
                hideMode: 'offsets',
                items: [{
                    html: `<h3>${_('user_settings')}</h3><p>${_('user_settings_desc')}</p>`,
                    xtype: 'modx-description'
                }, {
                    xtype: 'modx-grid-user-settings',
                    urlFilters: ['namespace', 'area', 'query'],
                    cls: 'main-wrapper',
                    preventRender: true,
                    user: config.user,
                    width: '97%',
                    listeners: {
                        afterAutoSave: { fn: this.markDirty, scope: this }
                    }
                }]
            });
        }
        fields.push({
            title: _('access_permissions'),
            layout: 'form',
            defaults: {
                border: false,
                autoHeight: true
            },
            hideMode: 'offsets',
            items: [{
                html: _('access_permissions_user_message'),
                xtype: 'modx-description'
            }, {
                xtype: 'modx-grid-user-groups',
                cls: 'main-wrapper',
                title: '',
                preventRender: true,
                user: config.user,
                width: '97%',
                listeners: {
                    afterRemoveRow: { fn: this.markDirty, scope: this },
                    afterUpdateRole: { fn: this.markDirty, scope: this },
                    afterAddGroup: { fn: this.markDirty, scope: this },
                    afterReorderGroup: { fn: this.markDirty, scope: this }
                }
            }]
        });
        if (config.remoteFields && config.remoteFields.length) {
            fields.push({
                title: _('remote_data'),
                layout: 'form',
                defaults: {
                    border: false,
                    autoHeight: true
                },
                hideMode: 'offsets',
                items: [{
                    html: `<p>${_('user_remote_data_msg')}</p>`,
                    xtype: 'modx-description'
                }, {
                    layout: 'column',
                    cls: 'main-wrapper',
                    items: [{
                        columnWidth: 0.4,
                        title: _('attributes'),
                        layout: 'fit',
                        border: false,
                        items: {
                            xtype: 'modx-orm-tree',
                            id: 'modx-remote-tree',
                            data: config.remoteFields,
                            formPanel: 'modx-panel-user',
                            prefix: 'remote'
                        }
                    }, {
                        xtype: 'modx-orm-form',
                        columnWidth: 0.6,
                        title: _('editing_form'),
                        id: 'modx-remote-form',
                        prefix: 'remote',
                        treePanel: 'modx-remote-tree',
                        formPanel: 'modx-panel-user'
                    }]
                }]
            });
        }
        config.extendedFields = config.extendedFields || [];
        fields.push({
            title: _('extended_fields'),
            layout: 'form',
            defaults: {
                border: false,
                autoHeight: true
            },
            hideMode: 'offsets',
            items: [{
                html: `<p>${_('extended_fields_msg')}</p>`,
                xtype: 'modx-description'
            }, {
                layout: 'column',
                cls: 'main-wrapper',
                items: [{
                    columnWidth: 0.4,
                    title: _('attributes'),
                    layout: 'fit',
                    border: false,
                    items: {
                        xtype: 'modx-orm-tree',
                        id: 'modx-extended-tree',
                        data: config.extendedFields,
                        formPanel: 'modx-panel-user',
                        prefix: 'extended',
                        enableDD: true,
                        listeners: {
                            click: {
                                fn: function() {
                                    Ext.getCmp('modx-extended-form').enable();
                                },
                                scope: this
                            },
                            dragdrop: {
                                fn: function() {
                                    this.markDirty();
                                },
                                scope: this
                            }
                        }
                    }
                }, {
                    xtype: 'modx-orm-form',
                    columnWidth: 0.6,
                    title: _('editing_form'),
                    id: 'modx-extended-form',
                    prefix: 'extended',
                    treePanel: 'modx-extended-tree',
                    formPanel: 'modx-panel-user'
                }]
            }]
        });
        return fields;
    },

    getGeneralFields: function(config) {
        const itemsRight = [{
            id: 'modx-user-newpassword',
            name: 'newpassword',
            xtype: 'hidden',
            value: false
        }, {
            id: 'modx-user-primary-group',
            name: 'primary_group',
            xtype: 'hidden'
        }, {
            id: 'modx-user-active',
            name: 'active',
            hideLabel: true,
            boxLabel: _('active'),
            description: _('user_active_desc'),
            xtype: 'xcheckbox',
            inputValue: 1
        }, {
            id: 'modx-user-blocked',
            name: 'blocked',
            hideLabel: true,
            boxLabel: _('user_block'),
            description: _('user_block_desc'),
            cls: 'danger',
            xtype: 'xcheckbox',
            inputValue: 1,
            listeners: {
                check: {
                    fn: function(e, checked) {
                        const blockeduntil = Ext.getCmp('modx-user-blockeduntil');
                        if (checked) {
                            blockeduntil.enable();
                        } else {
                            blockeduntil.disable();
                            Ext.getCmp('modx-user-blockedafter').setValue(null);
                        }
                    },
                    scope: this
                }
            }
        }];
        if (MODx.perm.set_sudo) {
            itemsRight.push({
                id: 'modx-user-sudo',
                name: 'sudo',
                hideLabel: true,
                boxLabel: _('user_sudo'),
                description: _('user_sudo_desc'),
                cls: 'warning',
                xtype: 'xcheckbox',
                inputValue: 1,
                value: 0
            });
        }

        itemsRight.push([{
            id: 'modx-user-blockeduntil',
            name: 'blockeduntil',
            fieldLabel: _('user_blockeduntil'),
            description: _('user_blockeduntil_desc'),
            xtype: 'xdatetime',
            width: 300,
            timeWidth: 150,
            dateWidth: 150,
            allowBlank: true,
            dateFormat: MODx.config.manager_date_format,
            timeFormat: MODx.config.manager_time_format,
            hiddenFormat: 'Y-m-d H:i:s',
            listeners: {
                beforerender: {
                    fn: function(e) {
                        const blocked = Ext.getCmp('modx-user-blocked');
                        if (blocked.checked) {
                            e.enable();
                        } else {
                            e.disable();
                        }
                    }
                }
            }
        }, {
            id: 'modx-user-blockedafter',
            name: 'blockedafter',
            fieldLabel: _('user_blockedafter'),
            description: _('user_blockedafter_desc'),
            xtype: 'xdatetime',
            width: 300,
            timeWidth: 150,
            dateWidth: 150,
            allowBlank: true,
            dateFormat: MODx.config.manager_date_format,
            timeFormat: MODx.config.manager_time_format,
            hiddenFormat: 'Y-m-d H:i:s'
        }, {
            layout: 'column',
            border: false,
            defaults: {
                layout: 'form',
                labelAlign: 'top',
                labelSeparator: '',
                anchor: '100%',
                border: false
            },
            items: [{
                columnWidth: 0.5,
                items: {
                    id: 'modx-user-logincount',
                    name: 'logincount',
                    fieldLabel: _('user_logincount'),
                    description: _('user_logincount_desc'),
                    xtype: 'statictextfield',
                    anchor: '100%'
                }
            }, {
                columnWidth: 0.5,
                items: {
                    id: 'modx-user-failedlogincount',
                    name: 'failedlogincount',
                    fieldLabel: _('user_failedlogincount'),
                    description: _('user_failedlogincount_desc'),
                    xtype: 'textfield',
                    anchor: '100%'
                }
            }]
        }, {
            layout: 'column',
            border: false,
            defaults: {
                layout: 'form',
                labelAlign: 'top',
                labelSeparator: '',
                anchor: '100%',
                border: false
            },
            items: [{
                columnWidth: 0.5,
                items: {
                    id: 'modx-user-createdon',
                    name: 'createdon',
                    fieldLabel: _('user_createdon'),
                    description: _('user_createdon_desc'),
                    xtype: 'statictextfield',
                    anchor: '100%'
                }
            }, {
                columnWidth: 0.5,
                items: {
                    id: 'modx-user-lastlogin',
                    name: 'lastlogin',
                    fieldLabel: _('user_prevlogin'),
                    description: _('user_prevlogin_desc'),
                    xtype: 'statictextfield',
                    anchor: '100%'
                }
            }]
        }, {
            id: 'modx-user-class-key',
            name: 'class_key',
            fieldLabel: _('class_key'),
            description: _('user_class_key_desc'),
            xtype: 'textfield',
            anchor: '100%',
            value: 'MODX\\Revolution\\modUser'
        }, {
            id: 'modx-user-comment',
            name: 'comment',
            fieldLabel: _('comment'),
            xtype: 'textarea',
            anchor: '100%',
            grow: true
        }, {
            id: 'modx-user-fs-newpassword',
            title: _('password_new'),
            xtype: 'fieldset',
            cls: 'x-fieldset-checkbox-toggle',
            checkboxToggle: true,
            collapsed: Boolean(config.user),
            forceLayout: true,
            listeners: {
                expand: {
                    fn: function(p) {
                        Ext.getCmp('modx-user-newpassword').setValue(true);
                        this.markDirty();
                    },
                    scope: this
                },
                collapse: {
                    fn: function(p) {
                        Ext.getCmp('modx-user-newpassword').setValue(false);
                        this.markDirty();
                    },
                    scope: this
                }
            },
            items: [{
                xtype: 'radiogroup',
                fieldLabel: _('password_method'),
                columns: 1,
                items: [{
                    id: 'modx-user-passwordnotifymethod-s',
                    name: 'passwordnotifymethod',
                    boxLabel: _('password_method_screen'),
                    xtype: 'radio',
                    value: 's',
                    inputValue: 's',
                    checked: true
                }]
            }, {
                xtype: 'radiogroup',
                fieldLabel: _('password_gen_method'),
                columns: 1,
                items: [{
                    id: 'modx-user-password-genmethod-g',
                    name: 'passwordgenmethod',
                    boxLabel: _('password_gen_gen'),
                    xtype: 'radio',
                    inputValue: 'g',
                    value: 'g',
                    checked: true
                }, {
                    id: 'modx-user-password-genmethod-s',
                    name: 'passwordgenmethod',
                    boxLabel: _('password_gen_specify'),
                    xtype: 'radio',
                    inputValue: 'spec',
                    value: 'spec'
                }, {
                    id: 'modx-user-password-genmethod-user-email-specify',
                    name: 'passwordgenmethod',
                    boxLabel: _('password_gen_user_email_specify'),
                    xtype: 'radio',
                    inputValue: 'user_email_specify',
                    value: 'user_email_specify'
                }],
                listeners: {
                    change: {
                        fn: function(cmp, checked) {
                            const passwordShowCmp = Ext.getCmp('modx-user-passwordnotifymethod-s');
                            if (['modx-user-password-genmethod-s', 'modx-user-password-genmethod-user-email-specify'].includes(checked.id)) {
                                passwordShowCmp.setValue(false);
                            }
                            if (checked.id === 'modx-user-password-genmethod-g') {
                                passwordShowCmp.setValue(true);
                            }
                        }
                    }
                }
            }, {
                id: 'modx-user-panel-newpassword',
                xtype: 'panel',
                layout: 'form',
                border: false,
                autoHeight: true,
                style: 'padding-top: 15px',
                defaults: {
                    msgTarget: 'under',
                    anchor: '100%',
                    inputType: 'password',
                    xtype: 'textfield'
                },
                items: [{
                    id: 'modx-user-specifiedpassword',
                    name: 'specifiedpassword',
                    fieldLabel: _('change_password_new')
                }, {
                    id: 'modx-user-confirmpassword',
                    name: 'confirmpassword',
                    fieldLabel: _('change_password_confirm')
                }]
            }]
        }]);

        const itemsLeft = [{
            id: 'modx-user-id',
            name: 'id',
            xtype: 'hidden',
            value: config.user
        }, {
            id: 'modx-user-username',
            name: 'username',
            fieldLabel: _('username'),
            description: _('user_username_desc'),
            xtype: 'textfield',
            allowBlank: false,
            anchor: '100%',
            listeners: {
                keyup: {
                    scope: this,
                    fn: function(f, e) {
                        Ext.getCmp('modx-header-breadcrumbs').updateHeader(Ext.util.Format.htmlEncode(f.getValue()));
                    }
                }
            }
        }, {
            id: 'modx-user-email',
            name: 'email',
            fieldLabel: _('user_email'),
            xtype: 'textfield',
            anchor: '100%',
            maxLength: 255,
            allowBlank: false
        }, {
            id: 'modx-user-fullname',
            name: 'fullname',
            fieldLabel: _('user_full_name'),
            xtype: 'textfield',
            anchor: '100%',
            maxLength: 255
        }, {
            id: 'modx-user-photo',
            fieldLabel: _('user_photo'),
            name: 'photo',
            xtype: 'modx-combo-browser',
            hideFiles: true,
            source: MODx.config.photo_profile_source || MODx.config.default_media_source,
            hideSourceCombo: true,
            anchor: '100%'
        }, {
            layout: 'column',
            border: false,
            defaults: {
                layout: 'form',
                labelAlign: 'top',
                labelSeparator: '',
                anchor: '100%',
                border: false
            },
            items: [{
                columnWidth: 0.5,
                items: {
                    id: 'modx-user-dob',
                    name: 'dob',
                    fieldLabel: _('user_dob'),
                    xtype: 'datefield',
                    anchor: '100%',
                    allowBlank: true,
                    format: MODx.config.manager_date_format
                }
            }, {
                columnWidth: 0.5,
                items: {
                    id: 'modx-user-gender',
                    name: 'gender',
                    hiddenName: 'gender',
                    fieldLabel: _('user_gender'),
                    xtype: 'modx-combo-gender',
                    anchor: '100%'
                }
            }]
        }, {
            id: 'modx-user-website',
            name: 'website',
            fieldLabel: _('user_website'),
            xtype: 'textfield',
            anchor: '100%',
            maxLength: 255
        }, {
            layout: 'column',
            border: false,
            defaults: {
                layout: 'form',
                labelAlign: 'top',
                labelSeparator: '',
                anchor: '100%',
                border: false
            },
            items: [{
                columnWidth: 0.5,
                items: {
                    id: 'modx-user-phone',
                    name: 'phone',
                    fieldLabel: _('user_phone'),
                    xtype: 'textfield',
                    anchor: '100%',
                    maxLength: 255
                }
            }, {
                columnWidth: 0.5,
                items: {
                    id: 'modx-user-mobilephone',
                    name: 'mobilephone',
                    fieldLabel: _('user_mobile'),
                    xtype: 'textfield',
                    anchor: '100%',
                    maxLength: 255
                }
            }]
        }, {
            id: 'modx-user-fax',
            name: 'fax',
            fieldLabel: _('user_fax'),
            xtype: 'textfield',
            anchor: '100%',
            maxLength: 255
        }, {
            id: 'modx-user-country',
            fieldLabel: _('user_country'),
            xtype: 'modx-combo-country',
            anchor: '100%'
        }, {
            layout: 'column',
            border: false,
            defaults: {
                layout: 'form',
                labelAlign: 'top',
                labelSeparator: '',
                anchor: '100%',
                border: false
            },
            items: [{
                columnWidth: 0.3,
                items: {
                    id: 'modx-user-state',
                    name: 'state',
                    fieldLabel: _('user_state'),
                    xtype: 'textfield',
                    anchor: '100%',
                    maxLength: 100
                }
            }, {
                columnWidth: 0.4,
                items: {
                    id: 'modx-user-city',
                    name: 'city',
                    fieldLabel: _('city'),
                    xtype: 'textfield',
                    anchor: '100%',
                    maxLength: 255
                }
            }, {
                columnWidth: 0.3,
                items: {
                    id: 'modx-user-zip',
                    name: 'zip',
                    fieldLabel: _('user_zip'),
                    xtype: 'textfield',
                    anchor: '100%',
                    maxLength: 25
                }
            }]
        }, {
            id: 'modx-user-address',
            name: 'address',
            fieldLabel: _('address'),
            xtype: 'textarea',
            anchor: '100%',
            grow: true
        }];

        return [{
            layout: 'column',
            border: false,
            defaults: {
                layout: 'form',
                labelAlign: 'top',
                labelSeparator: '',
                anchor: '100%',
                border: false
            },
            items: [{
                columnWidth: 0.5,
                defaults: {
                    msgTarget: 'under'
                },
                items: itemsLeft
            }, {
                columnWidth: 0.5,
                defaults: {
                    msgTarget: 'under'
                },

                items: itemsRight
            }]
        }, {
            html: MODx.onUserFormRender,
            border: false
        }];
    },

    getPageHeader: function(config) {
        return MODx.util.getHeaderBreadCrumbs('modx-user-header', [{
            text: _('users'),
            href: MODx.getPage('security/user')
        }]);
    }
});
Ext.reg('modx-panel-user', MODx.panel.User);
