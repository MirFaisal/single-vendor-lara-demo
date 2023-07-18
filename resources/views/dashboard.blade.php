<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Dashboard") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div
                        className="overflow-x-auto rounded-lg border border-gray-200"
                    >
                        <table
                            style="width: 100%"
                            className="min-w-full divide-y-2 divide-gray-200 bg-white text-sm"
                        >
                            <thead className="ltr:text-left rtl:text-right">
                                <tr class="border">
                                    <th
                                        className="whitespace-nowrap px-4 py-2  font-medium text-center text-gray-900"
                                    >
                                        title
                                    </th>
                                    <th
                                        className="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                                    >
                                        description
                                    </th>
                                    <th
                                        className="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                                    >
                                        category
                                    </th>
                                    <th
                                        className="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                                    >
                                        brand
                                    </th>
                                    <th
                                        className="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                                    >
                                        purchase_price
                                    </th>
                                    <th
                                        className="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                                    >
                                        retail_price
                                    </th>
                                    <th
                                        className="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                                    >
                                        stock
                                    </th>
                                </tr>
                            </thead>

                            <tbody className="divide-y divide-gray-200">
                                @foreach($products as $product)
                                <tr class="text-center border">
                                    <td
                                        className="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                                    >
                                        {{substr($product->title,0,15) }}...
                                    </td>
                                    <td
                                        className="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                                    >
                                        {{substr($product->description,0,15)



                                        }}...
                                    </td>
                                    <td
                                        className="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                                    >
                                        {{$product->getCategoryName($product->category)}}
                                    </td>
                                    <td
                                        className="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                                    >
                                        {{$product->getBrandName($product->brand)}}
                                    </td>
                                    <td
                                        className="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                                    >
                                        {{$product->purchase_price}}
                                    </td>
                                    <td
                                        className="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                                    >
                                        {{$product->retail_price}}
                                    </td>
                                    <td
                                        className="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                                    >
                                        {{$product->stock}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
