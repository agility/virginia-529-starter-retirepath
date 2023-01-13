@if ($dynamicPageItem !== null)

@php
$post = $dynamicPageItem->fields;
$category = "";
if ($post->category != null) {
$category = $post->category->fields->title;
}
@endphp

<div class="relative px-8">
	<div class="max-w-screen-xl mx-auto">
		<div class="relative justify-center bg-red-200 bg-no-repeat bg-cover h-[500px] rounded bg-center" style="background-image: url({{$post->image->url}});">

		</div>
		<div class="max-w-2xl mx-auto mt-4">
			<div class="text-xs font-bold leading-loose tracking-widest uppercase text-primary-500">
				{{$category}}
			</div>
			<div class="w-8 border-b-2 border-primary-500"></div>
			<div class="mt-4 text-xs italic font-semibold text-gray-600 uppercase">
				{{ date('d-m-Y', strtotime($post->date)) }}
			</div>
			<h1 class="my-6 text-4xl font-bold font-display text-secondary-500">
				{{ $post->title }}
			</h1>

			<div class="max-w-full mb-20 prose">
				{!! $post->content !!}
			</div>
		</div>
	</div>
</div>

@endif