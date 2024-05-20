@props(['name', 'birthday', 'cpf', 'occupation', 'rent', 'total', 'next', 'previus'])

<div class="bg-white-100 border border-white-200 rounded-lg p-6 relative">
    <img src="{{ asset('imagens/trash.svg')}}"
         class="absolute top-4 right-2 h-5 w-5 text-gray-400 cursor-pointer"
         alt="Lixeira">

    <img src="{{ asset('imagens/pencil.svg')}}"
         class="absolute top-4 right-10 h-5 w-5 text-gray-400 cursor-pointer"
         alt="Lápis">

    <div class="flex">
        <p class="font-normal mr-6">Nome</p>
        <p class="font-bold">{{$name}}</p>
    </div>
    <div class="flex mt-2">
        <p class="font-normal pr-4">Nascimento</p>
        <p class="font-bold pr-4">{{$birthday}}</p>
    </div>
    <div class="flex mt-2">
        <p class="font-normal pr-4">CPF/NIS</p>
        <p class="font-bold pr-4">{{$cpf}}</p>
    </div>
    <div class="flex mt-2">
        <p class="font-normal pr-4">Ocupação</p>
        <p class="font-bold pr-4">{{$occupation}}</p>
    </div>
    <div class="flex mt-2">
        <p class="font-normal pr-4">Renda</p>
        <p class="font-bold pr-4">{{$rent}}</p>
    </div>

    <div class="absolute bottom-2 right-6 text[#4B5563]">
        <span class="mr-4" wire:click={{$next}}>&lt;</span> 1 de {{$total}} <span class="ml-4" wire:click={{$previus}}>&gt;</span>
    </div>
</div>
