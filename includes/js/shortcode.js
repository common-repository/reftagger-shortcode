//RefTagger button
(function() {
    tinymce.create('tinymce.plugins.reftagger_button', {
        init : function(ed, url) {
            ed.addButton('reftagger_button', {
                title : 'Reftagger',
                image : url+'/img/reftagger.png',
                onclick : function() {
                     ed.selection.setContent('[reftagger title=""]' + ed.selection.getContent() + '[/reftagger]');
 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('reftagger_button', tinymce.plugins.reftagger_button);
})();