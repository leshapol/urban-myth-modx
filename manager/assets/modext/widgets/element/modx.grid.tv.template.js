/**
 * Loads a grid of TVs assigned to the Template.
 *
 * @class MODx.grid.TemplateVarTemplate
 * @extends MODx.grid.Grid
 * @param {Object} config An object of options.
 * @xtype modx-grid-tv-template
 */
// eslint-disable-next-line func-names
MODx.grid.TemplateVarTemplate = function(config = {}) {
    const accessCheckboxCol = new Ext.ux.grid.CheckColumn({
        header: _('access'),
        dataIndex: 'access',
        width: 60,
        sortable: true
    });
    Ext.applyIf(config, {
        id: 'modx-grid-tv-template',
        url: MODx.config.connector_url,
        fields: [
            'id',
            'templatename',
            'category',
            'category_name',
            'description',
            'access',
            'menu'
        ],
        showActionsColumn: false,
        baseParams: {
            action: 'Element/TemplateVar/Template/GetList',
            tv: config.tv,
            category: this.getCategoryFilterValue()
        },
        saveParams: {
            tv: config.tv
        },
        width: 800,
        paging: true,
        plugins: accessCheckboxCol,
        remoteSort: true,
        columns: [{
            header: _('name'),
            dataIndex: 'templatename',
            width: 150,
            sortable: true,
            renderer: {
                fn: function(value, metadata, record) {
                    return this.renderLink(value, {
                        href: `?a=element/template/update&id=${record.data.id}`,
                        target: '_blank'
                    });
                },
                scope: this
            }
        }, {
            header: _('category'),
            dataIndex: 'category_name',
            width: 300
        }, {
            header: _('description'),
            dataIndex: 'description',
            width: 300
        }, accessCheckboxCol],
        tbar: [
            '->',
            {
                xtype: 'modx-combo-category',
                itemId: 'filter-category',
                emptyText: _('filter_by_category'),
                value: this.getCategoryFilterValue(),
                submitValue: false,
                hiddenName: '',
                width: 200,
                listeners: {
                    select: {
                        fn: function(cmp, record, selectedIndex) {
                            this.applyGridFilter(cmp, 'category');
                        },
                        scope: this
                    }
                }
            },
            this.getQueryFilterField(),
            this.getClearFiltersButton('filter-category, filter-query')
        ]
    });
    MODx.grid.TemplateVarTemplate.superclass.constructor.call(this, config);
};
Ext.extend(MODx.grid.TemplateVarTemplate, MODx.grid.Grid);
Ext.reg('modx-grid-tv-template', MODx.grid.TemplateVarTemplate);
