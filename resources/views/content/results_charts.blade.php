<hr class="w-full ">
<div class="text-xl w-full mt-3">Results</div>
<div class="leading-2 font-light mb-6 ">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias, deserunt odit, ducimus explicabo dicta adipisci, exercitationem quas libero voluptates sint nisi sunt sit quidem! Accusantium aliquam facere esse recusandae hic.</div>

<div class="p-5 m-auto border border-gray-200 rounded-lg w-[90%]">
    <div class="w-full flex flex-wrap gap-2">
        @foreach ($categories as $key => $category)
        @php
            $name = $category['title'];
            $score = $category['score'] * 10;
            $color = '';
            $text_color = '';
            if ($score >= 9) {
                $color = 'bg-green-500';
                $text_color = 'text-green-50';
                
            } elseif ($score >= 5) {
                $color = 'bg-orange-500';
                $text_color = 'text-orange-50';
            } else {
                $color = 'bg-purple-500';
                $text_color = 'text-purple-50';
            }
            $progress = $score*10;
        @endphp
            <div class="flex items-center py-3 w-full md:w-[48%]">
                <span class="w-8 h-8 shrink-0 mr-4 rounded-full bg-blue-50 flex items-center justify-center">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 text-blue-500"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 13l-2 -2"></path>
                    <path d="M12 12l2 -2"></path>
                    <path d="M12 21v-13"></path>
                    <path
                    d="M9.824 16a3 3 0 0 1 -2.743 -3.69a3 3 0 0 1 .304 -4.833a3 3 0 0 1 4.615 -3.707a3 3 0 0 1 4.614 3.707a3 3 0 0 1 .305 4.833a3 3 0 0 1 -2.919 3.695h-4z"
                    ></path>
                </svg>
                </span>
                <div class="space-y-3 flex-1">
                    <div class="flex items-center">
                        <h4
                        class="font-medium text-sm mr-auto text-gray-700 flex items-center"
                        >
                        {{$name}}
                            <div>
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="ml-2 shrink-0 w-5 h-5 text-gray-500"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                <path d="M12 9h.01"></path>
                                <path d="M11 12h1v4h1"></path>
                                </svg>
                            </div>
                            
                            
                        </h4>
                        <span class="px-2 py-1 rounded-lg {{$color}} {{$text_color}} text-xs">
                        {{$score}} / 10
                        </span>
                    </div>
                    <div class="overflow-hidden bg-blue-50 h-1.5 rounded-full w-full">
                        <span
                        class="h-full bg-blue-500 w-full block rounded-full"
                        style="width: {{$progress}}%"
                        ></span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="border-t border-gray-100 pt-4 mt-4">
        <p class="text-sm text-gray-500 text-center"> 
            <span class="font-bold">Color Explanation:</span> &nbsp;
            <span class="inline-block w-4 h-4 bg-purple-500 mr-2"></span><span class="font-bold">Needs Improvement:</span> 0-5 &nbsp;
            <span class="inline-block w-4 h-4 bg-orange-500 mr-2"></span><span class="font-bold">Average:</span> 5-9 &nbsp;
            <span class="inline-block w-4 h-4 bg-green-500 mr-2"></span><span class="font-bold">Excellent:</span> 9+ &nbsp;
        </p>
    </div>
</div>

<div style="width: 80%; margin: auto;">
    <canvas id="myPolarAreaChart2" class="hidden" width="400" height="400"></canvas>
</div>

<div class="flex flex-wrap mb-6 w-full md:w-[32%] mt-6">
    <button id="save_values"
    class="group relative inline-flex items-center overflow-hidden rounded border border-current px-8 py-3 text-indigo-600 focus:outline-none focus:ring active:text-indigo-500 w-full"
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

    <span class="text-sm font-medium transition-all group-hover:ms-4"> Save Data </span>
    </button>
</div>

@foreach ($categories as $key => $category)
    <input type="text" class="hidden" value="{{$category['score']}}" id="save_{{ ucfirst($key)}}">
@endforeach

<script type="module">
    $(document).ready(function() {
    $('#save_values').on('click', function() {

        // Obtener valores de los campos
        var url = $('#save_url').val();
        var strategy = $('#save_strategy').val();
        var accessibility = $('#save_Accessibility').val() || null;
        var pwa = $('#save_Pwa').val() || null;
        var performance = $('#save_Performance').val() || null;
        var seo = $('#save_Seo').val() || null;
        var bestPractices = $('#save_Best-practices').val() || null;

        $.ajax({
            url: '/save-metric-history', // Cambia la URL según tu ruta
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                url: url,
                strategy: strategy,
                accessibility_metric: accessibility,
                pwa_metric: pwa,
                performance_metric: performance,
                seo_metric: seo,
                best_practices_metric: bestPractices
            },
            success: function(response) {
                console.log(response);
                toastr.success('Congrats! Record saved.');
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                toastr.error(xhr.responseText);
            }
        });
    });
});
</script>