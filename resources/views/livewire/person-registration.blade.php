<div class="bg-white md:bg-[#F2F7FF] min-h-[100vh]">
    <section class="py-10 sm:py-16 lg:py-24">
        <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <div class="max-w-5xl mx-auto">
                <div class="overflow-hidden bg-transparent md:bg-white rounded-xl">
                    <div class="md:px-12 md:py-16">

                        <img class="max-h-[120px] mx-auto" src="{{ asset('imagens/header-sao-leopoldo.jpg')}}" alt="">
                        <img class="max-h-[120px] mx-auto" src="{{ asset('imagens/ULBRA-logo.png')}}" alt="">

                        <div class="my-16">
                            <img class="h-5" src="{{ asset('branding/logo.svg') }}" alt="{{ config('app.name') }}">

                            <h2 class="text-3xl mt-6 font-bold leading-tight text-gray-800">Cadastro de pessoa</h2>
                        </div>

                        <form wire:submit.prevent="save">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                            <div class="px-1" x-data>
                                <p class="font-semibold text-gray-700 text-uppercase mb-7">INFORMAÇÕES DO CHEFE DA FAMÍLIA</p>
                                <div class="grid w-full grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                                    <x-text-input wire:model="form.cpf" wrapperClass="md:col-span-2" name="form.cpf"
                                                  label="CPF (Preferencialmente mulher)" placeholder="CPF" x-mask="999.999.999-99"
                                                  :required="true"/>
                                    <x-text-input wire:model="form.civil_name" wrapperClass="md:col-span-2"
                                                  name="form.civil_name" label="Nome civil" placeholder="Nome"
                                                  :required="true"/>
                                    <x-text-input wire:model="form.birth_date" name="form.birth_date"
                                                  label="Data de nascimento" placeholder="DD/MM/AAAA"
                                                  x-mask="99/99/9999" :required="true"/>
                                    <x-text-input wire:model="form.cell_phone" name="form.cell_phone" label="Celular"
                                                  placeholder="(xx) x xxxx-xxxx" x-mask="(99) 9 9999-9999" :required="true"/>
                                </div>


                                <div class="mt-16">
                                    <div class="grid w-full grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-3">
                                        <p class="font-semibold text-gray-700 text-uppercase">COMPOSIÇÃO FAMILIAR</p>
                                        <div class="flex md:justify-end">
                                            <button
                                                wire:click.live="openFamilyMemberForm()"
                                                @disabled($addingFamilyMember)
                                                type="button"
                                                class="inline-flex items-center justify-center px-6 py-2 mt-2 text-base font-semibold text-white transition-all duration-200 bg-blue-500 border border-transparent rounded-full focus:outline-none hover:bg-blue-700 focus:bg-blue-700 disabled:bg-gray-200"
                                            >
                                                Incluir Familiar
                                            </button>
                                        </div>
                                    </div>

                                    @if($this->hasFamilyMembers())
                                        <div class="hidden md:block mt-6 mb-6">
                                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">Nome</th>
                                                    <th scope="col" class="px-6 py-3">Data de Nascimento</th>
                                                    <th scope="col" class="px-6 py-3">CPF/NIS</th>
                                                    <th scope="col" class="px-6 py-3">Ações</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($this->familyMembers as $index => $member)
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{$member['civil_name_member']}}
                                                        </th>
                                                        <td class="px-6 py-4">
                                                            {{$member['birth_date_member']}}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{$member['cpf_nis_member']}}
                                                        </td>
                                                        <td class="px-6 py-4 text-right">
                                                            <button type="button" wire:click.prevent="removeFamilyMember({{ $index }})" class="font-medium text-red-500">
                                                                <x-tabler-trash/>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- mobile -->
                                        <div class="block md:hidden mt-8 mb-2">
                                            <x-card-family-member name="{{$familyMembers[$familyMemberIndexMobileCard]['civil_name_member']}}"
                                                                  birthday="{{$familyMembers[$familyMemberIndexMobileCard]['birth_date_member']}}"
                                                                  cpf="{{$familyMembers[$familyMemberIndexMobileCard]['cpf_nis_member']}}"
                                                                  occupation="{{$familyMembers[$familyMemberIndexMobileCard]['occupation_member']}}"
                                                                  rent="{{$familyMembers[$familyMemberIndexMobileCard]['remuneration_member']}}"
                                                                  total="{{count($familyMembers)}}"
                                                                  next="nextFamilyMemberIndexMobileCard()"
                                                                  previus="previousFamilyMemberIndexMobileCard()"/>
                                        </div>
                                    @endif
                                </div>

                                @if ($addingFamilyMember)
                                    <div
                                        class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6 mt-2 border-b pb-6">
                                        <x-text-input wire:model="formFamily.cpf_nis_member" wrapperClass="md:col-span-2"
                                                      name="formFamily.cpf_nis_member"
                                                      label="CPF" placeholder="CPF" x-mask="999.999.999-99"/>
                                        <x-text-input wire:model="formFamily.civil_name_member" wrapperClass="md:col-span-2"
                                                      name="formFamily.civil_name_member" label="Nome civil"
                                                      placeholder="Nome"
                                                      :required="true"/>
                                        <x-select-input wire:model="formFamily.relationship_member"
                                                        name="formFamily.relationship_member"
                                                        label="Parentesco"
                                                        placeholder="Selecione um grau de parentesco" :required="true"
                                                        :options="$relationships"/>
                                        <x-text-input wire:model="formFamily.birth_date_member"
                                                      name="formFamily.birth_date_member"
                                                      label="Data de nascimento" placeholder="DD/MM/AAAA"
                                                      x-mask="99/99/9999" :required="true"/>
                                        <div class="sm:col-span-2 mt-8 flex justify-end">
                                            <button
                                                wire:click="closeFamilyMemberForm()"
                                                type="button"
                                                class="ms-3 inline-flex items-center justify-center px-6 py-3 mt-2 text-base font-semibold text-white transition-all duration-200 bg-red-400 border border-transparent rounded-full focus:outline-none hover:bg-red-500 focus:bg-red-500">
                                                Cancelar
                                            </button>
                                            <button wire:click="addFormFamily()"
                                                    type="button"
                                                    class="ms-3 inline-flex items-center justify-center px-6 py-3 mt-2 text-base font-semibold text-white transition-all duration-200 bg-blue-500 border border-transparent rounded-full focus:outline-none hover:bg-blue-700 focus:bg-blue-700">
                                                Salvar
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="mt-16">
                                <p class="font-semibold text-gray-700 text-uppercase mb-4">ENDEREÇO DA RESIDÊNCIA AFETADA PELA ENCHENTE</p>
                                <div class="px-4 py-2.5 bg-blue-200/90 rounded-lg flex items-center mb-4">
                                    <x-tabler-info-circle-filled class="h-5 w-5 text-blue-500"/>
                                    <p class="ms-1.5 text-sm text-gray-600">Adicione informações do seu endereço (antes das enchentes).</p>
                                </div>
                                <div class="grid w-full grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                                    <x-text-input wrapperClass="md:col-span-2" wire:model="form.zip_code" name="form.zip_code" label="CEP" placeholder="00000-000" x-mask="99999-999"/>
                                    <div class="grid grid-cols-1 md:grid-cols-4 gap-x-5 gap-y-6 md:col-span-2">
                                        <x-text-input wrapperClass="md:col-span-3" wire:model="form.street" name="form.street" label="Logradouro" placeholder="Rua, Avenida, etc..." :required="true"/>
                                        <x-text-input wire:model="form.number" name="form.number" label="Número" placeholder="Número" :required="true"/>
                                    </div>
                                    <x-text-input wire:model="form.complement" name="form.complement" label="Complemento" placeholder="Complemento"/>
                                    <x-text-input wire:model="form.neighborhood" name="form.neighborhood" label="Bairro" placeholder="Bairro" :required="true"/>
                                    <x-select-input wire:model.live="form.state" wire:model="form.state" name="form.state" label="Estado" placeholder="Selecione o estado" :required="true" :options="$states"/>
                                    <x-select-input wire:model.live="form.city" wire:key="{{ $this->form->state }}" wire:model="form.city" label="Cidade" name="form.city" :required="true" :options="$this->getStatesToSelectBox()"/>

                                </div>
                            </div>
                            <div id="shelter_localization" class="mt-16">
                                <p class="font-semibold text-gray-700 text-uppercase mb-7">LOCAL ONDE A FAMÍLIA ESTÁ AGORA</p>
                                <div class="grid w-full grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">

                                    <x-input-group-inline wrapperClass="md:col-span-2 min-h-[60px]" label="Local que está abrigado(a)">
                                        <x-radio-input wire:model="form.shelter_location" name="form.shelter_location" label="Em Casa" value="Em casa" :required="true"/>
                                        <x-radio-input wire:model="form.shelter_location" name="form.shelter_location" label="Em um abrigo" value="Em um abrigo" :required="true"/>
                                        <x-radio-input wire:model="form.shelter_location" name="form.shelter_location" label="Na casa de familiares" value="Na casa de familiares" :required="true"/>
                                        <x-radio-input wire:model="form.shelter_location" name="form.shelter_location" label="Outro local" value="Outro local" :required="true"/>
                                    </x-input-group-inline>
                                </div>
                            </div>
                            <div class="mt-12 grid grid-cols-1 gap-y-5">
                                <x-checkbox-input wire:model="form.agree_true_data" name="form.agree_true_data"
                                                  label="Declaro estar de inteira responsabilidade pelas informações prestadas, estando ciente de que a falsidade nas informações acima implicará nas penalidades cabíveis."
                                                  value="true" :required="true"/>
                            </div>
                            <div class="sm:col-span-2 mt-16 flex justify-end">
                                <a href="#"
                                   class="inline-flex items-center justify-center px-6 py-3 mt-2 text-base font-semibold text-gray-900 transition-all duration-200 bg-white border border-transparent rounded-full focus:outline-none hover:bg-gray-100 focus:bg-blue-700">
                                    Voltar
                                </a>
                                <button type="submit"
                                        class="ms-3 inline-flex items-center justify-center px-6 py-3 mt-2 text-base font-semibold text-white transition-all duration-200 bg-blue-500 border border-transparent rounded-full focus:outline-none hover:bg-blue-700 focus:bg-blue-700">
                                    Salvar informações
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
