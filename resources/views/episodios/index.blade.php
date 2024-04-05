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

        
    <form action="/episodios/{{ $temporada->id }}" method="post">
    @csrf
    @method('PUT')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         
            @foreach($temporada->episodios as $episodio )
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg series">
                <div class="p-6 text-gray-900 dark:text-gray-100 series__flex">

                    <div class="container__series">
                        ep {{ $episodio->numero }}
                    </div>
                    
                    <div class="container__series">
                            
                        <input type="checkbox" name="episodios[]" value="{{ $episodio->id }}" {{ $episodio->assistido ? "checked" : '' }}>
                          
                    </div>

                </div>
            </div>
            @endforeach
        </div>
        <div class="botao_flex">

            <input type="submit" class="btn btn-editar" value="Concluir">
    
        </div>
    </div>
    
    </form>
</x-app-layout>