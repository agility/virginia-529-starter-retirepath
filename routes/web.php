<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$apiKey = $_ENV["AGILITY_API_PREVIEW_KEY"];
$guid = $_ENV["AGILITY_GUID"];
$apitype = "preview"; //or fetch for live content...
$locale = "en-us";

// Configure API key authorization: APIKeyAuthorization
$agilityConfig = Agility\Client\Configuration::getDefaultConfiguration()->setApiKey("APIKey", $apiKey);
$apiSitemap = new Agility\Client\Api\SitemapApi(new GuzzleHttp\Client(), $agilityConfig);
$apiPage = new Agility\Client\Api\PageApi(new GuzzleHttp\Client(), $agilityConfig);

//get the pages in the sitemap...
$sitemapFlat = $apiSitemap->getSitemapFlat($guid, $apitype, $locale, "website");

Config::set('agilityConfig', $agilityConfig);
Config::set('sitemapFlat', $sitemapFlat);
Config::set('apiPage', $apiPage);
Config::set('guid', $guid);
Config::set('apitype', $apitype);
Config::set('locale', $locale);


//add routes to all the pages...
foreach ($sitemapFlat as $i => $value) {
    Route::get($i, function () {

        $path = Route::getFacadeRoot()->current()->uri();
        $sitemap = Config::get('sitemapFlat');
        $apiPage = Config::get('apiPage');

        $node = $sitemap["/$path"];

        $pageID = $node->pageID;

        $guid = Config::get('guid');
        $apitype = Config::get('apitype');
        $locale = Config::get('locale');

        //get the actual page object for this route
        $agilityPage = $apiPage->getPage($guid, $apitype, $locale, $pageID);

        return view(
            'agility',
            [
                'path' => $path,
                'agilitySitemapNode' => $node,
                'agilityPage' => $agilityPage
            ]
        );
    });
}

Route::get('/', function () {
    return view('welcome');
});
