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
 * Поведение для подключения функционала дополнительных полей к сущностям
 *
 * @package application.modules.property
 * @since 2.0
 */
class PluginSeo_ModuleSeo_BehaviorEntity extends Behavior
{
    /**
     * Дефолтные параметры
     *
     * @var array
     */
    protected $aParams = array(
        'target_type'   => '',
        'field'         => 'seo',
        'required'      => false,
        'validate'      => true
    );
    
    protected $target;
    /**
     * Список хуков
     *
     * @var array
     */
    protected $aHooks = array(
        'validate_after' => 'CallbackValidateAfter',
        'after_save'     => 'CallbackAfterSave',
        'after_delete'   => 'CallbackAfterDelete',
    );

    /**
     * Коллбэк
     * Выполняется при инициализации сущности
     *
     * @param $aParams
     */
    public function CallbackValidateAfter($aParams)
    {
        if ($aParams['bResult']) {
            if(!$this->getParam('validate')){
                return;
            }
            $aFields = $aParams['aFields'];
            if (is_null($aFields) or in_array('seo', $aFields)) {
                $oValidator = $this->Validate_CreateValidator('seo_check', $this, $this->getParam('field'));
                $oValidator->validateEntity($this->oObject, $aFields);
                $aParams['bResult'] = !$this->oObject->_hasValidateErrors();
            }
        }
    }

    /**
     * Коллбэк
     * Выполняется после сохранения сущности
     */
    public function CallbackAfterSave()
    {
        $this->PluginSeo_Seo_SaveSeo($this->oObject, $this);
    }

    /**
     * Коллбэк
     * Выполняется после удаления сущности
     */
    public function CallbackAfterDelete()
    {
        $this->PluginSeo_Seo_RemoveSeo($this->oObject, $this);
    }

   
    public function ValidateSeoCheck($aSeo)
    {
        return $this->PluginSeo_Seo_ValidateEntitySeo($this->oObject, $this, $aSeo);
    }
    
 
    public function getData() {
        
        return $this->PluginSeo_Seo_GetEntityData($this->oObject, $this->getParam('target_type'));
        
    }

}
