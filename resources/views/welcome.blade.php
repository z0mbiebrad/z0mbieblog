<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>z0mbieblog</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Style -->
    @vite('resources/css/app.css')
</head>

<body class="antialiased bg-black">
    <div class="relative sm:justify-center sm:items-center min-h-screen bg-center bg-gray-100 dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <x-navigation />

        <section class="dark:bg-gray-800 dark:text-gray-100">
            <div class="container max-w-6xl p-6 mx-auto space-y-6 sm:space-y-12">
                <a rel="noopener noreferrer" href="#"
                    class="block max-w-sm gap-3 mx-auto sm:max-w-full group hover:no-underline focus:no-underline lg:grid lg:grid-cols-12 dark:bg-gray-900">
                    <img src="https://source.unsplash.com/random/480x360" alt=""
                        class="object-cover w-full h-64 rounded sm:h-96 lg:col-span-7 dark:bg-gray-500">
                    <div class="p-6 space-y-2 lg:col-span-5">
                        <h3 class="text-2xl font-semibold sm:text-4xl group-hover:underline group-focus:underline">
                            Noster tincidunt reprimique ad pro</h3>
                        <span class="text-xs dark:text-gray-400">February 19, 2021</span>
                        <p>Ei delenit sensibus liberavisse pri. Quod suscipit no nam. Est in graece fuisset, eos affert
                            putent doctus id.</p>
                    </div>
                </a>
                <div class="grid justify-center grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <a rel="noopener noreferrer" href="#"
                        class="max-w-sm mx-auto group hover:no-underline focus:no-underline dark:bg-gray-900">
                        <img role="presentation" class="object-cover w-full rounded h-44 dark:bg-gray-500"
                            src="https://source.unsplash.com/random/480x360?1">
                        <div class="p-6 space-y-2">
                            <h3 class="text-2xl font-semibold group-hover:underline group-focus:underline">In usu
                                laoreet repudiare legendos</h3>
                            <span class="text-xs dark:text-gray-400">January 21, 2021</span>
                            <p>Mei ex aliquid eleifend forensibus, quo ad dicta apeirian neglegentur, ex has tantas
                                percipit perfecto. At per tempor albucius perfecto, ei probatus consulatu patrioque mea,
                                ei vocent delicata indoctum pri.</p>
                        </div>
                    </a>
                    <a rel="noopener noreferrer" href="#"
                        class="max-w-sm mx-auto group hover:no-underline focus:no-underline dark:bg-gray-900">
                        <img role="presentation" class="object-cover w-full rounded h-44 dark:bg-gray-500"
                            src="https://source.unsplash.com/random/480x360?2">
                        <div class="p-6 space-y-2">
                            <h3 class="text-2xl font-semibold group-hover:underline group-focus:underline">In usu
                                laoreet repudiare legendos</h3>
                            <span class="text-xs dark:text-gray-400">January 22, 2021</span>
                            <p>Mei ex aliquid eleifend forensibus, quo ad dicta apeirian neglegentur, ex has tantas
                                percipit perfecto. At per tempor albucius perfecto, ei probatus consulatu patrioque mea,
                                ei vocent delicata indoctum pri.</p>
                        </div>
                    </a>
                    <a rel="noopener noreferrer" href="#"
                        class="max-w-sm mx-auto group hover:no-underline focus:no-underline dark:bg-gray-900">
                        <img role="presentation" class="object-cover w-full rounded h-44 dark:bg-gray-500"
                            src="https://source.unsplash.com/random/480x360?3">
                        <div class="p-6 space-y-2">
                            <h3 class="text-2xl font-semibold group-hover:underline group-focus:underline">In usu
                                laoreet repudiare legendos</h3>
                            <span class="text-xs dark:text-gray-400">January 23, 2021</span>
                            <p>Mei ex aliquid eleifend forensibus, quo ad dicta apeirian neglegentur, ex has tantas
                                percipit perfecto. At per tempor albucius perfecto, ei probatus consulatu patrioque mea,
                                ei vocent delicata indoctum pri.</p>
                        </div>
                    </a>
                    <a rel="noopener noreferrer" href="#"
                        class="max-w-sm mx-auto group hover:no-underline focus:no-underline dark:bg-gray-900 hidden sm:block">
                        <img role="presentation" class="object-cover w-full rounded h-44 dark:bg-gray-500"
                            src="https://source.unsplash.com/random/480x360?4">
                        <div class="p-6 space-y-2">
                            <h3 class="text-2xl font-semibold group-hover:underline group-focus:underline">In usu
                                laoreet repudiare legendos</h3>
                            <span class="text-xs dark:text-gray-400">January 24, 2021</span>
                            <p>Mei ex aliquid eleifend forensibus, quo ad dicta apeirian neglegentur, ex has tantas
                                percipit perfecto. At per tempor albucius perfecto, ei probatus consulatu patrioque mea,
                                ei vocent delicata indoctum pri.</p>
                        </div>
                    </a>
                    <a rel="noopener noreferrer" href="#"
                        class="max-w-sm mx-auto group hover:no-underline focus:no-underline dark:bg-gray-900 hidden sm:block">
                        <img role="presentation" class="object-cover w-full rounded h-44 dark:bg-gray-500"
                            src="https://source.unsplash.com/random/480x360?5">
                        <div class="p-6 space-y-2">
                            <h3 class="text-2xl font-semibold group-hover:underline group-focus:underline">In usu
                                laoreet repudiare legendos</h3>
                            <span class="text-xs dark:text-gray-400">January 25, 2021</span>
                            <p>Mei ex aliquid eleifend forensibus, quo ad dicta apeirian neglegentur, ex has tantas
                                percipit perfecto. At per tempor albucius perfecto, ei probatus consulatu patrioque mea,
                                ei vocent delicata indoctum pri.</p>
                        </div>
                    </a>
                    <a rel="noopener noreferrer" href="#"
                        class="max-w-sm mx-auto group hover:no-underline focus:no-underline dark:bg-gray-900 hidden sm:block">
                        <img role="presentation" class="object-cover w-full rounded h-44 dark:bg-gray-500"
                            src="https://source.unsplash.com/random/480x360?6">
                        <div class="p-6 space-y-2">
                            <h3 class="text-2xl font-semibold group-hover:underline group-focus:underline">In usu
                                laoreet repudiare legendos</h3>
                            <span class="text-xs dark:text-gray-400">January 26, 2021</span>
                            <p>Mei ex aliquid eleifend forensibus, quo ad dicta apeirian neglegentur, ex has tantas
                                percipit perfecto. At per tempor albucius perfecto, ei probatus consulatu patrioque mea,
                                ei vocent delicata indoctum pri.</p>
                        </div>
                    </a>
                </div>
                <div class="flex justify-center">
                    <button type="button"
                        class="px-6 py-3 text-sm rounded-md hover:underline dark:bg-gray-900 dark:text-gray-400">Load
                        more posts...</button>
                </div>
            </div>
        </section>
</body>

</html>