<div class="bg-white md:bg-[#F2F7FF] min-h-[100vh]">
    <section class="py-10 sm:py-16 lg:py-24">
        <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <div class="max-w-5xl mx-auto">
                <img class="h-5" src="{{ asset('branding/logo.svg') }}" alt="{{ config('app.name') }}">

                <h2 class="text-3xl mt-5 font-bold leading-tight text-gray-900">Cadastro de pessoa</h2>
            </div>

            <div class="max-w-5xl mx-auto mt-12">
                <div class="overflow-hidden bg-transparent md:bg-white rounded-xl">
                    <div class="md:p-8">
                        <form action="#" method="POST">
                            <p class="font-semibold text-gray-900 text-uppercase mb-4">INFORMAÇÕES PESSOAIS</p>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-5 gap-y-4">
                                <x-text-input name="cpf" label="CPF" placeholder="CPF"/>
                                <x-text-input name="name" label="Nome" placeholder="Nome" :required="true"/>
                                <x-text-input name="last_name" label="Sobrenome" placeholder="Sobrenome"/>
                                <x-text-input name="date_of_birth" label="Data de nascimento" placeholder="DD/MM/AAAA"/>
                                <x-text-input name="state_of_birth" label="Estado de nascimento" placeholder="Estado"/>
                                <x-text-input name="naturalness" label="Naturalidade" placeholder="Cidade"/>
                                <x-text-input name="phone" label="Celular" placeholder="(xx) xxxxx-xxxx"/>

                                <div class="sm:col-span-2">
                                    <button type="submit" class="inline-flex items-center justify-center w-full px-4 py-4 mt-2 text-base font-semibold text-white transition-all duration-200 bg-blue-500 border border-transparent rounded-md focus:outline-none hover:bg-blue-700 focus:bg-blue-700">
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
