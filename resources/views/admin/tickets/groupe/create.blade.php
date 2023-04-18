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

                    @if ($message = Session::get('success'))
                        <div class="flex justify-center py-4">

                            <div
                                class="flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">

                                <div class="flex items-center justify-center w-12 bg-green-500">
                                    <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                                    </svg>
                                </div>

                                <div class="px-4 py-2 -mx-3">
                                    <div class="mx-3">
                                        <span class="font-bold text-green-500 dark:text-green-400">IT GALA </span>
                                        <p class="text-sm text-gray-600 dark:text-gray-200">
                                            {{ $message }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif

                    @if ($message = Session::get('Warning'))
                        <div class="flex justify-center py-4">

                            <div
                                class="flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">

                                <div class="flex items-center justify-center w-12 bg-amber-500">
                                    <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                                    </svg>
                                </div>

                                <div class="px-4 py-2 -mx-3">
                                    <div class="mx-3">
                                        <span class="font-bold text-amber-500 dark:text-amber-400">IT GALA </span>
                                        <p class="text-sm text-gray-600 dark:text-gray-200">
                                            {{ $message }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif

                    <div class=" py-4  my-4 ">

                        <form style="" action="{{ route('groupe.store') }}" class="" method="post">
                            @csrf

                            <div class="flex gap-6">

                                <div class="col-span-4 pt-0 mb-3 mx-auto">
                                    <label class="font-bold "> Nom du groupe</label>
                                    <input type="text" placeholder="Nom du groupe" name='libelle'
                                        value="{{ old('libelle') }}"
                                        class="relative w-full px-3 py-2 text-sm text-gray-600 placeholder-gray-400 bg-white border-gray-400 rounded outline-none focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100" />
                                    @error('libelle')
                                        <div class="text-sm font-thin text-center text-red-600">
                                            {{ $errors->first('libelle') }} </div>
                                    @enderror
                                </div>
                                <div class="col-span-4 pt-0 mb-3 mx-auto">
                                    <label class="font-bold "> Ajouter des tickets (optionnel)</label>
                                    <select
                                        class="tickets relative w-full px-3 py-2 text-sm text-gray-600 placeholder-gray-400 bg-white border-gray-400 rounded outline-none focus:border-coolGray-400 focus:outline-none focus:ring-coolGray-100"
                                        type="text" multiple style="width:500px;" name="tickets[]"></select>

                                    @error('tickets')
                                        <div class="text-sm font-thin text-center text-red-600">
                                            {{ $errors->first('tickets') }} </div>
                                    @enderror
                                </div>

                            </div>
                            {{-- @livewire('admin.groupe.groupe') --}}
                            <div class="col-span-2 flex justify-center">
                                <div class="">
                                    <button class="px-4 py-2 mt-5 font-bold text-white bg-gray-600 rounded-md">
                                        Enregistrer </button>
                                </div>
                            </div>



                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.tickets').select2({
            placeholder: 'Selectionner un ticket (entrer le matricule)',
            escapeMarkup: function(markup) {
                return markup;
            },
            templateResult: function(data) {
                return data.html;
            },
            templateSelection: function(data) {
                if (data && !data.selected)
                    return data.text;
            },
            ajax: {
                type: 'GET',
                url: "{{ route('groupe.searchTickets') }}",
                dataType: 'json',
                delay: 100,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                html: "<span>Ticket N°" + item.code +
                                    "</span><br><span>Matricule étudiant : " + item.matricule +
                                    "</span>",
                                text: 'Ticket N°' + item.code,
                                id: item.id,
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>


</x-app-layout>
