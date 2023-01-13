@inject('agilityService', 'App\Services\AgilityService')

@php
    $listName = $module->fields->links->referencename;
    $links = null;
    if ($listName !== null) {
        $links = $agilityService->getContentList($listName, 20, 0);
    }

@endphp

@if ($links !== null && count($links->items) > 0)

    <div class="relative px-8">
        <div class="max-w-screen-xl mx-auto my-12 md:mt-18 lg:mt-20">
            <div class="flex gap-2">
                @foreach ($links->items as $link)
                    <div class="flex-1 text-center space-y-2 border border-gray-400  rounded-md p-4">
                        <h3 class="font-bold text-lg">{{ $link->fields->title }}</h3>
                        <div class="flex justify-center">
                            <img src="{{ $link->fields->image->url }}" alt="{{ $link->fields->image->label }}"
                                class="h-20 rounded-full" />
                        </div>
                        <div>
                            {{ $link->fields->content }}
                        </div>
                        <div>
                            <a href="{{ $link->fields->cTA->href }}"
                                class="px-2 py-1 bg-gray-100 rounded hover:bg-gray-200">{{ $link->fields->cTA->text }}</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

@endif
