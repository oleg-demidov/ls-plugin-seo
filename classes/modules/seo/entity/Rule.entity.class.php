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

class PluginSeo_ModuleSeo_EntityRule extends EntityORM
{

    protected $aJsonFields = [
        'vars'
    ];
    
    protected function getTagText(string $sTag)
    {
        $aVars = $this->PluginSeo_Seo_GetVars($this->getVars());
        
        $sText = $this->_getDataOne($sTag);
        
        foreach ($aVars as $key => $value) {
            $sText = str_replace('\{$' . $key . '\}', $value, $sText);
        }
        return $sText;
        
    }
   
}