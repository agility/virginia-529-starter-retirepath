<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Services\AgilityService;


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



Route::get('/', function (AgilityService $agilityService) {

    //get the actual page object for this route
    $agilityPage = $agilityService->getPage("home");
    $siteHeader = $agilityService->getSiteHeader();

    return view(
        'agility',
        [
            'path' => "/",
            'agilityPage' => $agilityPage,
            'siteHeader' => $siteHeader
        ]
    );

});

//catchall route...
Route::get('/{any}', function ($any, Request $request, AgilityService $agilityService) {

    //get the actual page object for this route
    $agilityPage = $agilityService->getPage($any);
    $siteHeader = $agilityService->getSiteHeader();
    $dynamicPageItem = $agilityService->getDynamicPageItem($any);

    return view(
        'agility',
        [
            'path' => $any,
            'agilityPage' => $agilityPage,
            'siteHeader' => $siteHeader,
            'dynamicPageItem' => $dynamicPageItem
        ]
    );

})->where('any', '.*');

