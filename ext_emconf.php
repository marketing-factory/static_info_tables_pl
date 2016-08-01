<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "static_info_tables_pl".
 *
 * Auto generated 17-09-2014 12:01
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'Static Info Tables (pl)',
    'description' => '(pl) language pack for the Static Info Tables providing localized names for countries.',
    'category' => 'misc',
    'version' => '6.3.1',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearcacheonload' => 0,
    'author' => 'Simon Schmidt',
    'author_email' => 'sfs@marketing-factory.de',
    'author_company' => 'Marketing Factory Consulting GmbH',
    'constraints' => [
        'depends' => [
            'static_info_tables' => '6.3.0-6.3.99',
            'php' => '5.5.0-5.6.99',
            'typo3' => '7.6.0-7.6.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
