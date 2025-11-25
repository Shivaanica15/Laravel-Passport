<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="mb-4 text-gray-800">Here are a list of your clients:</p>

                    {{-- CLIENT CREATION FORM --}}
                    <form action="{{ route('dashboard.clients.create') }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Name</label>
                            <input type="text" name="name" class="w-1/3 border-gray-300 rounded-md" placeholder="Client Name" required>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Redirect</label>
                            <input type="text" name="redirect" class="w-1/3 border-gray-300 rounded-md" placeholder="https://my-url.com/callback" required>
                        </div>

                        <button type="submit"
                            class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-black transition">
                            CREATE CLIENT
                        </button>
                    </form>

                    <hr class="my-6">

                    {{-- SHOW EXISTING CLIENTS --}}
                    @foreach($clients as $client)
                        <div class="py-3">
                            <h3 class="text-lg text-gray-700 font-semibold">{{ $client->name }}</h3>
                            <p class="text-gray-600 text-sm">{{ $client->redirect }}</p>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
