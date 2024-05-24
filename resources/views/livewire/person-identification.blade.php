<div class="bg-white md:bg-[#F2F7FF] min-h-[100vh]">
    <section class="py-10 sm:py-16 lg:py-24">
        <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <div class="max-w-5xl mx-auto">
                <div class="overflow-hidden bg-transparent md:bg-white rounded-xl">
                    <div class="md:px-12 md:py-16">

                        <img class="max-h-[120px] mx-auto" src="{{ asset('imagens/header-sao-leopoldo.jpg')}}" alt="">

                        <div class="my-16">
                            <img class="h-5" src="{{ asset('branding/logo.svg') }}" alt="{{ config('app.name') }}">

                            <h2 class="text-3xl mt-6 font-bold leading-tight text-gray-800">Consultar cadastro</h2>
                        </div>

                        <form wire:submit.prevent="save">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                            <div x-data>
                                <div class="grid w-full grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                                    <x-text-input wire:model="cpf" name="cpf"
                                                  label="CPF" placeholder="CPF" x-mask="999.999.999-99"
                                                  :required="true"/>
                                    <x-text-input wire:model="birth_date" name="birth_date"
                                                  label="Data de nascimento" placeholder="DD/MM/AAAA"
                                                  x-mask="99/99/9999" :required="true"/>
                                    {!! htmlFormSnippet() !!}
                                </div>
                            </div>

                            <div class="sm:col-span-2 mt-16 flex justify-end">
                                <a href="{{ route('home') }}"
                                   class="inline-flex items-center justify-center px-6 py-3 mt-2 text-base font-semibold text-gray-900 transition-all duration-200 bg-white border border-transparent rounded-lg hover:bg-gray-100">
                                    Voltar
                                </a>
                                <button type="submit"
                                        class="ms-3 inline-flex items-center justify-center px-6 py-3 mt-2 text-base font-semibold text-white transition-all duration-200 bg-blue-500 border border-transparent rounded-lg focus:outline-none hover:bg-blue-700 focus:bg-blue-700">
                                    Consultar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
