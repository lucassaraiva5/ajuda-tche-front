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
                            <div class="px-1" x-data>
                                <p class="font-semibold text-gray-700 text-uppercase mb-7">INFORMAÇÕES PESSOAIS</p>

                                <div class="grid w-full grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                                    <x-text-input wrapperClass="" name="cpf" label="CPF" placeholder="CPF" x-mask="999.999.999-99" :required="true"/>
                                    <x-text-input wrapperClass="" name="civil_name" label="Nome civil" placeholder="Nome" :required="true"/>
                                    <x-text-input wrapperClass="" name="social_name" label="Nome social" placeholder="Nome"/>
                                    <x-text-input wrapperClass="" name="mother_name" label="Nome da mãe" placeholder="Nome da mãe"/>

                                    <x-text-input name="date_of_birth" label="Data de nascimento" placeholder="DD/MM/AAAA" x-mask="99/99/9999" :required="true"/>
                                    <x-select-input name="gender" label="Gênero" placeholder="Selecione um gênero" :required="true" :options="$genders"/>

                                    <x-text-input name="occupation" label="Ocupação" placeholder="Atividade profissional que desempenha" :required="true"/>
                                    <x-text-input name="income" label="Renda" placeholder="Remuneração mensal que recebe" :required="true"/>

                                    <x-text-input name="phone" label="Celular" placeholder="(xx) x xxxx-xxxx" x-mask="(99) 9 9999-9999"/>
                                    <x-text-input type="email" name="email" label="E-mail" placeholder="exemplo@email.com"/>

                                    <x-input-group-inline label="Possui Cadastro Único">
                                        <x-radio-input name="has_cadastro_unico" label="Sim" :value="true"/>
                                        <x-radio-input name="has_cadastro_unico" label="Não" :value="false"/>
                                    </x-input-group-inline>

                                    <x-text-input name="nis_number" label="Número NIS" placeholder="Número"/>

                                    <x-input-group-inline wrapperClass="md:col-span-2 min-h-[50px]" label="Beneficiário do Bolsa Família?">
                                        <x-radio-input name="has_bolsa_familia" label="Sim" :value="true"/>
                                        <x-radio-input name="has_bolsa_familia" label="Não" :value="false"/>
                                    </x-input-group-inline>

                                    <x-input-group-inline wrapperClass="md:col-span-2 min-h-[50px]" label="Já foi contemplado com o Programa Volta por Cima?">
                                        <x-radio-input name="covered_by_the_program_volta_por_cima" label="Sim" :value="true"/>
                                        <x-radio-input name="covered_by_the_program_volta_por_cima" label="Não" :value="false"/>
                                    </x-input-group-inline>

                                    <x-input-group-inline label="Acessa alguma cozinha social?">
                                        <x-radio-input name="access_to_social_kitchen" label="Sim" :value="true"/>
                                        <x-radio-input name="access_to_social_kitchen" label="Não" :value="false"/>
                                    </x-input-group-inline>

                                    <x-text-input name="social_kitchen" label="Qual Cozinha Social" placeholder="Nome da Cozinha Social"/>

                                    <x-input-group-inline label="Possui alguma deficiência?">
                                        <x-radio-input name="handicapped" label="Sim" :value="true"/>
                                        <x-radio-input name="handicapped" label="Não" :value="false"/>
                                    </x-input-group-inline>

                                    <x-text-input name="deficiency" label="Tipo de deficiência" placeholder="Cegueira, cadeirante..."/>
                                </div>

                                <div class="mt-16">
                                    <div class="grid w-full grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-3">
                                        <p class="font-semibold text-gray-700 text-uppercase">COMPOSIÇÃO FAMILIAR</p>

                                        <div class="flex md:justify-end">
                                            <button type="button" class="inline-flex items-center justify-center px-6 py-2 mt-2 text-base font-semibold text-white transition-all duration-200 bg-blue-500 border border-transparent rounded-full focus:outline-none hover:bg-blue-700 focus:bg-blue-700">
                                                Adicionar membro ao grupo
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-16">
                                    <p class="font-semibold text-gray-700 text-uppercase mb-4">ENDEREÇO</p>

                                    <div class="px-4 py-2.5 bg-blue-200/90 rounded-lg flex items-center mb-4">
                                        <x-tabler-info-circle-filled class="h-5 w-5 text-blue-500"/>
                                        <p class="ms-1.5 text-sm text-gray-600">Adicione informações do seu endereço (antes das enchentes).</p>
                                    </div>

                                    <div class="grid w-full grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                                        <x-text-input wrapperClass="md:col-span-2" name="cep" label="CEP" placeholder="00000-000" x-mask="99999-999"/>

                                        <div class="grid grid-cols-1 md:grid-cols-4 gap-x-5 gap-y-6 md:col-span-2">
                                            <x-text-input wrapperClass="md:col-span-3" name="address" label="Logradouro" placeholder="Rua, Avenida, etc..." :required="true"/>
                                            <x-text-input name="number" label="Número" placeholder="Número" :required="true"/>
                                        </div>

                                        <x-text-input name="complement" label="Complemento" placeholder="Complemento"/>
                                        <x-text-input name="neighborhood" label="Bairro" placeholder="Bairro" :required="true"/>

                                        <x-select-input name="uf" label="Estado" placeholder="Selecione o estado" :required="true" :options="$states"/>
                                        <x-text-input name="city" label="Cidade" placeholder="Selecione uma cidade" :required="true"/>

                                        <x-input-group-inline wrapperClass="md:col-span-2 min-h-[60px]" label="Você está atualmente neste mesmo endereço?">
                                            <x-radio-input name="its_at_the_same_address" label="Sim" :value="true"/>
                                            <x-radio-input name="its_at_the_same_address" label="Não" :value="false"/>
                                        </x-input-group-inline>
                                    </div>
                                </div>

                                <div class="mt-16">
                                    <p class="font-semibold text-gray-700 text-uppercase mb-7">LOCALIZAÇÃO ATUAL</p>

                                    <div class="grid w-full grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                                        <x-select-input name="current_uf" label="Estado" placeholder="Selecione o estado" :required="true" :options="$states"/>
                                        <x-text-input name="current_city" label="Cidade" placeholder="Selecione uma cidade" :required="true"/>

                                        <x-text-input name="help_place" label="Local que está abrigado(a)" placeholder="Selecione um local" :required="true"/>
                                        <x-text-input name="help_local" label="Informe o local" placeholder="Ex: Ulbra Canoas" :required="true"/>

                                        <div class="grid md:grid-cols-4 gap-x-5 gap-y-6 md:col-span-2">
                                            <x-text-input wrapperClass="md:col-span-3" name="current_address" label="Logradouro" placeholder="Rua, Avenida, etc..." :required="true"/>
                                            <x-text-input name="current_number" label="Número" placeholder="Número" :required="true"/>
                                        </div>

                                        <x-text-input name="current_complement" label="Complemento" placeholder="Complemento"/>
                                        <x-text-input name="current_neighborhood" label="Bairro" placeholder="Bairro" :required="true"/>
                                    </div>
                                </div>

                                <div class="mt-16">
                                    <p class="font-semibold text-gray-700 text-uppercase mb-7">DADOS GERAIS</p>

                                    <div class="grid w-full grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                                        <x-input-group-inline wrapperClass="md:col-span-2 min-h-[40px]" label="Você declara que esteve em situação de:">
                                            <x-radio-input name="situation" label="Desabrigado" :value="'desabrigado'"/>
                                            <x-radio-input name="situation" label="Desalojado" :value="'desalojado'"/>
                                            <x-radio-input name="situation" label="Atingido" :value="'atingido'"/>
                                        </x-input-group-inline>

                                        <x-input-group-inline label="Pessoa com deficiência na família?">
                                            <x-radio-input name="family_member_with_deficiency" label="Sim" :value="true"/>
                                            <x-radio-input name="family_member_with_deficiency" label="Não" :value="false"/>
                                        </x-input-group-inline>

                                        <x-text-input name="family_member_deficiency" label="Tipo de deficiência" placeholder="Cegueira, cadeirante..."/>

                                        <x-input-group-inline wrapperClass="md:col-span-2" label="Recebe BPC?">
                                            <x-radio-input name="receives_BPC" label="Sim" :value="true"/>
                                            <x-radio-input name="receives_BPC" label="Não" :value="false"/>
                                        </x-input-group-inline>

                                        <x-input-group-inline label="Alguém necessita de cuidados de saúde?">
                                            <x-radio-input name="anyone_need_health_care" label="Sim" :value="true"/>
                                            <x-radio-input name="anyone_need_health_care" label="Não" :value="false"/>
                                        </x-input-group-inline>

                                        <x-text-input name="who_needs_health_care" label="Quem" placeholder="Nome da pessoa"/>

                                        <x-input-group-inline label="Alguém toma remédio de uso continuo?">
                                            <x-radio-input name="anyone_take_continuous_medication" label="Sim" :value="true"/>
                                            <x-radio-input name="anyone_take_continuous_medication" label="Não" :value="false"/>
                                        </x-input-group-inline>

                                        <x-text-input name="who_takes_continuous_medication" label="Quem" placeholder="Nome da pessoa"/>
                                        <x-text-input wrapperClass="md:col-span-2" name="what_medicines_is_this_person_taking" label="Quais remédios" placeholder="Nome dos remédios ou composto"/>

                                        <x-input-group-inline wrapperClass="md:col-span-2" label="Situação do domicílio:">
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                                                <x-checkbox-input name="flooding" label="Alagamento" :value="'Alagamento'"/>
                                                <x-checkbox-input name="damage_to_furniture_appliances" label="Danificação dos móveis/eletrodomésticos" :value="'Danificação dos móveis/eletrodomésticos'"/>
                                                <x-checkbox-input name="damage_to_walls_floors_structure_roof" label="Danificação das paredes/pisos/estrutura/telhado" :value="'Danificação das paredes/pisos/estrutura/telhado'"/>
                                                <x-checkbox-input name="loss_of_bed_table_and_bath_belongings" label="Perda de pertences de cama/mesa e banho" :value="'Perda de pertences de cama/mesa e banho'"/>
                                                <x-checkbox-input name="others" label="Outros" :value="'Outros'"/>
                                            </div>
                                        </x-input-group-inline>
                                    </div>

                                    <div class="mt-12 md:mt-32 grid grid-cols-1 gap-y-5">
                                        <x-checkbox-input name="agree_terms_of_use" label="Ao salvar as informações, você aceita os Termos de Uso." :value="true" :required="true"/>
                                        <x-checkbox-input name="agree_data_sent_to_the_government" label="Ao salvar, você concorda que seus dados serão disponibilizados ao Governo do Estado do Rio Grande do Sul." :value="true" :required="true"/>
                                        <x-checkbox-input name="agree_true_data" label="DECLARO QUE AS INFORMAÇÕES POR MIM PRESTADAS NESTA FICHA SÃO A EXPRESSÃO DA VERDADE. A PRESENTE DECLARAÇÃO É FEITA SOB AS PENAS DA LEI, PORTANTO O DECLARANTE DE QUE, EM CASO DE FALSIDADE FICARÁ SUJEITO A SANÇÕES CRIMINAIS, CIVIS, ADMINISTRATIVAS PREVISTAS NA LEGISLAÇÃO PRÓPRIA." :value="true" :required="true"/>
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
