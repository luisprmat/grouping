<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Group By Aggregate Function: <i>{{ $function }}</i>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul class="list-inside list-disc">
                        <li>
                            <a @class(['hover:underline', 'text-indigo-500 font-semibold' => ! request()->has('value') || request()->value === 'sum']) href="{{ route('group-by-aggregate-functions', ['value' => 'sum']) }}">
                                {{ __('Sum order totals') }} (<i>SUM</i>)
                            </a>
                        </li>
                        <li>
                            <a @class(['hover:underline', 'text-indigo-500 font-semibold' => request()->value === 'avg']) href="{{ route('group-by-aggregate-functions', ['value' => 'avg']) }}">
                                {{ __('Average order value') }} (<i>AVG</i>)
                            </a>
                        </li>
                        <li>
                            <a @class(['hover:underline', 'text-indigo-500 font-semibold' => request()->value === 'count']) href="{{ route('group-by-aggregate-functions', ['value' => 'count']) }}">
                                {{ __('Orders per User') }} (<i>COUNT</i>)
                            </a>
                        </li>
                        <li>
                            <a @class(['hover:underline', 'text-indigo-500 font-semibold' => request()->value === 'min']) href="{{ route('group-by-aggregate-functions', ['value' => 'min']) }}">
                                {{ __('Min order') }} (<i>MIN</i>)
                            </a>
                        </li>
                        <li>
                            <a @class(['hover:underline', 'text-indigo-500 font-semibold' => request()->value === 'max']) href="{{ route('group-by-aggregate-functions', ['value' => 'max']) }}">
                                {{ __('Max order') }} (<i>MAX</i>)
                            </a>
                        </li>
                    </ul>

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">{{ __('Name') }}</th>
                                <th class="px-4 py-2">{{ $function }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td class="border px-4 py-2">{{ $order->user->name }}</td>
                                    <td class="border px-4 py-2">{{ $order->value }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
