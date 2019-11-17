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
    
    
    public function getTitle() {
        return $this->PluginSeo_Seo_ReplaceVars(parent::getTitle());
    }
    
    public function getH1() {
        return $this->PluginSeo_Seo_ReplaceVars(parent::getH1());
    }
    
    public function getDescription() {
        return $this->PluginSeo_Seo_ReplaceVars(parent::getDescription());
    }
    
    public function getKeywords() {
        return $this->PluginSeo_Seo_ReplaceVars(parent::getKeywords());
    }
   
}