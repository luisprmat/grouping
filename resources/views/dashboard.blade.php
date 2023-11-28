<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="mb-4 text-xl font-bold">{{ __('Group By :ex', ['ex' => __('Examples')]) }}: Eloquent</h2>

                    <ul class="list-inside list-disc">
                        <li>
                            <a class="hover:underline" href="{{ route('group-by') }}">Group By (<i>{{ __('Simple') }}</i>)</a>
                        </li>
                        <li>
                            <a class="hover:underline" href="{{ route('group-by-aggregate-functions') }}">Group By Aggregate Functions (<i>SUM, AVG, MIN, MAX, COUNT</i>)</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
