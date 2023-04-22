<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Groupes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <div class="  py-6 px-6">
                    <div class="gap-6 mx-auto w-1/2 text-center">
                        <h1 class="mb-3 mt-3">Liste des tickets associés au groupe <span class="font-bold text-red-600">{{ $groupe->libelle }}</span></h1>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-dark uppercase bg-gray-300">
                                    <tr class="mt-1">
                                        <th>#</th>
                                        <th scope="col" class="px-6 py-3">Code</th>
                                        <th scope="col" class="px-6 py-3">Matricule étudiant</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1
                                    @endphp
                                    @foreach ($groupe->tickets as $ticket)
                                        <tr class="bg-white border">
                                            <td>{{ $i++ }}</td>
                                            <td scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $ticket->code }}</td>
                                            <td scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $ticket->personne->matricule }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>
