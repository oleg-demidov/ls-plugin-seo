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
        
        $this->RegisterEventExternal('Rule', 'PluginSeo_ActionAdmin_EventRule');
        $this->AddEventPreg(  '#^(rules)$#i', 'Rule::EventList');
        $this->AddEventPreg( '#^(edit)$#i', '#^\d{1,5}$#i', 'Rule::EventEdit');
//        $this->AddEventPreg( '#^[\w-]+$#i', '#^update$#i', '#^\d{1,5}$#i', 'Property::EventPropertyUpdate');
//        $this->AddEventPreg( '#^[\w-]+$#i', '#^create$#i', '#^$#i', 'Property::EventPropertyCreate');
//        $this->AddEventPreg('#^ajax$#i', '#^sort-save$#i', '#^$#i', 'Property::EventAjaxSortSave');
        
        
    }

}