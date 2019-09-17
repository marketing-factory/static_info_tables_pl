<?php

$EM_CONF[$_EXTKEY] = Array(
    'title' => 'Static Info Tables (pl)',
    'description' => 'Polish (pl) language pack for the Static Info Tables providing localized names for countries, currencies and so on.',
    'category' => 'misc',
    'version' => '6.8.0',
    'priority' => '',
    'loadOrder' => '',
    'module' => '',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'modify_tables' => 'static_countries,static_languages,static_currencies,static_territories',
    'clearcacheonload' => 1,
    'lockType' => '',
    'author' => 'Ephraim Härer',
    'author_email' => 'ephraim.haerer@renolit.com',
    'author_company' => 'jambage.com',
    'constraints' => array(
        'depends' => array(
            'typo3' => '8.7.0-9.5.99',
            'static_info_tables' => '6.7.3-6.7.99',
        ),
        'conflicts' => array(),
        'suggests' => array(),
    ),
);

