<?php namespace Monscierge\Client;

trait Images
{
	/**
	 * Get the full URL to an image path.
	 *
	 * @param string $path       The path to the image to use.
	 * @param float  $width      The width the image should sized to.
	 * @param float  $height     The width the image should sized to.
	 * @param float  $max_width  The maximum width the image should be.
	 * @param float  $max_height The maximum width the image should be.
	 * @param string $mode       The scaling mode for the image.
	 *
	 */
	public function imageUrl($path, $width = null, $height = null, $max_width = null, $max_height = null, $mode = null)
	{
		if (empty($mode)) {
			$mode = 'zoom';
		}

		$params = [
			'filename' => $path,
			'png'      => false,
		];

		if (!empty($width)) {
			$params['width'] = $width;
		}

		if (!empty($height)) {
			$params['height'] = $height;
		}

		if (!empty($max_width)) {
			$params['max_width'] = $max_width;
		}
		
		if (!empty($max_height)) {
			$params['max_height'] = $max_height;
		}
		
		if (!empty($mode)) {
			$params['mode'] = $mode;
		}

		$url = 'https://content.monscierge.com/MonsciergeImaging/getImage.ashx?';
		$url .= http_build_query($params);

		return $url;
	}
}
