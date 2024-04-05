<x-app-layout>

    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 series__flex">

                   <form action="/series" method="post"> 
                        @csrf
                        <label for="">Nome</label>
                        <input class="input-form" type="text" name="nome">

                        <label for="">Temporada n/</label>
                        <input class="input-form" type="text" name="qtdTemporada">

                        <label for="">Episodios n/</label>
                        <input class="input-form" type="text" name="qtdEpisodios">

                        <input class="btn-editar btn-form" type="submit" value="Criar">

                   </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>