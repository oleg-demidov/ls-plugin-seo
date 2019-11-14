{**
 * Список тестов
 *
 *}
<h3>
    Список правил формирования мета тегов
</h3>

{block 'page_content'}
    
        
    <table class="ls-table">
        <thead>
            <tr>
                <th>Название</th>
                <th>Эвент</th>
                <th class="ls-table-cell-actions">Действие</th>
            </tr>
        </thead>
        <tbody>
            {if !count($aRules)}
                <tr>
                    <td colspan="4">{component "blankslate" title="Пусто"}</td>
                </tr>
            {/if}

            {foreach $aRules as $rule}
                
                <tr data-id="{$rule->getId()}">
                    <td>{$rule->getName()}</td>
                    
                    <td>
                        {$rule->getEvent()}
                    </td>
                                        
                    <td class="ls-table-cell-actions">
                        <a href="{router page="admin/plugin/seo/edit/{$rule->getId()}"}" class="fa fa-edit" title="{$aLang.plugin.admin.edit}"></a>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
     
    
{/block}

 