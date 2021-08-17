<div class="md:py-40 lg:py-64 xl:py-72 relative py-16 overflow-hidden">
    <div class="md:space-y-0 md:flex md:items-center relative max-w-screen-xl px-8 mx-auto space-y-16">
        <div class="md:max-w-auto md:w-1/2 max-w-lg">
            <img class="w-full shadow-lg" src="{{ \App\Handle\ImageHandle::imageFirst($item->images) }}" alt="">
        </div>
        <div class="md:w-1/2 md:pl-8 lg:pl-24">
            <h1 class="sm:text-4xl lg:text-5xl lg:leading-tight xl:text-5xl text-3xl font-medium tracking-tight">{{$item->title}}</h1>
            <span class="bold">SKU: {{$item->product->sku . $item->sku}}</span>
            <div>
                <label>Type</label>
                {{$item->prices}}
                <select>
                    <option>123</option>
                    <option>123</option>
                    <option>123</option>
                </select>
            </div>
            <p class="sm:mt-5 md:max-w-2xl md:mt-8 md:text-lg max-w-xl mt-3 text-gray-600">Instant PHP Platforms on
                DigitalOcean, Linode, and more. Featuring push-to-deploy, Redis, queues, and everything else you could
                need to launch and deploy impressive Laravel applications.</p>
            <a class="group relative h-12 inline-flex w-64 border border-red-600 sm:w-56 focus:outline-none sm:mt-8 md:mt-10 mt-6"
               href="https://forge.laravel.com" target="_blank">
    <span
        class="absolute inset-0 inline-flex items-center justify-center self-stretch px-6 text-white text-center font-medium bg-red-600 ring-1 ring-red-600 ring-offset-1 ring-offset-red-600 transform transition-transform group-hover:-translate-y-1 group-hover:-translate-x-1 group-focus:-translate-y-1 group-focus:-translate-x-1">
        Learn More
    </span>
            </a>

        </div>
    </div>
</div>
