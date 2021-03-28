<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="border">Name</th>
                                <th class="border">Style</th>
                                <th class="border">Brand</th>
                                <th class="border"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="border">{{$product->product_name}}</td>
                                    <td class="border">{{$product->style}}</td>
                                    <td class="border">{{$product->brand}}</td>
                                    <td class="border">
                                        <a href="{{route('products.edit', $product->id)}}"
                                           title="Edit {{$product->product_name}}">
                                            Edit
                                        </a>
                                        -
                                        <a href="/products/delete/{{$product->id}}"
                                           title="Delete {{$product->product_name}}">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <p><strong>Total: {{count($products)}}</strong></p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
