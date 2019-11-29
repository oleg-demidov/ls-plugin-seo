<?php

class PluginSeo_HookEvent extends Hook {
    
    /**
     * Регистрируем хуки
     */
    public function RegisterHook() {
        /**
         * Хук на отображение админки
         */
        $this->AddHook('action_event_people_after', 'SetSeoTags');
        $this->AddHook('action_event_company_after', 'SetSeoTags');
    }

    public function SetSeoTags($aParams) { 

        $rule = $this->PluginSeo_Seo_GetRuleByFilter([
            'event' => $aParams['action']->GetCurrentEventName()
        ]); 
        
        if(!$rule){
            return;
        }
                
        $this->Viewer_SetHtmlTitle($rule->getTitle());
        $this->Viewer_SetHtmlDescription($rule->getDescription());
        $this->Viewer_SetHtmlKeywords($rule->getKeywords());
        $this->Viewer_Assign('h1', $rule->getH1());
        
    }
}