@extends('index')

@section('h1_title', 'Run Metric')

@section('title', 'Run Metric')

@section('content')
    <div class="flex flex-col w-full m-auto md:mt-6 md:flex-row gap-2">
        <form class="w-full" id="metricsForm">
        @csrf
            {{-- URL LABEL + SELECT --}}
            <div class="w-full flex flex-wrap">
                <div id="url_div" class="flex flex-wrap mb-6 w-1/2 md:w-1/2 p-4">
                    <label for="url"
                        class="  w-full relative block border-b border-gray-200 bg-transparent pt-3 focus-within:border-indigo-600">
                        <input type="url" id="url"  placeholder="URL"
                            class="peer h-8 w-full border-none bg-transparent p-0 placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" />

                        <span
                            class="absolute start-0 top-2 -translate-y-1/2 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-2 peer-focus:text-xs">
                            URL
                        </span>
                    </label>
                </div>
                <div id="select_div" class="flex flex-wrap mb-6 w-1/2 md:w-1/2 p-4">
                    <label for="strategy" class="block border-b-1 text-sm font-medium text-gray-900"> Strategy </label>

                    <select name="strategy" id="strategy" 
                        class="mt-1.5 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm">
                        <option selected disabled value="">Please select</option>
                        @foreach ($strategies as $strategy )
                        <option value="{{ $strategy->name }}">{{ucfirst(strtolower($strategy->name))}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- CHECKBOXES --}}
            <div id="checkboxes_div" class="flex flex-wrap mb-6">

                <fieldset id="checkboxes">
                    <legend class="sr-only">Checkboxes</legend>

                    <div class="flex flex-wrap gap-4">
                        @foreach($categories as $category)


                            <label for="Option{{$category->id}}"
                            class="flex cursor-pointer items-start gap-4 rounded-lg border border-gray-200 p-4 transition hover:bg-gray-50 has-[:checked]:bg-blue-50 w-full md:w-[32%]">
                                <div class="flex items-center">
                                    &#8203;
                                    <input type="checkbox" name="categories[]" value="{{ $category->name }}" class="size-4 rounded border-gray-300" id="Option{{$category->id}}" />
                                </div>

                                <div>
                                    <strong class="font-medium text-gray-900"> {{ $category->name }} </strong>

                                    <p class="mt-1 text-pretty text-sm text-gray-700">
                                        Little description
                                    </p>
                                </div>
                            </label>

                        @endforeach

                    </div>
                </fieldset>
            </div>

            {{-- SUBMIT --}}
            <div class="flex flex-wrap mb-6 w-full md:w-[32%] ">
                <button type="submit" id="submit"
                    class="group relative inline-flex items-center overflow-hidden rounded bg-indigo-600 px-8 py-3 text-white focus:outline-none focus:ring active:bg-indigo-500 w-full" 
                    href="#"
                    >
                    <span class="absolute -start-full transition-all group-hover:start-4">
                        <svg
                        class="size-5 rtl:rotate-180"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"
                        />
                        </svg>
                    </span>

                    <span class="text-sm font-medium transition-all group-hover:ms-4"> Get Metrics </span>
                </button>
            </div>
        </form>
    </div>

    <div id="loader" class="hidden flex flex-col mx-3 md:mt-6 md:flex-row gap-2 w-full">
        <div role='status' class='w-full animate-pulse'>
            <h3 class='h-3 bg-gray-300 rounded-full  w-[25%] mb-4'></h3>
            <p class='h-2 bg-gray-300 rounded-full max-w-[70%] mb-2.5'></p>
            <p class='h-2 bg-gray-300 rounded-full max-w-[60%] mb-2.5'></p>
            <p class='h-2 bg-gray-300 rounded-full max-w-[50%] mb-2.5'></p>
            <p class='h-2 bg-gray-300 rounded-full max-w-[65%] mb-2.5'></p>
            </div>
    </div>

    <div id="results" class="hidden">
        @include('content.results_charts')
    </div>

    <script>
        $(document).ready(function () {
            
            $('#metricsForm').submit(function (e) {
                e.preventDefault();
                $('#results').addClass('hidden');
                var checkedCount = $('input[name="categories[]"]:checked').length;
                var url = $('#url').val();
                var strategy = document.getElementById('strategy').value;
                var categories = [];
                $('input[name="categories[]"]:checked').each(function() {
                    categories.push($(this).val());
                });
                var exit = false;

                //validaciones JS 
                if (checkedCount === 0) {
                    toastr.warning('Please, select at least one category.');
                    $('#checkboxes_div').addClass('blink');

                    setTimeout(function() {
                        $('#checkboxes_div').removeClass('blink');
                    }, 1500);
                    exit = true;
                }  


                if (url.trim() === '') {
                    toastr.warning('Please, write some URL to look for metrics.');
                    $('#url_div').addClass('blink');

                    setTimeout(function() {
                        $('#url_div').removeClass('blink');
                    }, 1500);
                    exit = true;
                } else{
                    var urlPattern = /^(https?:\/\/)?([a-z\d.-]+)\.([a-z]{2,6})(\/[-a-z\d%_.~+]*)*(\?[;&a-z\d%_.~+=-]*)?(#[\-a-z\d_]*)?$/i;

                    if (!urlPattern.test(url)) {
                        toastr.warning('Please, write some correct URL');
                        $('#url_div').addClass('blink');

                        setTimeout(function() {
                            $('#url_div').removeClass('blink');
                        }, 1500);
                        exit = true;
                    }
                }


                if (strategy == '') {
                    toastr.warning('Please, select one strategy.');
                    $('#select_div').addClass('blink');

                    setTimeout(function() {
                        $('#select_div').removeClass('blink');
                    }, 1500);
                    exit = true;
                }

                if(exit){
                    return;
                }


                $('#loader').removeClass('hidden')
                $('#submit').attr('disabled', true);
                $('#submit').addClass('cursor-not-allowed');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/get-metrics',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        url: url,
                        categories: categories,
                        strategy: strategy
                    },
                    success: function (data) {
                        $('#loader').addClass('hidden');
                        $('#submit').removeClass('cursor-not-allowed');
                        $('#submit').attr('disabled', false);
                        $('#results').removeClass('hidden');
                        $('#results').html(data.html);
                        
                    },
                    error: function (xhr) {
                        $('#submit').attr('disabled', false);
                        $('#submit').removeClass('cursor-not-allowed');
                        $('#loader').addClass('hidden');
                        console.log(xhr);
                        toastr.error(xhr.responseJSON.message);
                        $('console.log').html('<p>Ocurrio un error inesperado</p>');
                    }
                });
            });
        });
    </script>
@endsection
