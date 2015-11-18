<?php namespace Monscierge\Client;

trait PlaceRecommendations
{
	/**
	 * Get list of recommendations for a place.
	 *
	 * @param int $place_id    The ID of the place.
	 * @param int $category_Id The ID of the category.
	 *
	 * @return array
	 */
	public function placeRecommendations($place_id, $category_id = null)
	{
		$params = [];

		if (!empty($category_id)) {
			$params['categoryId'] = $category_id;
		}

		return $this->get('Places/'.$place_id.'/Recommendations', ['query' => $params]);
	}

	/**
	 * Get list of recommendation categories for a place.
	 * 
	 * @param int $place_id The ID of the place.
	 * 
	 * @return array
	 */
	public function placeRecommendationCategories($place_id)
	{
		return $this->get('Places/'.$place_id.'/Recommendations/Categories');
	}

	/**
	 * Get a single enterprise location for a place.
	 * 
	 * @param int $place_id               The ID of the place.
	 * @param int $enterprise_location_id The ID of the enterprise location.
	 * 
	 * @return array
	 */
	public function placeEnterpriseLocation($place_id, $enterprise_location_id)
	{
		return $this->get('Places/'.$place_id.'/Recommendations/'.$enterprise_location_id);
	}
}
