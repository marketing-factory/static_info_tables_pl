<?php
namespace SJBR\StaticInfoTables\Domain\Model;
/***************************************************************
*  Copyright notice
*
*  (c) 2011-2012 Armin Rüdiger Vieweg <info@professorweb.de>
*  (c) 2013 Stanislas Rolland <typo3(arobas)sjbr.ca>
*  (c) 2015 Tomasz Krawczyk <tomasz(na)typo3.pl>
*
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
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
/**
 * The Country model
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Country extends AbstractEntity {
	/**
	 * The Polish short name
	 * @var string
	 */
	protected $shortNamePl = '';

	/**
	 * The Polish official name
	 * @var string
	 */
	protected $officialNamePl = '';

	/**
	 * The Polish capital name
	 * @var string
	 */
	protected $capitalPl = '';
	
	/**
	 * Sets the Polish short name.
	 *
	 * @param string $shortNamePl
	 *
	 * @return void
	 */
	public function setShortNamePl($shortNamePl) {
		$this->shortNamePl = $shortNamePl;
	}

	/**
	 * Gets the Polish short name.
	 *
	 * @return string
	 */
	public function getShortNamePl() {
		return $this->shortNamePl;
	}

	/**
	 * Sets the Polish short name.
	 *
	 * @param string $officialNamePl
	 *
	 * @return void
	 */
	public function setOfficialtNamePl($officialNamePl) {
		$this->officialNamePl = $officialNamePl;
	}

	/**
	 * Gets the Polish short name.
	 *
	 * @return string
	 */
	public function getOfficialNamePl() {
		return $this->officialNamePl;
	}

	/**
	 * Sets the Polish short name.
	 *
	 * @param string $capitalPl
	 *
	 * @return void
	 */
	public function setCapitalPl($capitalPl) {
		$this->capitalPl = $capitalPl;
	}

	/**
	 * Gets the Polish short name.
	 *
	 * @return string
	 */
	public function getCapitalPl() {
		return $this->capitalPl;
	}
	
}
