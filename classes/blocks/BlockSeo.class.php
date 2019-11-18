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
 * @author Maxim Mzhelskiy <rus.engine@gmail.com>
 *
 */

/**
 * Обработка блока с редактированием свойств объекта
 *
 * @package application.blocks
 * @since 2.0
 */
class PluginSeo_BlockSeo extends Block
{
    /**
     * Запуск обработки
     */
    public function Exec()
    {
        $sEntity = $this->GetParam('entity');
        $oTarget = $this->GetParam('target');

        if (!$oTarget) {
            $oTarget = Engine::GetEntity($sEntity);
        }

        $aBehaviors = $oTarget->GetBehaviors();
        foreach ($aBehaviors as $oBehavior) { 
            /**
             * Определяем нужное нам поведение
             */
            if ($oBehavior instanceof PluginSeo_ModuleSeo_BehaviorEntity) {
                
                $data = $this->PluginSeo_Seo_GetDataByFilter([
                    'target_type' => $oBehavior->getParam('target_type'),
                    'target_id' => $oTarget->getId()
                ]);
                
                $aVars = $this->PluginSeo_Seo_GetAllTargetVars($oBehavior->getParam('target_type'));
                $aVars = array_fill_keys($aVars, null);
                
                if(!$data){
                    $data = Engine::GetEntity('PluginSeo_Seo_Data');
                }
                
                $data->setVars(array_merge($aVars, $data->getVars()));
                
                $this->Viewer_Assign('data', $data);      
                $this->Viewer_Assign('behavior', $oBehavior);      
                
                $this->SetTemplate('component@seo:seo');

            }
        }

    }
}
