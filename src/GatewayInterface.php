<?php

namespace dekuan\depay;


/**
 *	Payment gateway interface
 *
 *	This interface class defines the standard functions that any
 *	DePay gateway needs to define.
 *
 *	@see AbstractGateway
 *
 *	@method \dekuan\depay\Message\RequestInterface authorize(array $options = array())         (Optional method)
 *	Authorize an amount on the customers card
 * 
 *	@method \dekuan\depay\Message\RequestInterface completeAuthorize(array $options = array()) (Optional method)
 *	Handle return from off-site gateways after authorization
 * 
 *	@method \dekuan\depay\Message\RequestInterface capture(array $options = array())           (Optional method)
 *	Capture an amount you have previously authorized
 * 
 *	@method \dekuan\depay\Message\RequestInterface purchase(array $options = array())          (Optional method)
 *	Authorize and immediately capture an amount on the customers card
 * 
 *	@method \dekuan\depay\Message\RequestInterface completePurchase(array $options = array())  (Optional method)
 *	Handle return from off-site gateways after purchase
 * 
 *	@method \dekuan\depay\Message\RequestInterface refund(array $options = array())            (Optional method)
 *	Refund an already processed transaction
 * 
 *	@method \dekuan\depay\Message\RequestInterface void(array $options = array())              (Optional method)
 *	Generally can only be called up to 24 hours after submitting a transaction
 * 
 *	@method \dekuan\depay\Message\RequestInterface createCard(array $options = array())        (Optional method)
 *	The returned response object includes a cardReference, which can be used for future transactions
 * 
 *	@method \dekuan\depay\Message\RequestInterface updateCard(array $options = array())        (Optional method)
 *	Update a stored card
 * 
 *	@method \dekuan\depay\Message\RequestInterface deleteCard(array $options = array())        (Optional method)
 *	Delete a stored card
 */
interface GatewayInterface
{
	/**
	 *	Get gateway display name
	 *
	 *	This can be used by carts to get the display name for each gateway.
	 */
	public function getName();

	/**
	 *	Get gateway short name
	 *
	 *	This name can be used with GatewayFactory as an alias of the gateway class,
	 *	to create new instances of this gateway.
	 */
	public function getShortName();

	/**
	 *	Define gateway parameters, in the following format:
	 *
	 *	array(
	 *		'username' => '', // string variable
	 *		'testMode' => false, // boolean variable
	 *		'landingPage' => array('billing', 'login'), // enum variable, first item is default
	 *	);
	 */
	public function getDefaultParameters();

	/**
	 *	Initialize gateway with parameters
	 *
	 *	@param $arrParameters
	 */
	public function initialize( Array $arrParameters = [] );

	/**
	 *	Get all gateway parameters
	 *
	 *	@return array
	 */
	public function getParameters();
}
