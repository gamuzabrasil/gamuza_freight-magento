<?php
/*
 * Gamuza Freight - This module offers freights functionality.
 * Copyright (C) 2013 Gamuza Technologies (http://www.gamuza.com.br/)
 * Author: Eneias Ramos de Melo <eneias@gamuza.com.br>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Library General Public
 * License as published by the Free Software Foundation; either
 * version 2 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Library General Public License for more details.
 *
 * You should have received a copy of the GNU Library General Public
 * License along with this library; if not, write to the
 * Free Software Foundation, Inc., 51 Franklin St, Fifth Floor,
 * Boston, MA  02110-1301, USA.
 */

/*
 * See the AUTHORS file for a list of people on the Gamuza Team.
 * See the ChangeLog files for a list of changes.
 * These files are distributed with Gamuza_Freight at http://code.google.com/p/gamuzaopen/.
 */

class Gamuza_Freight_Helper_Data
extends Mage_Core_Helper_Abstract
{
	public function validatePostcode ($rawPostcode)
	{
		$postCode = str_replace ('-', chr(0), $rawPostcode);
		if (empty ($postCode) || strlen ($postCode) != 8 || !is_numeric ($postCode))
		{
			// Mage::getSingleton('core/session')->addError(Mage::helper ('freight')->__('Please enter a valid ZIP code.'));
		
			return;
		}
	
		return $postCode;
	}

	public function formatShippingTime ($deliveryTime)
	{
		$plural = $deliveryTime > 1 ? 's' : chr (0);
		return chr(32) . Mage::helper ('freight')->__("Delivered within %d day%s", $deliveryTime, $plural) . chr(32);
	}
}