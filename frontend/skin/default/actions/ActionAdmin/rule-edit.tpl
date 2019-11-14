<h3>Добавить/редактировать правило</h3>


<form method="POST" action="{Router::GetPathWebCurrent() }"> 
    
    {component "bs-form.text"
        attributes  = ['disabled'    =>  true]
        label       = "Название:"
        value       = $rule->getName()
    }
    
    {component "bs-form.text"
        attributes  = ['disabled'    =>  true]
        label       = "Имя эвента:"
        value       = $rule->getEvent()
    }
        
    Список переменных: <br>
    {foreach $rule->getVars() as $var}
        {ldelim}${$var}{rdelim}<br>
    {/foreach}

    {component "bs-form.textarea"
        label       = "Title:"
        value       = $rule->getTitle()
        name        = 'rule[title]'
    }
    {component "bs-form.textarea"
        label       = "Description:"
        value       = $rule->getDescription()
        name        = 'rule[description]'
    }
    {component "bs-form.textarea"
        label       = "Keywords:"
        value       = $rule->getKeywords()
        name        = 'rule[keywords]'
    }
    {component "bs-form.textarea"
        label       = "H1:"
        value       = $rule->getH1()
        name        = 'rule[h1]'
    }
  
    
    {component "bs-button" type="submit" text=$aLang.common.save bmods="success"}
</form>
