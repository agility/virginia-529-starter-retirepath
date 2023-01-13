@inject('agilityService', 'App\Services\AgilityService')

@php
    //secondary data access
    $faqs = $agilityService->getContentList('faqs', 100, 0);

@endphp


<div class="relative px-8">
    <div class="max-w-screen-xl mx-auto my-12 md:mt-18 lg:mt-20">
        <div class="">
            @foreach ($faqs->items as $faq)
                @php
                    $category = 'No Category';

                    if (property_exists($faq->fields, 'category')) {
                        $category = $faq->fields->category->fields->title;
                    }

                @endphp
                <div class="mt-4">
                    <div class="uppercase text-sm font-bold">{{ $category }}</div>
                    <div class="text-lg bg-gray-100 px-2 rounded my-3">{{ $faq->fields->title }}</div>
                    <div>{!! $faq->fields->answer !!}</div>

                </div>
            @endforeach
        </div>
    </div>
</div>
