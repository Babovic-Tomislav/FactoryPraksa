<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        @yield('header')
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if($role == 'employee')
                    @include('Employee.vacation_form')
                @elseif($role == 'approver')
                    @include('Employee.approver_homepage')
                @elseif($role == 'admin')

                @endif
            </div>
        </div>
    </div>
</x-app-layout>
