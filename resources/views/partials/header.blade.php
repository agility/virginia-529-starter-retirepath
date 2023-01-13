<header class="relative w-full mx-auto bg-white px-8">
	<div class="max-w-screen-xl mx-auto">
		<div class="flex justify-between items-center py-6 md:justify-start md:space-x-10">
			<div class="lg:w-0 lg:flex-1">

				<a href="/" class="flex items-center">
					<img class="h-14 sm:h-12 w-auto " src="{{$siteHeader["item"]->fields->logo->url}}" alt="{{$siteHeader["item"]->fields->logo->label}}" />

				</a>
			</div>

			<nav class="hidden md:flex space-x-10">

				@foreach ($siteHeader["links"] as $link)
				<a href="{{ $link['path'] }}" class="text-base leading-6 font-medium text-secondary-500 hover:text-primary-500 border-transparent border-b-2 hover:border-primary-500 hover:border-b-primary hover:border-b-2 focus:outline-none focus:text-primary-500 transition duration-300">
					{{ $link['title'] }}
				</a>
				@endforeach

			</nav>
		</div>
	</div>

</header>