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
        $seo = $this->GetParam('seo');

        if (!$oTarget) {
            $oTarget = Engine::GetEntity($sEntity);
        }

        $aBehaviors = $oTarget->GetBehaviors();
        foreach ($aBehaviors as $oBehavior) { 
            /**
             * Определяем нужное нам поведение
             */
            if ($oBehavior instanceof PluginSeo_ModuleSeo_BehaviorEntity) {
                
                $oSeoTarget = $this->PluginSeo_Seo_GetTargetByFilter([
                    'target_type' => $oBehavior->getParam('target_type'),
                    'target_id' => $oTarget->getId()
                ]);                
                
                $this->Viewer_Assign('oSeoTarget', $oSeoTarget);      
                
                $oBehavior->setParam('label', $this->GetParam('label', $oBehavior->getParam('label')));
                $oBehavior->setParam('placeholder', $this->GetParam('placeholder', $oBehavior->getParam('placeholder')));
                        
                $this->Viewer_Assign('oBehaviorSeo', $oBehavior); 
                
                $this->Viewer_Assign('seo', $seo);
                
//                $this->Viewer_Assign('aCountries', $this->PluginSeo_Seo_GetCountryItemsByFilter([
//                    'id' => 149
//                ]));
                
//                if ($oSeoTarget and $oSeoTarget->getCountry()) 
//                {
//                    $this->Viewer_Assign('aRegions', $this->PluginSeo_Seo_GetRegionItemsByFilter([
//                        'country_id' => 149//$oSeoTarget->getCountry()->getId()
//                    ]));
//                }
                
                $this->SetTemplate('component@seo:seo.autocomplete');

            }
        }

    }
}
