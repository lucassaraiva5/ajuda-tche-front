<div class="bg-white md:bg-[#F2F7FF] min-h-[100vh]">
    <section class="py-10 sm:py-16 lg:py-24">
        <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <div class="max-w-2xl mx-auto text-center">
                <div class="overflow-hidden bg-transparent md:bg-white rounded-xl">
                    <div class="md:px-12 md:py-16">
                        <svg class="w-12 h-12 mx-auto text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>

                        <p class="mt-6 text-xl font-bold text-gray-900">Formulário preenchido com sucesso!</p>

                        <div class="border rounded-lg border-gray-300 my-10 p-6">
                            <p class="text-2xl font-bold text-gray-900">{{ $protocol }}</p>
                            <p class="text-sm text-center font-bold text-gray-600">PROTOCOLO DE REGISTRO</p>
                        </div>

                        <a
                            href="{{ route('home') }}"
                            title=""
                            class="inline-flex items-center justify-center mx-auto px-5 py-3 text-xs font-bold tracking-widest text-white bg-blue-500 uppercase transition-all duration-200 rounded-lg focus:outline-none hover:bg-blue-600"
                            role="button"
                        >
                            Voltar para a página inicial
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
