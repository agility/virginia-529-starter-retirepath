<div class="relative px-8">
	<div class="flex flex-col md:flex-row justify-between max-w-screen-xl mx-auto py-20 md:py-24 items-center">
		<div class="md:w-6/12 flex-shrink-0 relative">

			<a href={{$module->fields->primaryButton->href}}>
				<img src="{{$module->fields->image->url}}" alt="{{$module->fields->image->label}}" width="768" height="512" class="rounded-lg object-cover object-center cursor-pointer" />
			</a>

		</div>





		<div @class([
			'md:w-6/12 mt-16 md:mt-0 md:mr-12 lg:mr-16' ,
			'md:mr-12 lg:mr-16 md:order-first'=> $module->fields->imagePosition != 'right',
			'md:ml-12 lg:ml-16 md:order-last' => $module->fields->imagePosition == 'right',
			])
			<div class="g:py-8 text-center md:text-left">

				<span class="font-bold text-primary-500 text-sm text-center md:text-left uppercase">
					{{$module->fields->tagline}}

				</span>

				<h2 class="font-display text-4xl font-black text-secondary-500 md:text-3xl lg:text-5xl tracking-wide text-center mt-4 lg:leading-tight md:text-left">

					{{$module->fields->title}}
				</h2>
				<p class="mt-4 text-center md:text-left text-sm md:text-base lg:text-lg font-medium leading-relaxed text-secondary-200">
					{{$module->fields->content}}
				</p>

				<a href="{{$module->fields->primaryButton->href}}" title="{{$module->fields->primaryButton->text}}" target="{{$module->fields->primaryButton->target}}" class="inline-block mt-8 md:mt-8 px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-primary-500 hover:bg-primary-700 focus:outline-none focus:border-primary-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
					{{$module->fields->primaryButton->text}}
				</a>

			</div>
		</div>
	</div>
</div>