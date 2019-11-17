<?php
/**
 * Таблица БД
 */
$config['$root$']['db']['table']['seo_seo_rule'] = '___db.table.prefix___seo_rule';
$config['$root$']['db']['table']['seo_seo_data'] = '___db.table.prefix___seo_data';

$config['$root$']['router']['page']['seo'] = 'PluginSeo_ActionSeo';

/*
 * Добавление компонентов в админке
 */
$config['$root$']['plugin']['admin']['components'] = array_merge(
    Config::Get('plugin.admin.components'), 
    ['seo:seo']
);

$config['admin']['assets'] = [
    'js' => [
        'assets/js/init.js'
    ],
    'css' => [
        //'assets/css/admin.css'
    ]
]; 

return $config;