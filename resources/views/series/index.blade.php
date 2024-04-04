<x-app-layout>

    
                @isset($mensagemSucesso)
                    <div class="max-w-7xl mt-3 mx-auto sm:px-6 lg:px-8">    
                        <div class="alerta-sucesso">
                            <ul>
                                {{ $mensagemSucesso }}
                            </ul>
                        </div>
                    </div>
                @endisset

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($series as $serie)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg series">
                <div class="p-6 text-gray-900 dark:text-gray-100 series__flex">

                    <div class="container__series">
                        {{$serie->nome}}
                    </div>
                    
                    <div class="container__series">
                        <a href="#" class="btn btn-editar">Editar</a>

                        <form action="/series/{{$serie->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" value="{{ $serie->id }}">
                            <input type="submit" class="btn btn-excluir" value="Excluir">
                        </form>
                    </div>

                </div>
            </div>
            @endforeach

            
        </div>
    </div>
</x-app-layout>