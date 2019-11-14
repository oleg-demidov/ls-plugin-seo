
{capture name="seo"}
    
    {if $data}
        {$title = $data->getTitle()}
        {$h1 = $data->getH1()}
        {$keywords = $data->getKeywords()}
        {$description = $data->getDescription()}
    {/if}

    {component "bs-form.text"
        label       = "Title:"
        value       = $title
        name        = "{$behavior->getParam('field')}[title]"
    }
    
    {component "bs-form.textarea"
        label       = "Description:"
        value       = $description
        name        = "{$behavior->getParam('field')}[description]"
    }
    
    {component "bs-form.textarea"
        label       = "Keywords:"
        value       = $keywords
        name        = "{$behavior->getParam('field')}[keywords]"
    }
    
    {component "bs-form.text"
        label       = "H1:"
        value       = $h1
        name        = "{$behavior->getParam('field')}[h1]"
    }
    
    
{/capture}


{component "bs-collapse" 
    btnMods        = 'primary'
    btnClasses     = "mb-2"
    text        = 'SEO'
    content     = $smarty.capture.seo
 }<br>