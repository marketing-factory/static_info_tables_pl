<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2005-2008 René Fritz (r.fritz@colorcube.de)
*  All rights reserved
*
*  This script is part of the Typo3 project. The Typo3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

require_once (t3lib_extMgm::extPath('static_info_tables').'class.tx_staticinfotables_encoding.php');

/**
 * Class for updating the db
 *
 * @author	René Fritz <r.fritz@colorcube.de> 
 * @co-author	Simon Schmidt <sfs@marketing-factory.de> 
 * @co-author	Tomasz Krawczyk <tomasz@typo3.pl>
 */
class ext_update  {

	/**
	 * Main function, returning the HTML content of the module
	 *
	 * @return	string		HTML
	 */
	function main()	{

		$content = '';

		$content.= '<br />Update the Static Info Tables with new language labels.';
		$content .= '<br />';
		$import = t3lib_div::_GP('import');

		if ($import == 'Import') {

			$destEncoding = t3lib_div::_GP('dest_encoding');
			$extPath = t3lib_extMgm::extPath('static_info_tables_pl');

			// <INSERT>
			/*
				The <INSERT> block must be here as long as polish zones are not included in static_info_tables
				(see http://forge.typo3.org/issues/28104 )
			*/
			// Remove polish zones if exist
			$GLOBALS['TYPO3_DB']->exec_DELETEquery(
				'static_country_zones',
				'zn_country_iso_2=\'PL\' AND zn_country_iso_3 = \'POL\''
			);
			
			// Insert polish zones
			$fileContent = explode("\n", t3lib_div::getUrl($extPath.'ext_tables_static_insert.sql'));

			foreach($fileContent as $line) {
				$line = trim($line);
				if ($line && preg_match('#^INSERT#i', $line) ) {
					$query = $this->getUpdateEncoded($line, $destEncoding);
					$res = $GLOBALS['TYPO3_DB']->admin_query($query);
				}
			}
			// </INSERT>
			
			// Update polish labels
			$fileContent = explode("\n", t3lib_div::getUrl($extPath.'ext_tables_static_update.sql'));

			foreach($fileContent as $line) {
				$line = trim($line);
				if ($line && preg_match('#^UPDATE#i', $line) ) {
					$query = $this->getUpdateEncoded($line, $destEncoding);
					$res = $GLOBALS['TYPO3_DB']->admin_query($query);
				}
			}
			$content .= '<br />';
			$content .= '<p>Encoding: '.htmlspecialchars($destEncoding).'</p>';
			$content .= '<p>Done.</p>';
		} elseif (t3lib_extMgm::isLoaded('static_info_tables')) {

			$content .= '</form>';
			$content .= '<form action="'.htmlspecialchars(t3lib_div::linkThisScript()).'" method="post">';
			$content .= '<br />Destination character encoding:';
			$content .= '<br />'.tx_staticinfotables_encoding::getEncodingSelect('dest_encoding', '', 'utf-8');
			$content .= '<br />(The character encoding must match the encoding of the existing tables data. By default this is UTF-8.)';
			$content .= '<br /><br />';
			$content .= '<input type="submit" name="import" value="Import" />';
			$content .= '</form>';
		} else {
			$content .= '<br /><strong>The extension static_info_tables needs to be installed first!</strong>';
		}

		return $content;
	}

	

	/**
	 * Convert the values of a SQL update statement to a different encoding than UTF-8.
	 *
	 * @param string $query Update statement like: UPDATE static_countries SET cn_short_pl='XXX' WHERE cn_iso_2='PL';
	 * @param string $destEncoding Destination encoding
	 * @return string Converted update statement
	 */
	function getUpdateEncoded($query, $destEncoding) {
		static $csconv;

		if (!($destEncoding==='utf-8')) {
			if(!is_object($csconv)) {
				$csconv = t3lib_div::makeInstance('t3lib_cs');
			}

			$queryElements = explode('WHERE', $query);
			$where = preg_replace('#;$#', '', trim($queryElements[1]));
				
			$queryElements = explode('SET', $queryElements[0]);
			$queryFields = $queryElements[1];

			$queryElements = t3lib_div::trimExplode('UPDATE', $queryElements[0], 1);
			$table = $queryElements[0];

			$fields_values = array();
			$queryFieldsArray = preg_split('/[,]/', $queryFields, 1);
			foreach ($queryFieldsArray as $fieldsSet) {
				$col = t3lib_div::trimExplode('=', $fieldsSet, 1);
				$value = stripslashes(substr($col[1], 1, strlen($col[1])-2));
				$value = $csconv->conv($value, 'utf-8', $destEncoding);
				$fields_values[$col[0]] = $value;
			}

			$query = $GLOBALS['TYPO3_DB']->UPDATEquery($table,$where,$fields_values);				
		}
		return $query;
	}


	/**
	 * Convert the values of a SQL insert statement to a different encoding than UTF-8.
	 *
	 * @param string $query Insert statement like: INSERT INTO static_countries (field list) VALUES (values list);
	 * @param string $destEncoding Destination encoding
	 * @return string Converted insert statement
	 */
	function getInsertEncoded($query, $destEncoding) {
		static $csconv;

		if (!($destEncoding==='utf-8')) {
			if(!is_object($csconv)) {
				$csconv = t3lib_div::makeInstance('t3lib_cs');
			}

			$queryElements = explode('VALUES', $query);
			$queryElements = $queryElements[0];
			$queryValues = $queryElements[1];

			$queryValues = explode('(', $queryValues);
			$queryValues = $queryValues[1];
			$queryValues = explode(')', $queryValues);
			$queryValues = $queryValues[0];

			$queryElements = explode('(', $queryElements);
			$table = $queryElements[0];
			$queryFields = $queryElements[1];

			$table = trim(strstr($table, ' '));
			$queryFields = explode(')', $queryFields);
			$queryFields = $queryFields[0];


			$fields_values = array();
			$queryFieldsArray = preg_split('/[,]/', $queryFields, 1);
			$queryValuesArray = preg_split('/[,]/', $queryValues, 1);
			
			$nFields = count($queryFieldsArray);
			
			if( $nFields = count($queryValuesArray) ) {
				for($i = 0; $i < $nFields; $i++) {
					$fields_values[] = array($queryFieldsArray[$i] => $queryValuesArray[$i]);
				}
			}

			$query = $GLOBALS['TYPO3_DB']->INSERTquery($table,$fields_values);			
		}
		return $query;
	}


	function access() {
		return TRUE;
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/static_info_tables_pl/class.ext_update.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/static_info_tables_pl/class.ext_update.php']);
}
?>