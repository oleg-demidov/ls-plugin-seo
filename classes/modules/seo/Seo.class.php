<?php
/*
 * LiveStreet CMS
 * Copyright © 2013 OOO "ЛС-СОФТ"
 *
 * ------------------------------------------------------
 *
 * Official site: www.livestreetcms.com
 * Contact e-mail: office@livestreetcms.com
 *
 * GNU General Public License, version 2:
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * ------------------------------------------------------
 *
 * @link http://www.livestreetcms.com
 * @copyright 2013 OOO "ЛС-СОФТ"
 * @author Oleg Demidov
 *
 */

class PluginSeo_ModuleSeo extends ModuleORM
{
    protected $aVars = [];

    public function Init() {
        parent::Init();
    }
    
    /**
     *  Добавить правило для отображения тегов в определенном Эвенте 
     * 
     * @param string $sName   Имя Правила для отображения в списке
     * @param string $sEventName Имя Эвента
     * @param array $aVars  Переменные доступные для правила {$var}
     */
    public function AddRule(
        string $sName,
        string $sEventName,
        array $aVars
            ) {
        
        $rule = Engine::GetEntity('PluginSeo_Seo_Rule');
        
        $rule->setName($sName);
        $rule->setVars($aVars);
        $rule->setEvent($sEventName);
        
        $rule->Save();
        
    }
    
    public function SetVars(array $aVars) {
        $this->aVars = $aVars;
    }
    
    public function SetVar($key, $var) {
        $this->aVars[$key] = $var;
    }
    
    public function GetVars() {
        return $this->aVars;
    }
    
    public function GetVar($key) {
        if(isset($this->aVars[$key])){
            return $this->aVars[$key];
        }
        return null;
    }
}
