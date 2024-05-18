<div class="bg-white md:bg-[#F2F7FF] min-h-[100vh]">
    <section class="py-10 sm:py-16 lg:py-24">
        <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <div class="max-w-5xl mx-auto">
                <div class="overflow-hidden bg-transparent md:bg-white rounded-xl">
                    <div class="md:px-12 md:py-16">
                        <div class="mb-16">
                            <img class="h-5" src="{{ asset('branding/logo.svg') }}" alt="{{ config('app.name') }}">

                            <h2 class="text-3xl mt-6 font-bold leading-tight text-gray-800">Cadastro de pessoa</h2>
                        </div>

                        <form wire:submit.prevent="save">
                            <div x-data>
                                <div>
                                    <p class="font-semibold text-gray-700 text-uppercase mb-7">INFORMAÇÕES PESSOAIS</p>

                                    <div class="grid grid-cols-2 gap-x-5 gap-y-6">
                                        <x-text-input wire:model.live="name" name="name" label="Nome" placeholder="Nome" :required="true"/>
                                        <x-text-input name="last_name" label="Sobrenome" placeholder="Sobrenome"/>

                                        <x-text-input wrapperClass="col-span-2" name="cpf" label="CPF" placeholder="CPF" x-mask="999.999.999-99"/>

                                        <x-text-input wrapperClass="col-span-2" name="mother_name" label="Nome da mãe" placeholder="Nome da mãe"/>

                                        <x-text-input name="date_of_birth" label="Data de nascimento" placeholder="DD/MM/AAAA" x-mask="99/99/9999"/>
                                        <x-text-input name="gender" label="Gênero" placeholder="Selecione um gênero"/>

                                        <x-text-input name="state_of_birth" label="Estado de nascimento" placeholder="Estado"/>
                                        <x-text-input name="naturalness" label="Naturalidade" placeholder="Cidade"/>

                                        <x-text-input name="phone" label="Celular" placeholder="(xx) x xxxx-xxxx" x-mask="(99) 9 9999-9999"/>
                                        <x-text-input type="email" name="email" label="E-mail" placeholder="exemplo@email.com"/>
                                    </div>
                                </div>

                                <div class="mt-16">
                                    <p class="font-semibold text-gray-700 text-uppercase mb-4">ENDEREÇO</p>

                                    <div class="px-4 py-2.5 bg-blue-200/90 rounded-lg flex items-center mb-4">
                                        <x-tabler-info-circle-filled class="h-5 w-5 text-blue-500"/>
                                        <p class="ms-1.5 text-sm text-gray-600">Adicione informações do seu endereço (antes das enchentes).</p>
                                    </div>

                                    <div class="grid grid-cols-2 gap-x-5 gap-y-6">
                                        <div class="flex items-end col-span-2 gap-x-5">
                                            <x-text-input wrapperClass="w-full" wire:model="cep" name="cep" label="CEP" placeholder="00000-000" x-mask="99999-999"/>
                                            <button type="button" wire:click="searchByCep" class="px-4 py-3 bg-blue-500 rounded">
                                                <x-tabler-search class="h-5 w-5 text-white"/>
                                            </button>
                                        </div>

                                        <x-text-input wire:model.live="address" name="address" label="Logradouro" placeholder="Rua, Avenida, etc..." :required="true"/>
                                        <x-text-input wire:model.live="number" name="number" label="Número" placeholder="Número" :required="true"/>

                                        <x-text-input wire:model.live="complement" name="complement" label="Complemento" placeholder="Complemento"/>
                                        <x-text-input wire:model.live="neighborhood" name="neighborhood" label="Bairro" placeholder="Bairro" :required="true"/>

                                        <x-text-input wire:model.live="uf" name="uf" label="Estado" placeholder="Rio Grande do sul" :required="true"/>
                                        <x-text-input wire:model.live="city" name="city" label="Cidade" placeholder="Selecione uma cidade" :required="true"/>
                                    </div>
                                </div>

                                <div class="mt-16">
                                    <p class="font-semibold text-gray-700 text-uppercase mb-7">LOCALIZAÇÃO ATUAL</p>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-5 gap-y-6">
                                        <x-text-input name="uf" label="Estado" placeholder="Rio Grande do sul" :required="true"/>
                                        <x-text-input name="city" label="Cidade" placeholder="Selecione uma cidade" :required="true"/>

                                        <x-text-input name="help_place" label="Local que está abrigado(a)" placeholder="Selecione um local" :required="true"/>
                                        <x-text-input name="help_local" label="Informe o local" placeholder="Ex: Ulbra Canoas" :required="true"/>

                                        <x-text-input name="address" label="Logradouro" placeholder="Rua, Avenida, etc..." :required="true"/>
                                        <x-text-input name="number" label="Número" placeholder="Número" :required="true"/>

                                        <x-text-input name="complement" label="Complemento" placeholder="Complemento"/>
                                        <x-text-input name="neighborhood" label="Bairro" placeholder="Bairro" :required="true"/>
                                    </div>
                                </div>

                                <div class="sm:col-span-2 mt-16 flex justify-end">
                                    <a href="#" class="inline-flex items-center justify-center px-6 py-3 mt-2 text-base font-semibold text-gray-900 transition-all duration-200 bg-white border border-transparent rounded-full focus:outline-none hover:bg-gray-100 focus:bg-blue-700">
                                        Voltar
                                    </a>

                                    <button type="submit" class="ms-3 inline-flex items-center justify-center px-6 py-3 mt-2 text-base font-semibold text-white transition-all duration-200 bg-blue-500 border border-transparent rounded-full focus:outline-none hover:bg-blue-700 focus:bg-blue-700">
                                        Salvar informações
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
