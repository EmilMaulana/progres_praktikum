<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white">
            {{ __('Edit Supplier') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto mt-5">
                            <form action="{{ route('supplier.update' , $supplier->id)}}" method="POST" class="space-y-4">
                            @csrf <!-- Laravel CSRF protection -->
                            @method('PUT')
                            <div class="form-group">
                                <label for="supplier_name" class="block text-sm font-medium text-gray-700">Supplier Name</label>
                                <input type="text" id="supplier_name" name="supplier_name" value="{{ old('supplier_name', $supplier->supplier_name) }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="supplier_address" class="block text-sm font-medium text-gray-700">Supplier Address</label>
                                <textarea id="supplier_address" name="supplier_address" rows="3" value="" class="block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('supplier_address', $supplier->supplier_address) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone', $supplier->phone) }}" class="block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                                <textarea id="comment" name="comment" rows="3" value="" class="block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('comment', $supplier->comment) }}</textarea>
                            </div>
                            <button type="submit" class=" mt-3 inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
                        </form>
                    </div>
                    @vite('resources/js/app.js') <!-- Include Vite's JS assets -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>