<?php


class PluginSeo_ActionAdmin extends PluginAdmin_ActionPlugin
{

  

    public function Init()
    {
//        $this->SetDefaultEvent('list');
    }

    /**
     * Регистрируем евенты
     *
     */
    protected function RegisterEvent()
    {
        
        $this->RegisterEventExternal('Seo', 'PluginSeo_ActionAdmin_EventSeo');
        $this->AddEventPreg(  '#^(rules)$#i', 'Seo::EventRules');
//        $this->AddEventPreg( '#^[\w-]+$#i', '#^remove$#i', '#^\d{1,5}$#i', 'Property::EventPropertyRemove');
//        $this->AddEventPreg( '#^[\w-]+$#i', '#^update$#i', '#^\d{1,5}$#i', 'Property::EventPropertyUpdate');
//        $this->AddEventPreg( '#^[\w-]+$#i', '#^create$#i', '#^$#i', 'Property::EventPropertyCreate');
//        $this->AddEventPreg('#^ajax$#i', '#^sort-save$#i', '#^$#i', 'Property::EventAjaxSortSave');
        
        
    }

}