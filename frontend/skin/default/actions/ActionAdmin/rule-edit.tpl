<h3>Добавить/редактировать правило</h3>


<form method="POST" action="{Router::GetPathWebCurrent() }"> 
    
    {component "bs-form.text"
        label       = "Название:"
        value       = $rule->getName()
        name        = 'rule[name]'
    }
    
    {component "bs-form.text"
        label       = "Имя эвента:"
        value       = $rule->getEvent()
        name        = 'rule[event]'
    }
        
    Список возможных переменных: <br>
    <strong>
        {foreach $aVars as $var}
            {ldelim}${$var}{rdelim}&nbsp;
        {/foreach}
    </strong><br>
    {component "bs-form.textarea"
        label       = "Title:"
        value       = $rule->_getDataOne('title')
        name        = 'rule[title]'
    }
    {component "bs-form.textarea"
        label       = "Description:"
        value       = $rule->_getDataOne('description')
        name        = 'rule[description]'
    }
    {component "bs-form.textarea"
        label       = "Keywords:"
        value       = $rule->_getDataOne('keywords')
        name        = 'rule[keywords]'
    }
    {component "bs-form.textarea"
        label       = "H1:"
        value       = $rule->_getDataOne('h1')
        name        = 'rule[h1]'
    }
  
    
    {component "bs-button" type="submit" text=$aLang.common.save bmods="success"}
</form>
