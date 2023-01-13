<div class="relative px-8">
    <div class="flex flex-col md:flex-row justify-between max-w-screen-xl mx-auto py-10 items-center gap-4">
        <div class="md:w-6/12 flex-shrink-0 relative">

            <img src="{{ $module->fields->image->url }}" alt="{{ $module->fields->image->label }}" width="768"
                height="512" class="rounded-lg object-cover object-center cursor-pointer" />

        </div>

        <div @class([
            'md:w-6/12 mt-16 md:mt-0 md:mr-12 lg:mr-16',
            'md:mr-12 lg:mr-16 md:order-last' =>
                $module->fields->imagePosition != 'right',
            'md:ml-12 lg:ml-16 md:order-first' =>
                $module->fields->imagePosition == 'right',
        ])>
            <div class="g:py-8 text-center md:text-left">

                <h2
                    class="font-display text-4xl font-bold text-secondary-500 md:text-3xl lg:text-5xl tracking-wide text-center mt-4 lg:leading-tight md:text-left">

                    {{ $module->fields->title }}
                </h2>
                <p
                    class="mt-4 text-center md:text-left text-sm md:text-base lg:text-lg font-medium leading-relaxed text-secondary-200">
                    {{ $module->fields->content }}
                </p>


            </div>
        </div>
    </div>
</div>
