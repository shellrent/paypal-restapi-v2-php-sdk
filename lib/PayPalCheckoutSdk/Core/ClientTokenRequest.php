<?php

namespace PayPalCheckoutSdk\Core;

use PayPalHttp\HttpRequest;

class ClientTokenRequest extends HttpRequest
{
    public function __construct(PayPalEnvironment $environment, ?string $customerId = null)
    {
        parent::__construct("/v1/identity/generate-token", "POST");
	    
        if( $customerId ) {
        	$this->headers['Content-type'] = 'application/json';
	        $this->body = [
	        	'customer_id' => $customerId,
	        ];
        }
    }
}

