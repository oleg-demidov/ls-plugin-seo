
{if $oSeoTarget and $oSeoTarget->getCity()}
    {$text = $oSeoTarget->getCity()->getName()}
    {$value = $oSeoTarget->getCity()->getId()}
{/if}

{if $oBehaviorSeo->getParam('label')}
    {$label = {lang name=$oBehaviorSeo->getParam('label')}}
{/if}


{component 'bs-form' template='select'
    name          = "{$oBehaviorSeo->getParam('field')}[city]"
    label         = $label
    placeholder   = $oBehaviorSeo->getParam('placeholder')
    attributes    = [
        'data-city'         => true, 
        "autocomplete"      => "off", 
        'data-default-text' => $text,
        'data-default-value'=> $value
    ]
    require       = $oBehaviorSeo->getParam('require')
    value         = $value}
    
