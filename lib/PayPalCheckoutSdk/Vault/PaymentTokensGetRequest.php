<?php

namespace PayPalCheckoutSdk\Vault;

use PayPalHttp\HttpRequest;

class PaymentTokensGetRequest extends HttpRequest
{
	function __construct($tokenId = null, $customerId = null)
	{
		parent::__construct("/v2/vault/payment-tokens{token_element}", "GET");
		
		if( $tokenId ) {
			$this->path = str_replace("{token_element}", sprintf('/%s', urlencode($tokenId)), $this->path);
			
		} elseif( $customerId ) {
			$this->path = str_replace("{token_element}", sprintf('?customer_id=%s', urlencode($customerId)), $this->path);
			
		} else {
			$this->path = str_replace("{token_element}", '', $this->path);
		}
		
		$this->headers["Content-Type"] = "application/json";
	}
}
