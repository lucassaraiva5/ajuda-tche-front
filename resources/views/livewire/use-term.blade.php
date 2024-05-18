<div class="bg-white md:bg-[#F2F7FF] min-h-[100vh]">
    <div class=" bg-white container mb-6">
        <img class="mb-6" src="{{ asset('branding/logo.svg') }}" alt="{{ config('app.name') }}">
        <p class="font-bold text-2xl mb-4 leading-10" style="color: rgba(75, 85, 99, 1)">Termos de Uso</p>
    </div>

    <div class="top-20 mb-8">
        <p class="text-2 leading-6 font-semibold text-base mb-4" style="color: rgba(75, 85, 99, 1)">Bem-vindo à nossa
            aplicação de cadastro de pessoas desabrigadas. Antes de utilizar nossos serviços, por favor, leia
            atentamente os seguintes termos de uso. Ao utilizar nossa aplicação, você concorda com estes termos e
            condições.</p>
    </div>

    @foreach($terms as $titleTerm => $description)
        <x-title-and-text-term title="$titleTerm" term="$description"/>
    @endforeach
</div>
