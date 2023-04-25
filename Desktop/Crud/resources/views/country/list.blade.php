@extends('layouts.master')
<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Dashboard') }}
    </h2>
</x-slot>
@section('content')
<div class="max-w-2xl pt-6 mx-auto">

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    Flag
                </th>
                <th scope="col" class="px-6 py-3">
                    Country Name
                </th>

            </tr>
        </thead>
        <tbody>
            @forelse($countries as $country)
            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-4 p-4">
                    <img src="{{ asset('vendor/blade-flags/country-'.$country->code.'.svg') }}" width="32"
                        height="32" />
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    {{ $country->name }}
                </th>
            </tr>
            @empty
            <tr>
                <td colspan="2" class="text-center">No data found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="float-right pt-1">
        {{ $countries->links() }}
    </div>
</div>
</div>
@endsection
