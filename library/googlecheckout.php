<?php
	function ECommerceGoogleCheckOutBuyNowButton(
	    $Name,
	    $Description,
	    $UnitPrice,
	    $Quantity,
	    $MerchantID,
	    $MerchantKey,
	    $ButtonImageURL="https://checkout.google.com/buttons/buy.gif?merchant_id=356676548526448&amp;w=117&amp;h=48&amp;style=white&amp;variant=text&amp;loc=en_US",
	    $CurrencyCode="USD",
		$ReturnButtonCaption="Continue shopping items",
		$ShippingFlatName="",
		$ShippingFlatCost=0
	){
	    $GatewayURL="https://checkout.google.com/cws/v2/Merchant/$MerchantID/checkout";

	    //Create a checkout shopping cart
		$Cart="
			<?phpxml version=\"1.0\" encoding=\"UTF-8\"?>
			<checkout-shopping-cart xmlns=\"http://checkout.google.com/schema/2\">
				<shopping-cart>
					<items>
		";
		foreach($Name as $ThisName){
		    $ThisDescription=$Description[array_search($ThisName, $Name)];
		    $ThisUnitPrice=$UnitPrice[array_search($ThisName, $Name)];
		    $ThisQuantity=$Quantity[array_search($ThisName, $Name)];

			$Cart.="
						<item>
				        	<item-name>$ThisName</item-name>
					        <item-description>$ThisName</item-description>
					        <unit-price currency=\"$CurrencyCode\">$ThisUnitPrice</unit-price>
					        <quantity>$ThisQuantity</quantity>
						</item>
			";
		}
		$Cart.="
					</items>
				</shopping-cart>


				<checkout-flow-support>
					<merchant-checkout-flow-support>
						<shipping-methods>
							<flat-rate-shipping name=\"$ShippingFlatName\">
								<price currency=\"USD\">$ShippingFlatCost</price>
							</flat-rate-shipping>
						</shipping-methods>
					</merchant-checkout-flow-support>
				</checkout-flow-support>


  			</checkout-shopping-cart>
		";

		//Create a signature
		$Signature=CalcHmacSha1($Cart, $MerchantKey);
		//Base64-encode the cart
		$Base64Encoded_Cart=base64_encode($Cart);
		//Base64-encode the signature
		$Base64Encoded_Signature=base64_encode($Signature);

		return "
		    <div align=\"right\">
				<form action=\"$GatewayURL\" id=\"BB_BuyButtonForm\" method=\"post\" name=\"BB_BuyButtonForm\">
				    <input name=\"cart\" type=\"hidden\" value=\"$Base64Encoded_Cart\">
				    <input name=\"signature\" type=\"hidden\" value=\"$Base64Encoded_Signature\">
				    <img src=\"../images/google_checkout_logo.gif\">
				    <input type=\"image\" src=\"$ButtonImageURL\" alt=\"Buy now!\">
				    <!--<input type=\"button\" onclick=\"window.location.href='$ReturnURL'\" value=\"$ReturnButtonCaption\">-->
				</form>
			</div>
		";
	}

	function CalcHmacSha1($data, $key) {
	    $blocksize = 64;
	    $hashfunc = 'sha1';

	    if (strlen($key) > $blocksize)$key = pack('H*', $hashfunc($key));

	    $key = str_pad($key, $blocksize, chr(0x00));
	    $ipad = str_repeat(chr(0x36), $blocksize);
	    $opad = str_repeat(chr(0x5c), $blocksize);
	    $hmac = pack('H*', $hashfunc(($key^$opad).pack('H*', $hashfunc(($key^$ipad).$data))));
	    return $hmac;
	}
?>
