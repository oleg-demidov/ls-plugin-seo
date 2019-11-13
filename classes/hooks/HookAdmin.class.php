<?php

class PluginSeo_HookAdmin extends Hook {
    
    /**
     * Регистрируем хуки
     */
    public function RegisterHook() {
        /**
         * Хук на отображение админки
         */
        $this->AddHook('init_action_admin', 'InitActionAdmin');
    }

    public function InitActionAdmin($aParams) { 
        

        $oSection = Engine::GetEntity('PluginAdmin_Ui_MenuSection')
                ->SetCaption('SEO')
                ->SetName('seo')
                ->SetUrl('plugin/seo')
                ->setIcon('th-list');
        
        $oSection
                ->AddItem(Engine::GetEntity('PluginAdmin_Ui_MenuItem')
                ->SetCaption('Правила')
                ->SetUrl('/admin/plugin/seo/rules'));

        $oMenu = $this->PluginAdmin_Ui_GetMenuMain();
        $oMenu->AddSection($oSection);
        
        
    }
}