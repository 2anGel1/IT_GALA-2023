<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Groupes') }}
        </h2>
    </x-slot>

    <div>

        <div class="mx-auto max-w-7xl sm:px-6 md:px-4">

            <div class="pt-3 px-6 md:flex gap-6 md:justify-between">
                <div class="text-xl font-bold py-6 ">
                    <a href="{{route('groupe.create')}}" class="px-4 rounded-md py-2 bg-orange text-sm font-bold">Nouveau groupe</a>
                </div>
            </div>

            <div class="sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                <table class="min-w-full divide-y table-auto  divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>

                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Libellé
                                            </th>


                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Nombre de personnes
                                            </th>

                                            <th scope="col-span-2" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">

                                            </th>


                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($groupes as $groupe)
                                        <tr>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">

                                                    <div class="ml-4">
                                                        <div class="text-sm font-bold  text-gray-900 text-md">
                                                            {{$groupe->libelle}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">

                                                    <div class="ml-4">
                                                        <div class="text-sm font-bold  text-gray-900 text-md">
                                                            {{$groupe->nbPersonnes}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">

                                                    <div class="ml-4">
                                                        <div class="flex gap-4">
                                                            <a href="{{route('groupe.show', $groupe->id)}}" class="text-sm font-bold text-gray-800 border-2 px-2 rounded-full  py-2 text-md">
                                                                <i class="fa-regular fa-eye text-base font-bold px-1 "></i>
                                                            </a>
                                                            <a href="{{route('groupe.edit', $groupe->id)}}" class="text-sm font-bold border-2 px-2 rounded-full  py-2 text-md">
                                                                <i class="fa-regular fa-pen-to-square text-base font-bold px-1 " style="color: #0354C9"></i>
                                                            </a>
                                                            <form action="{{route('groupe.destroy', $groupe->id)}}" method="post" onsubmit="return confirm('Voulez-vous vraiment ce groupe ?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="text-sm font-bold text-red-600 border-2 px-2 rounded-full  py-2 text-md">
                                                                    <i class="fa-regular fa-trash text-base font-bold px-1 "></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <!-- <script>
                                    $(document).ready(function(){
                                        $(".datatable").DataTable();
                                    })
                                </script> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="  ">

                        <div class=" py-4  my-2 ">

                            <div class="grid md:grid-cols-12  md:gap-6 gap-2">
                                <div class="col-span-2 bg-white shadow-xl rounded-md md:h-64 h-32 font-bold px-4 py-2 pt-0 mb-3">
                                    <div class=" flex flex-col h-full">

                                        <div class="flex items-center justify-center h-full w-full">
                                        <a class="px-4 py-2 rounded-md font-bold bg-myblue text-white" href="{{route('groupe.create')}}"> Nouveau groupe</a>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-span-2 bg-white shadow-xl rounded-md md:h-64 h-32 font-bold px-4 py-2 pt-0 mb-3">
                                    <div class=" flex flex-col h-full">

                                        <div class="flex items-center justify-center h-full w-full">
                                             Solo Externe
                                        </div>

                                        <div class="text-center py-2">
                                            <a class="px-4 py-2 rounded-md font-bold bg-myblue text-white" href="{{route('admin.ticket.create.tse')}}"> Enregistrer </a>
                                        </div>
                                    </div>

                                </div>


                            </div>


                        </div>

                </div> -->

            </div>
        </div>
    </div>


</x-app-layout>
