<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add product
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form
                        method="post"
                        action="{{ route('product.store') }}"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="flex justify-between">
                            <div>
                                <x-input-label
                                    for="title"
                                    :value="__('title')"
                                />
                                <x-text-input
                                    id="title"
                                    type="text"
                                    name="title"
                                    :value="old('title')"
                                    required
                                    autofocus
                                ></x-text-input>
                            </div>
                            <div>
                                <x-input-label
                                    for="description"
                                    :value="__('description')"
                                />
                                <x-text-input
                                    id="description"
                                    type="text"
                                    name="description"
                                    :value="old('description')"
                                    required
                                    autofocus
                                ></x-text-input>
                            </div>
                            <div>
                                <x-input-label
                                    for="category"
                                    :value="__('category')"
                                />
                                <select class="w-40" name="category" id="">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->category_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-input-label
                                    for="brand"
                                    :value="__('brand')"
                                />
                                <select class="w-40" name="brand" id="">
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->id}}">
                                        {{$brand->brand_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <!-- <x-input-label
                                    for="thumbnail"
                                    :value="__('thumbnail')"
                                />
                                <x-text-input
                                    id="thumbnail"
                                    type="file"
                                    name="thumbnail"
                                    :value="old('thumbnail')"
                                    required
                                    autofocus
                                ></x-text-input> -->
                                <div
                                    class="flex w-full items-center justify-center bg-grey-lighter"
                                >
                                    <label
                                        class="w-64 mt-3 flex flex-col items-center bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white"
                                    >
                                        <svg
                                            class="w-8 h-8"
                                            fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                        >
                                            <path
                                                d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"
                                            />
                                        </svg>
                                        <span class="text-base leading-normal"
                                            >Select a file</span
                                        >
                                        <input
                                            type="file"
                                            name="thumbnail"
                                            class="hidden"
                                        />
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!--  -->

                        <div class="flex gap-6 mt-14 items-center">
                            <div>
                                <x-input-label
                                    for="purchase_price"
                                    :value="__('purchase_price')"
                                />
                                <x-text-input
                                    id="purchase_price"
                                    type="text"
                                    name="purchase_price"
                                    :value="old('purchase price')"
                                    required
                                    autofocus
                                ></x-text-input>
                            </div>
                            <div>
                                <x-input-label
                                    for="retail_price"
                                    :value="__('retail_price')"
                                />
                                <x-text-input
                                    id="retail_price"
                                    type="text"
                                    name="retail_price"
                                    :value="old('retail_price')"
                                    required
                                    autofocus
                                ></x-text-input>
                            </div>
                            <div>
                                <x-input-label
                                    for="stock"
                                    :value="__('stock')"
                                />
                                <x-text-input
                                    id="stock"
                                    type="text"
                                    name="stock"
                                    :value="old('stock')"
                                    required
                                    autofocus
                                ></x-text-input>
                            </div>
                            <div class="h-full flex items-center mt-4">
                                <button
                                    class="inline-block rounded border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
                                    type="submit"
                                >
                                    Add product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
