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
          
            @foreach($serie->temporadas as $temporada)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg series">
                    <div class="p-6 text-gray-900 dark:text-gray-100 series__flex">

                        <div class="container__series">
                            Temporada {{ $temporada->numero }}
                        </div>
                        
                        <div class="container__series assistidos__container">
                        
                            <a href="/episodios/{{ $temporada->id }}">  
                                {{ $temporada->episodiosAssistidos() }}/{{ $temporada->episodios->count() }}
                            </a>
                        
                        </div>

                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
</x-app-layout>