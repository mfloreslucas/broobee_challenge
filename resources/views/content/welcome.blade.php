@extends('index')

@section('title', 'Bienvenid@')

@section('h1_title', 'Home')

@section('content')
<div class="flex justify-center flex flex-wrap md:mt-6">
    <div class="max-w-[720px] mx-auto mb-3">
        <!-- Centering wrapper -->
        <a href="{{ url('/run_metric') }}"
            class="relative flex flex-col bg-white shadow-sm border border-slate-200 rounded-lg w-96 hover:shadow-md hover:border-indigo-400 hover:border-3 rounded-lg transition-all cursor-pointer md:mx-4">
            <div class="p-4">
                <div class="flex w-100">
                    <h5 class="w-5/6 mb-2 text-slate-800 text-xl font-semibold">
                        Run Metric
                    </h5>
                    <div class="mr-0 w-1/6 text-indigo-500">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                    </div>
                </div>

                <p class="text-slate-600 leading-normal font-light">
                    Herramienta para buscar las metricas de una pagina utilizando la api de PageSpeed Insights creada por Google.
                    <br>Utiliza la herramienta para analizar el rendimiento de tu sitio web, obteniendo información detallada sobre la velocidad de carga, la interactividad y la estabilidad visual tanto en dispositivos móviles como en escritorio.
                </p>
            </div>
        </a>

    </div>
    <div class="max-w-[720px] mx-auto px-4">

        <!-- Centering wrapper -->
        <a href="{{ url('/metric_history') }}"
            class="relative flex flex-col bg-white shadow-sm border border-slate-200 rounded-lg w-96 hover:border-sky-400 hover:border-3 hover:shadow-md rounded-lg transition-all cursor-pointer md:mx-4">
            <div class="p-4">
                <div class="flex w-100">
                    <h5 class="w-5/6 mb-2 text-slate-800 text-xl font-semibold">
                        Metric History
                    </h5>
                    <div class="mr-0 w-1/6 text-sky-800">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </div>
                </div>

                <p class="text-slate-600 leading-normal font-light">
                    Historial de métricas de las páginas analizadas anteriormente.
                    <br>En esta sección, podrás consultar los resultados de las búsquedas que has guardado previamente. Accede a los informes detallados de rendimiento y optimización para cada página que hayas analizado con información histórica sobre su velocidad de carga, interactividad y estabilidad visual.

                </p>
            </div>
        </a>

    </div>
</div>

@endsection