<?php
/**
 * 
 * @author Oleg Demidov
 *
 */

/**
 * Запрещаем напрямую через браузер обращение к этому файлу.
 */
if (!class_exists('Plugin')) {
    die('Hacking attempt!');
}

class PluginSeo extends Plugin
{
    


    public function Init()
    {
//        $this->Component_Add('seo:seo');
//        $this->Viewer_AppendScript(Plugin::GetTemplatePath(__CLASS__) . 'assets/js/init.js');
        $this->Lang_AddLangJs([
            'plugin.seo.no_results_text',
        ]);
    }

    public function Activate()
    {
        
        
        return true;
    }

    public function Deactivate()
    {
        
        return true;
    }
    
    public function Remove()
    {
        
        return true;
    }
}