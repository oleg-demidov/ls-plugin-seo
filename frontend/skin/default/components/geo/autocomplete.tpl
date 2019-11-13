
{if $oSeoTarget and $oSeoTarget->getCity()}
    {$seo = $oSeoTarget->getCity()}
{/if}

{if $seo}
    {$text = $seo->getName()}
    {$value = $seo->getId()}
{/if}

{if $oBehaviorSeo->getParam('label')}
    {$label = {lang name=$oBehaviorSeo->getParam('label')}}
{/if}



{component 'bs-form' template='select'
    name          = "{$oBehaviorSeo->getParam('field')}[city]"
    label         = $label
    placeholder   = $oBehaviorSeo->getParam('placeholder')
    classes       = "js-seo-input"
    attributes    = [
        'data-city'         => true, 
        "autocomplete"      => "off", 
        'data-default-text' => $text,
        'data-default-value'=> $value
    ]
    require       = $oBehaviorSeo->getParam('require')
    value         = $value}
    
<button type="button" class="close field-clear d-none" data-btn-seo-clear aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
    
