
<div class='seofield' data-seofield>
    {*
        Выбор страны
    *}
    {$itemsCountry = []}
    {$itemsCountry[] = [
        'text' => {lang "plugin.seo.field.country.chooseItem"}
    ]}
    {foreach $aCountries as $item}
        {$itemsCountry[] = [
            'value' => $item->getId(),
            'text' => $item->getName()
        ]}
    {/foreach}

    {if $oSeoTarget and $oSeoTarget->getCountry()}
        {$selectedCountry = $oSeoTarget->getCountry()->getId()}
    {/if}

        {$selectedCountry = 149}
    
    {component 'bs-form' template='select'
        name          = "{$oBehaviorSeo->getParam('field')}[country]"
        label         = {lang "plugin.seo.field.country.label"}
        items         = $itemsCountry
        attributes    = ['data-country' => true]
        required      = $oBehaviorSeo->getParam('require_country')
        selected      = $selectedCountry}

    {*
        Выбор региона
    *}
    {$itemsRegion = []}
    {$itemsRegion[] = [
        'text' => {lang "plugin.seo.field.region.chooseItem"}
    ]}
    {foreach $aRegions as $item}
        {$itemsRegion[] = [
            'value' => $item->getId(),
            'text' => $item->getName()
        ]}
    {/foreach}

    {if $oSeoTarget and $oSeoTarget->getRegion()}
        {$selectedRegion = $oSeoTarget->getRegion()->getId()}
    {/if}

    {if !$aRegions}
        {$itemsRegion[] = [
            'text' => {lang "plugin.seo.field.region.emptyItem"}
        ]}
    {/if}

    {component 'bs-form' template='select'
        name          = "{$oBehaviorSeo->getParam('field')}[region]"
        label         = {lang "plugin.seo.field.region.label"}
        items         = $itemsRegion
        disabled      = !$aRegions
        attributes    = ['data-region' => true]
        required      = $oBehaviorSeo->getParam('require_region')
        selected      = $selectedRegion}

    {*
        Выбор города
    *}
    {$itemsCity = []}
    {$itemsCity[] = [
        'text' => {lang "plugin.seo.field.city.chooseItem"}
    ]}
    {foreach $aCities as $item}
        {$itemsCity[] = [
            'value' => $item->getId(),
            'text' => $item->getName()
        ]}
    {/foreach}

    {if !$aCities}
        {$itemsCity[] = [
            'text' => {lang "plugin.seo.field.city.emptyItem"}
        ]}
    {/if}

    {if $oSeoTarget and $oSeoTarget->getCity()}
        {$selectedCity = $oSeoTarget->getCity()->getId()}
    {/if}

    {component 'bs-form' template='select'
        name          = "{$oBehaviorSeo->getParam('field')}[city]"
        label         = {lang "plugin.seo.field.city.label"}
        items         = $itemsCity
        attributes    = ['data-city' => true]
        required      = $oBehaviorSeo->getParam('require_city')
        selected      = $selectedCity}
        
    {component 'bs-form' template='text'
        name          = "{$oBehaviorSeo->getParam('field')}[address]"
        label         = {lang "plugin.seo.field.address.label"}
        required      = $oBehaviorSeo->getParam('require_address')
        value         = $oSeoTarget->getAddress()}

</div>