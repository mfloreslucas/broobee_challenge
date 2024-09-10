@extends('index')

@section('h1_title', 'Metric History')

@section('title', 'Metric History')

@section('css_head', 'https://cdn.datatables.net/v/dt/dt-2.1.6/af-2.7.0/b-3.1.2/b-colvis-3.1.2/b-html5-3.1.2/b-print-3.1.2/fc-5.0.1/fh-4.0.1/sc-2.4.3/sb-1.8.0/sp-2.3.2/sl-2.0.5/datatables.min.css') 

@section('description', 'The table below displays the values of the metrics previously requested. Each row corresponds to an evaluated URL, and the columns show the results for accessibility, PWA (Progressive Web App), performance, SEO, and best practices. Additionally, the strategy used for each evaluation is included, along with action options to manage or review more details.')


@section('content')
    <div class="">
        <table id="example" class="display w-full" style="width: 100%">
            <thead >
                <tr>
                    <th>URL</th>
                    <th>Accessibility</th>
                    <th>PWA</th>
                    <th>Performance</th>
                    <th>SEO</th>
                    <th>Best Practices</th>
                    <th>Strategy ID</th>
                    <th>Date Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody >
            </tbody>
        </table>
    </div>


    <script type="module" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script type="module" src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>

    <script type="module" src="https://cdn.datatables.net/2.1.5/js/dataTables.tailwindcss.js"></script>
    <script type="module">

        $('#example').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            responsive: true,
            adjust: true,
            columnDefs: [
                { className: "dt-center", targets: [0, 1, 2, 3, 4, 5, 6, 7] }
            ],
            ajax: "{{ route('metric_history.index') }}",
            columns: [
                { data: 'url', name: 'url' },
                { data: 'accessibility_metric', name: 'accessibility_metric' },
                { data: 'pwa_metric', name: 'pwa_metric' },
                { data: 'performance_metric', name: 'performance_metric' },
                { data: 'seo_metric', name: 'seo_metric' },
                { data: 'best_practices_metric', name: 'best_practices_metric' },
                { data: 'strategy_id', name: 'strategy_id' },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action'},
            ]
        });

    </script> 
    
@endsection
