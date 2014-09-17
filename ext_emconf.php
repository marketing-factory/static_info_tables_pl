<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "static_info_tables_pl".
 *
 * Auto generated 17-09-2014 15:31
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Static Info Tables (pl)',
	'description' => '(pl) language pack for the Static Info Tables providing localized names for countries.',
	'category' => 'misc',
	'shy' => 0,
	'version' => '1.1.0',
	'dependencies' => 'static_info_tables',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => 'static_countries,static_country_zones,static_currencies,static_languages,static_territories',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Simon Schmidt',
	'author_email' => 'sfs@marketing-factory.de',
	'author_company' => 'Marketing Factory Consulting GmbH',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'static_info_tables' => '2.3.0-2.3.99',
			'php' => '5.3.0-5.4.99',
			'typo3' => '4.5.0-4.7.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:10:{s:9:"ChangeLog";s:4:"892b";s:20:"class.ext_update.php";s:4:"eb4d";s:21:"ext_conf_template.txt";s:4:"6adb";s:12:"ext_icon.gif";s:4:"639f";s:17:"ext_localconf.php";s:4:"64ca";s:14:"ext_tables.php";s:4:"5eb0";s:14:"ext_tables.sql";s:4:"6827";s:28:"ext_tables_static_update.sql";s:4:"2f65";s:16:"locallang_db.xml";s:4:"b710";s:10:"README.txt";s:4:"61a7";}',
);

?>