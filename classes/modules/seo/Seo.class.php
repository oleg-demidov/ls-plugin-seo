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
    
    public function GetVars(array $aFilter = []) {
        if($aFilter){
            $aReturn = array();
            foreach ($aFilter as $key) {
                if (array_key_exists($key, $this->aVars)) {
                    $aReturn[$key] = $this->aVars[$key];
                }
            }
            return $aReturn;
        }
        return $this->aVars;
    }
    
    public function GetVar($key) {
        if(isset($this->aVars[$key])){
            return $this->aVars[$key];
        }
        return null;
    }
   
    public function ValidateEntitySeo(Entity $entity, Behavior $behavior, $aSeo) {

        
        if($behavior->getParam('required') and !$aSeo){
            return $this->Lang_Get('plugin.seo.validate.not_fond_seo');
        }
        
        $entity->_setData(['_seo_data' => $aSeo]);
        
        return true;
    }
    
    public function GetEntityData(Entity $oEntity, string $sTargetType)
    {
        $data = $oEntity->_getDataOne('_seo_data');
        if (is_null($data)) {
            $this->AttachSeoDataForTargetItems($oEntity, $sTargetType);

            return $oEntity->_getDataOne('_seo_data');
        }
        return $data;
    }
    
    public function RewriteFilter(array $aFilter, Behavior $behavior,string $sEntityFull) {

        $oEntitySample = Engine::GetEntity($sEntityFull);

        if (!isset($aFilter['#join'])) {
            $aFilter['#join'] = array();
        }

        if (!isset($aFilter['#select'])) {
            $aFilter['#select'] = array();
        }

        if (array_key_exists("#seo", $aFilter)) {
            $aSeo = [];
                    
            $sJoin = "JOIN " . Config::Get('db.table.seo_seo_data') . " seo ON
					t.`{$oEntitySample->_getPrimaryKey()}` = seo.target_id and
					seo.target_type = '{$behavior->getParam('target_type')}'";
                                        
            foreach ($aFilter["#seo"] as $key => $value) 
            {
                $sJoin .= " and seo.{$key} = ?";
                $aSeo[$key] = $value;
            }
                                        
            $aFilter['#join'][$sJoin] = $aSeo;
            
        }
        
        return $aFilter;
    }
    
    public function RewriteGetItemsByFilter(array $aResult, Behavior $behavior, array $aFilter)
    {
        if (!$aResult) {
            return;
        }
        /**
         * Список на входе может быть двух видов:
         * 1 - одномерный массив
         * 2 - двумерный, если применялась группировка (использование '#index-group')
         *
         * Поэтому сначала сформируем линейный список
         */
        if (isset($aFilter['#index-group']) and $aFilter['#index-group']) {
            $aEntitiesWork = array();
            foreach ($aResult as $aItems) {
                foreach ($aItems as $oItem) {
                    $aEntitiesWork[] = $oItem;
                }
            }
        } else {
            $aEntitiesWork = $aResult;
        }

        if (!$aEntitiesWork) {
            return;
        }
        /**
         * Проверяем необходимость цеплять категории
         */
        if (isset($aFilter['#with']["#seo"])) {
            $this->AttachSeoDataForTargetItems($aEntitiesWork, $behavior->getParam('target_type'));
        }
    }
    
    public function AttachSeoDataForTargetItems($aEntityItems, $sTargetType)
    {
        if (!is_array($aEntityItems)) {
            $aEntityItems = array($aEntityItems);
        }
        $aEntitiesId = array(0);
        foreach ($aEntityItems as $oEntity) {
            $aEntitiesId[] = $oEntity->getId();
        }
        /**
         * Получаем таргеты для всех объектов
         */
        
        $aSeo = $this->GetDataItemsByFilter([
            'target_id in' => $aEntitiesId,
            'target_type' => $sTargetType,
            '#index-from-primary'
        ]);
        
        
        /**
         * Собираем данные
         */
        foreach ($aEntityItems as $oEntity) {
            if (isset($aSeo[$oEntity->_getPrimaryKeyValue()])) {
                $oEntity->_setData(array('_seo_data' => $aSeo[$oEntity->_getPrimaryKeyValue()]));
            }
        }
    }
    
    public function RemoveSeo(Entity $oEntity, Behavior $oBehavior) {
        if($oData = $this->GetDataByFilter([
            'target_type' => $oBehavior->getParam('target_type'),
            'target_id' => $oEntity->getId()
            ]))
        {
            $oData->Delete();
        }
    }
    
    public function SaveSeo(Entity $oEntity, Behavior $oBehavior) 
    {
        
        $oData = $this->PluginSeo_Seo_GetDataByFilter([
            'target_type' => $oBehavior->getParam('target_type'),
            'target_id' => $oEntity->getId()
        ]);
        
        if (!$oData) {
            $oData = Engine::GetEntity('PluginSeo_Seo_Data');
        }
                        
        $oData->_setData($oEntity->getSeo());       
        
        $oData->setTargetId($oEntity->getId());
        $oData->setTargetType($oBehavior->getParam('target_type'));
        
        return $oData->Save();
    }
    
    public function Get($param) {
        
    }
}
