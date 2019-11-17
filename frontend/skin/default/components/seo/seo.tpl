
<div data-seo-field>
    
    
    {function name="var_item" key="" val="" disabled=true}
        <div class="input-group mb-2" data-tmp-var>
            <input type="text" class="form-control" name="{$behavior->getParam('field')}[keys][]" value="{$key}" placeholder="Имя переменной" 
                   {if $disabled}disabled{/if}>
            <div class="input-group-prepend" style=" height: 31px;">
              <span class="input-group-text" id="basic-addon1">=</span>
            </div>
            <input type="text" class="form-control w-50" name="{$behavior->getParam('field')}[vals][]" value="{$val}" placeholder="Значение" 
                   {if $disabled}disabled{/if}>
            <button type="button" class="close field-clear ml-2 text-danger" data-btn-clear aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    {/function}

    Переменные seo:<br>
    
    <div data-seo-field-content>
        {if $data}
            {foreach $data->getVars() as $key => $val}
                {var_item  key=$key val=$val disabled=false}
            {/foreach}
        {/if}
    </div>
    
    <div class="d-none">
        {var_item}
    </div>
    
    {component "bs-button" 
        classes     = "mb-3"
        text        = {lang 'common.add'} 
        bmods       = "sm primary" 
        attributes  = ['data-btn-add' => true]}<br>
</div>
    
 