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
        $this->AddEventPreg( '#^(add|edit)$#i', '#^(\d{1,5})?$#i', 'Rule::EventEdit');
        $this->AddEventPreg( '#^remove$#i', '#^\d{1,5}$#i', 'Rule::EventRemove');
        
        
    }

}