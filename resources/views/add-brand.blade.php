<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Brand
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('brand.store') }}">
                        @csrf
                        <div class="flex justify-between">
                            <div>
                                <x-input-label
                                    for="brand_name"
                                    :value="__('brand_name')"
                                />
                                <x-text-input
                                    id="brand_name"
                                    type="text"
                                    name="brand_name"
                                    :value="old('brand_name')"
                                    required
                                    autofocus
                                ></x-text-input>
                            </div>
                            <div class="h-full flex items-center mt-4">
                                <button
                                    class="inline-block rounded border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
                                    type="submit"
                                >
                                    Add Brand
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
