<!-- use Illuminate\Support\Facades\Route;
$currentPath= Route::getFacadeRoot()->current()->uri(); -->


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $agilityPage->title  }} | Laravel + Agility</title>

    @vite('resources/css/app.css')

</head>

<body class="antialiased">



    <div className="flex flex-col min-h-screen">

        @include("partials.header", ['siteHeader' => $siteHeader])

        <main>

            <!-- Loop the zones -->
            @foreach($agilityPage->zones as $zoneName => $zone)
            <!-- Loop the modules -->
            @foreach($zone as $module)
            <!-- output the module in a partial blade -->
            @if ($module->item !== null)
            @include("partials.$module->module", ["module" => $module->item, "dynamicPageItem" => $dynamicPageItem])
            @endif

            @endforeach
            @endforeach

        </main>


    </div>

    @include("partials.footer")
</body>

</html>