<?php

namespace App\Services;

use Agility\Client\Configuration;
use Agility\Client\Api;
use GuzzleHttp;

class AgilityService
{
	const MINIMUM_QUANTITY = 1;


	protected $apiKey;
	protected $guid;
	protected $apitype;
	protected $locale;

	protected $agilityConfig;
	protected $apiSitemap;
	protected $apiPage;
	protected $apiContentList;
	protected $apiContentItem;

	protected $sitemapFlat = null;


	/**
	 * Initialize the service
	 *
	 */
	public function __construct()
	{

		$this->apiKey = $_ENV["AGILITY_API_PREVIEW_KEY"];
		$this->guid = $_ENV["AGILITY_GUID"];
		$this->apitype = "preview"; //or fetch for live content...
		$this->locale = "en-us";

		// Configure API key authorization: APIKeyAuthorization
		$this->agilityConfig =  Configuration::getDefaultConfiguration()->setApiKey("APIKey", $this->apiKey);
		$this->apiSitemap = new Api\SitemapApi(new GuzzleHttp\Client(), $this->agilityConfig);
		$this->apiPage = new Api\PageApi(new GuzzleHttp\Client(), $this->agilityConfig);
		$this->apiContentList = new Api\ListApi(new GuzzleHttp\Client(), $this->agilityConfig);
		$this->apiContentItem = new Api\ItemApi(new GuzzleHttp\Client(), $this->agilityConfig);
	}


	/**
	 * Returns some content
	 *
	 */
	public function getContentList($referenceName)
	{
		return $this->apiContentList->getContentList($this->guid, $this->apitype, $this->locale, $referenceName);
	}

	public function getSitemapFlat()
	{

		if ($this->sitemapFlat == null) {
			$this->sitemapFlat =  $this->apiSitemap->getSitemapFlat($this->guid, $this->apitype, $this->locale, "website");
		}
		return $this->sitemapFlat;
	}

	public function getSitemapNested()
	{
		return  $this->apiSitemap->getSitemapNested($this->guid, $this->apitype, $this->locale, "website");
	}

	public function getPage($path)
	{

		$sitemap = $this->getSitemapFlat();
		$node = $sitemap["/$path"];

		$pageID = $node->pageID;

		return  $this->apiPage->getPage($this->guid, $this->apitype, $this->locale, $pageID);
	}



	/**
	 * Get the site header content that we need for this site
	 */
	public function getSiteHeader()
	{

		$sitemapNested = $this->getSitemapNested();
		$headerList = $this->getContentList("siteheader");

		$item = $headerList->items[0];


		$links = array();

		foreach ($sitemapNested as $node) {

			if ($node->visible->menu == 1) {
				array_push($links, [
					"title" => $node->title,
					"path" => $node->path,
				]);
			}


		}

		return [
			'item' => $item,
			'links' => $links
		];
	}
}
