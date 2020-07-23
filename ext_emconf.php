<?php
/***************************************************************
 * Extension Manager/Repository config file for ext "static_info_tables_pl".
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'Static Info Tables (pl)',
    'description' => 'Polish (pl) language pack for the Static Info Tables providing localized names for countries, currencies and so on.',
    'category' => 'misc',
    'version' => '6.8.1',
    'state' => 'stable',
    'uploadfolder' => false,
    'createDirs' => '',
    'modify_tables' => 'static_countries,static_languages,static_currencies,static_territories',
    'clearcacheonload' => false,
    'author' => 'Simon Schmidt',
    'author_email' => 'sfs@marketing-factory.de',
    'author_company' => 'jambage.com',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-9.5.99',
            'static_info_tables' => '6.7.3-6.7.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];

