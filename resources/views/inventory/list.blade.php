<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Inventory') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                {{-- form create --}}
                <form action="{{ route('inventory.list') }}" method="get">
                    <input type="text" name="search"
                           placeholder="Search for Product ID or Sku" />
                    <input type="submit" value="Search"
                    class="inline-flex items-center justify-center px-4 py-2 text-sm font-bold tracking-wider text-gray-600 uppercase transition bg-white border border-transparent rounded shadow select-none focus:border-gray-400 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-gray-400 focus:ring-opacity-30 disabled:opacity-50" />
                </form>
                @if (!empty($searchString))
                    <p class="py-2">Showing results for "{{$searchString}}"</p>
                @endif
            </div>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto">
                        <thead>
                        <tr>
                            <th class="border">Product Name</th>
                            <th class="border">SKU</th>
                            <th class="border">Quantity</th>
                            <th class="border">Color</th>
                            <th class="border">Size</th>
                            <th class="border">Price</th>
                            <th class="border">Cost</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($inventories as $inventory)
                            <tr>
                                <td class="border">{{$inventory->product_name}}</td>
                                <td class="border">{{$inventory->sku}}</td>
                                <td class="border">{{$inventory->quantity}}</td>
                                <td class="border">{{$inventory->color}}</td>
                                <td class="border">{{$inventory->size}}</td>
                                <td class="border">{{$inventory->price}}</td>
                                <td class="border">{{$inventory->cost}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="container">
                        {{$inventories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
