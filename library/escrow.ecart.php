<?php
	function ECommerceBuyNowButtonEscrowECart($EscrowURL="https://my.escrow.com/ecart/StartTransaction.asp", $AffiliateID="4226", $ItemName="", $ItemDescription="", $Quantity=1, $UnitPrice=0, $ShippingCostBuyer=0, $ButtonCaption="Buy It Now", $MultipleItemParticularSeperator="|"){
	    /*
	        Creates the button to send the user to pay over Escrow.Com
	        
	        $EscrowURL (string)							= URL to submit the form data to;
	        $AffiliateID (integer)						= The affiliation ID of the Escrow.Com account to use;
	        $ItemName (string|array)					= For a single item, the item name is passed, otherwise, an array is passed with each item name as an element to the array;
	        $ItemDescription (string|array)				= For a single item, the item description is passed, otherwise, an array is passed with each item description as an element to the array;
	        $Quantity (integer|array)					= For a single item, the quantity is passed, otherwise, an array is passed with each quantity as an element to the array;
	        $UnitPrice (float|array)					= For a single item, the unit price is passed, otherwise, an array is passed with each unit price as an element to the array;
			$ShippingCostBuyer (float)					= The cost for the shipping that the buyer has to pay;
			$ButtonCaption ()							= Caption to the the submit button;
			$MultipleItemParticularSeperator (string)	= Seperator to marge multiple item particulars;
	    */
	    $MultipleItemParticularSeperator="|";
	    if(is_array($ItemName))$ItemName=implode($MultipleItemParticularSeperator, $ItemName);
	    if(is_array($ItemDescription))$ItemDescription=implode($MultipleItemParticularSeperator, $ItemDescription);
	    if(is_array($Quantity))$Quantity=implode($MultipleItemParticularSeperator, $Quantity);
	    if(is_array($UnitPrice))$UnitPrice=implode($MultipleItemParticularSeperator, $UnitPrice);

	    $HTML="
			<form method=\"post\" action=\"$EscrowURL\">
				<input type=hidden name=\"pid\" value=\"$AffiliateID\">
				<input type=hidden name=\"item\" value=\"$ItemName\">
				<input type=hidden name=\"desc\" value=\"$ItemDescription\">
				<input type=hidden name=\"qty\" value=\"$Quantity\">
				<input type=hidden name=\"price\" value=\"$UnitPrice\">
				<input type=hidden name=\"ship\" value=\"$ShippingCostBuyer\">
				<input type=hidden name=\"type\" value=\"GM\">
				<input type=submit name=\"submit\" value=\"$ButtonCaption\">
			</form>
		";
		
		return $HTML;
	}
?>
