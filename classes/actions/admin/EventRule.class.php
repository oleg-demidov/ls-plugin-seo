<?php
/**
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
 * @link      http://www.livestreetcms.com
 * @copyright 2013 OOO "ЛС-СОФТ"
 * @author    PSNet <light.feel@gmail.com>
 *
 */


class PluginSeo_ActionAdmin_EventRule extends Event
{


    public function EventList()
    {
        $this->SetTemplateAction('rules');
        
        $aRules = $this->PluginSeo_Seo_GetRuleItemsByFilter( [
            
        ]);
        
        $this->Viewer_Assign('aRules', $aRules);
    }

    public function EventEdit() {
        
        $this->SetTemplateAction('rule-edit'); 
        
        $rule = $this->PluginSeo_Seo_GetRuleById( $this->GetParam(0) );
        if(!$rule){
            $rule = Engine::GetEntity('PluginSeo_Seo_Rule' );
        }
            
        if(isPost()){ 
            
            $rule->_setData(getRequest('rule'));
                                   
            if($rule->_Validate()){ 
                if($rule->Save()){
                    
                    $this->Message_AddNoticeSingle($this->Lang_Get('common.success.save'),'',true);
                    Router::LocationAction("admin/plugin/seo/rules");
                    
                }else{
                    $this->Message_AddErrorSingle($this->Lang_Get('common.error.system.base'));
                }
            }else{
                foreach($rule->_getValidateErrors() as $aError){
                    $this->Message_AddError($aError[0], $this->Lang_Get('common.error.error'));
                }
            }  
                      
        }
        
        $this->Viewer_Assign('aVars', $aVars);
       
        $this->Viewer_Assign('rule', $rule);
    }
    
}