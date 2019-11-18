
(function($) {
    "use strict";

    $.widget( "livestreet.seoField", $.livestreet.lsComponent, {
        /**
         * Дефолтные опции
         */
        options: {
            selectors:{
                template    : "[data-tmp-var]",
                content     : "[data-seo-field-content]",
                btnAdd      : "[data-btn-add]"
            }
            
        },
        
        _create: function() {
            this._super();
            
            this._on(this.elements.btnAdd, {click: "add"});
            
            this.elements.content.children().find('[data-btn-clear]').on('click', function(){
                $(this).closest('[data-seo-field]').remove();
            })
        },
        
        add: function(event)
        {
            let field = this.elements.template.clone();
            
            field.find('input').removeAttr('disabled');
            
            
            field.find('[data-btn-clear]').on('click', function(){
                field.remove();
            })
            
            this.elements.content.append(field);
        }
    });
})(jQuery);