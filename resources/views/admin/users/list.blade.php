@extends('layouts.dashboard-header')

@section('features')
<section class="my-section mb-20">
    <div class="mr-4 xl:mr-6 mt-8 xl:mt-10">
    <div class="-my-2 sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="max-w-7xl shadow border-b border-gray-200 sm:rounded">
                <!------------>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                            Email Verification
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                            Company
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $usr)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm truncate">
                                        <a href="#" class="text-gray-500 hover:underline font-semibold my-link">
                                            {{ $usr->name }}
                                        </a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $usr->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $usr->email_verified_at }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <a href="{{'company/'.$usr->company->id.'/details'}}" class="text-gray-500 hover:underline font-semibold my-link">
                                        {{ $usr->company->name }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 overflow-visible text-right text-sm font-medium">
                                    <user-options v-bind:user-id="{{ json_encode($usr->id) }}"></users-table-options>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(count($users) >= 12)
                    <div class="px-4 py-2">{{ $users->links() }}</div>
                @endif
            </div>
        </div>
    </div>
    </div>
</section>

@include('components.footer-large')
@endsection