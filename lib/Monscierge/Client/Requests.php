<?php namespace Monscierge\Client;

trait Requests
{
	/**
	 * Create a new request.
	 *
	 * @param int    $template_id The ID of the template.
	 * @param array  $options     List of options to set.
	 * @param int    $user_id     The user ID that is creating the request.
	 * @param string $message     A message to add to the request.
	 * @param int    $request_id  The request ID to link the new request to.
	 * @param int    $eta         Set the ETA the request should be completed in seconds from now.
	 * @param string $sms
	 *
	 * @return int The new request ID created.
	 */
	public function createRequest($template_id, $options = [], $user_id = null, $message = null, $eta = null, $request_id = null, $sms = null)
	{
		$params = [
			'templateId' => $template_id,
		];

		$options = (array) $options;

		if (!empty($user_id)) {
			$params['requesterUserId'] = $user_id;
		}
		
		if (!empty($message)) {
			$params['additionalDesc'] = $message;
		}
		
		if (!empty($eta)) {
			$params['etaSecondsFromNow'] = $eta;
		}

		if (!empty($request_id)) {
			$params['relatedRequestId'] = $request_id;
		}
		
		if (!empty($sms)) {
			$params['sms'] = $sms;
		}

		return $this->put('Requests', [
			'query' => $params,
			'json'  => $options,
		]);
	}

	/**
	 * Create a message for a request.
	 * 
	 * @param int    $request_id The ID of the request.
	 * @param string $message    The message to add to the request.
	 * @param int    $eta        Change the ETA the request should be completed in seconds.
	 * @param bool   $type       Whether or not the message should be private.
	 * 
	 * @return int The new request action ID created.
	 */
	public function createRequestMessage($request_id, $message, $eta = null, $private = false)
	{
		$params = [
			'message'   => $message,
			'isPrivate' => $private ? 'true' : 'false',
		];

		if (!empty($eta)) {
			$params['etaSeconds'] = $eta;
		}

		return $this->put('Requests/'.$request_id.'/Messages', ['query' => $params]);
	}
}
