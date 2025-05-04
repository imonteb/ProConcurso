<x-layouts.app-web :title="__('Home')">
    <div class="">

        <div class="relative text-center">
            <img
                src="{{ Storage::url('portada.jpg') }}"
                alt="img" />
            <div class="w-full absolute top-0 left-0 text-center mt-0 md:mt-50">
                <h1 class="text-5xl lg:text-7xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">
                    Welcome to
                    <span class="text-red-500">
                        ProConcurso
                    </span>
                </h1>
            </div>
        </div>
    </div>
    <div class=" ">
            <a href="/zip" class="text-red-500  text-6xl">ZipCodes</a>
            <h1 class="text-2xl text-blue-700">Zip Code View</h1>
        </div>
        <div>
            <a href="/admin" class="text-red-500  text-6xl">Admin</a>
        </div>

    @if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
    @endif

</x-layouts.app-web>