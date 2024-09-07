<div class="flex flex-wrap justify-around" >
@foreach ($categories as $key => $category)
    @php
        $score = $category['score'] * 100; 
        $color = '';

        if ($score >= 90) {
            $color = 'text-green-600';
        } elseif ($score >= 50) {
            $color = 'text-orange-500';
        } else {
            $color = 'text-purple-600';
        }

        $dashArray = ($score / 100) * 75;
    @endphp

    <div class="relative size-40 mb-4">
        <svg class="rotate-[135deg] size-full" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
            <!-- Background Circle (Gauge) -->
            <circle cx="18" cy="18" r="16" fill="none" class="stroke-current text-gray-200 dark:text-neutral-700" stroke-width="1" stroke-dasharray="75 100"></circle>
        
            <!-- Gauge Progress -->
            <circle cx="18" cy="18" r="16" fill="none" class="stroke-current {{ $color }}" stroke-width="2" stroke-dasharray="{{ $dashArray }} 100"></circle>
        </svg>

        <!-- Value Text -->
        <div class="absolute top-1/2 start-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
            <span class="text-4xl font-bold {{ $color }}">{{ round($score) }}</span>
            <span class="{{ $color }} block">{{ ucfirst(str_replace('-', ' ', $key)) }}</span> 
        </div>
    </div>
@endforeach
</div>
<div class="flex flex-wrap mb-6 w-full md:w-[32%] ">
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
    <input type="text" class="hidden" value="{{$category['score']}}" id="save_{{ ucfirst(str_replace('-', ' ', $key))}}">
@endforeach

<script>
    $(document).ready(function() {
    $('#save_values').on('click', function() {
        // Obtener valores de los campos
        var url = $('#url').val();
        var strategy = document.getElementById('strategy').value;
        
        var accessibility = document.getElementById('save_accessibility') ? document.getElementById('save_accessibility').value : null;
        var pwa = document.getElementById('save_pwa') ? document.getElementById('save_pwa').value : null;
        var performance = document.getElementById('save_performance') ? document.getElementById('save_performance').value : null;
        var seo = document.getElementById('save_seo') ? document.getElementById('save_seo').value : null;
        var bestPractices = document.getElementById('save_best_practices') ? document.getElementById('save_best_practices').value : null;



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
                toastr.success('Congrats! Register saved.');
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                toastr.error(xhr.responseText);
            }
        });
    });
});
</script>