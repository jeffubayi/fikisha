@extends('layouts.master')

@section('content')
    <div class="container-fluid px-8">
        <div class=" py-3 flex justify-between ">
            @include('layouts.partials.alert')
            <a href="{{ route('fleets.create') }}">
                <button type="submit"
                    class="w-full text-white bg-blue-600  hover:bg-iamber-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Add
                    New Fleet</button>
            </a>
        </div>

        <div class="relative overflow-x-auto shadow-md  sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Driver Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fleet Plate
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                @foreach ($fleets as $fleet)
                    <tbody>
                        <tr class="bg-white border-b ">
                            <td class="px-6 py-4">
                                {{ $fleet->id }}
                            </td>

                            <td class="px-6 py-4 font-medium ">
                                {{ $fleet->fleet_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $fleet->fleet_plate }}
                            </td>
                            <td class="px-6 py-4">
                                <span
                                class="px-2 py-1 font-semibold leading-tight {{ $fleet->fleet_status == 'available' ? 'text-green-700 bg-green-100' : 'text-yellow-700 bg-yellow-100' }} rounded-full ">
                            {{ $fleet->fleet_status }}
                            </span>
                                
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('fleets.edit', $fleet->id) }}"
                                    class="font-medium text-blue-600 ">Edit</a>
                            </td>
                        </tr>

                    </tbody>
                @endforeach
               
            </table>
            <div class="col-xl-12 col-sm-12">
                {{ $fleets->links() }}
            </div>
        </div>
    </div>
@endsection
