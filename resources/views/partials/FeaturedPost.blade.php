@if ($module->fields->featuredPost !== null)
<div class="relative px-8 mb-8 ">
	<div class="flex flex-colX sm:flex-row max-w-screen-xl mx-auto pt-8 group">
		<div class="sm:w-1/2 lg:w-2/3 sm:rounded-t-none sm:rounded-l-lg relative">

			<a href="/blog/{{$module->fields->featuredPost->fields->slug}}" class="cursor-pointer block">
				<div class="h-64 sm:h-96 bg-no-repeat bg-cover bg-center rounded-t-lg sm:rounded-l-lg sm:rounded-t-none" style="background-image: url({{$module->fields->featuredPost->fields->image->url}}?w=500);">
				</div>
			</a>

		</div>
		<div class="sm:w-1/2 lg:w-1/3 bg-gray-100 p-8 border-2 border-t-0 rounded-b-lg sm:rounded-bl-none sm:rounded-r-lg sm:border-t-2 sm:border-l-0 relative">

			<a href="/blog/{{$module->fields->featuredPost->fields->slug}}" class="cursor-pointer">
				<div class="font-display uppercase text-primary-500 text-xs font-bold tracking-widest leading-loose after:content">
					{{$module->fields->featuredPost->fields->category->fields->title}}
				</div>
				<div class="border-b-2 border-primary-500 w-8"></div>
				<div class="mt-4 uppercase text-gray-600 italic font-semibold text-xs">

					{{ date('d-m-Y', strtotime($module->fields->featuredPost->fields->date)) }}

				</div>
				<h2 class="font-display text-secondary-500 mt-1 font-black text-2xl group-hover:text-primary-500 transition duration-300">
					{{$module->fields->featuredPost->fields->title}}
					</h2>
					<!-- <p class="text-sm mt-3 leading-loose text-gray-600 font-medium">
					{description}
				</p> -->
			</a>
			</Link>
		</div>
	</div>
</div>
@endif