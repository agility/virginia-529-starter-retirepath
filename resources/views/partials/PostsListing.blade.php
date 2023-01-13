@inject('agilityService', 'App\Services\AgilityService')

@php

$posts = $agilityService->getContentList("posts", 10, 0);
$sitemapFlat = $agilityService->getSitemapFlat();

@endphp


@if ($posts === null || count($posts->items) <= 0) <div class="mt-44 px-6 flex flex-col items-center justify-center">
	<h1 class="text-3xl text-center font-bold">No posts available.</h1>
	<div class="my-10">
		<a href="/" class="px-4 py-3 my-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-primary-600 hover:bg-primary-500 focus:outline-none focus:border-primary-700 focus:shadow-outline-primary transition duration-300">
			Return Home
		</a>
	</div>
	</div>

	@else


	<section class="relative px-8 mb-12">
		<div class="max-w-screen-xl mx-auto">
			<div class="sm:grid sm:gap-8 sm:grid-cols-2 lg:grid-cols-3">
				@foreach($posts->items as $post)

				@php
				$url = "#";
				foreach ($sitemapFlat as $key => $node) {

				if (property_exists($node, 'contentID') && $node->contentID === $post->contentID) {
				$url = $node->path;
				}
				}
				@endphp

				<a href="{{ $url }}">
					<div class="flex-col group mb-8 md:mb-0">
						<div class="relative h-64 overflow-hidden bg-cover bg-center rounded-t-lg" style="background-image: url({{$post->fields->image->url}});">
						</div>
						<div class="bg-gray-100 p-8 border-2 border-t-0 rounded-b-lg">
							<div class="uppercase text-primary-500 text-xs font-bold tracking-widest leading-loose">
								{{ $post->fields->category !== null ? $post->fields->category->fields->title : "Uncategorized" }}
							</div>
							<div class="border-b-2 border-primary-500 w-8"></div>
							<div class="mt-4 uppercase text-gray-600 italic font-semibold text-xs">
								{{ date('d-m-Y', strtotime($post->fields->date)) }}

							</div>
							<h2 class="text-secondary-500 mt-1 font-black text-2xl group-hover:text-primary-500 transition duration-300">
								{{ $post->fields->title }}
							</h2>
						</div>
					</div>
				</a>

				@endforeach
			</div>
		</div>
	</section>


	@endif