@extends('index')

@section('h1_title', 'Metric History')

@section('title', 'Metric History')

{{-- @section('css_head', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css')  --}}


@section('content')
    <div class="flex flex-col mx-3 md:mt-6 lg:flex-row">
            
        
        <div id="bootstrap-use" class="bootstrap-wrapper">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, iusto fugiat. Dignissimos voluptatum illo facere pariatur aut exercitationem, quisquam tempora quibusdam magni blanditiis sunt dolore expedita facilis enim sed quos?</p>
            <table id="example" class="table table-bordered data-table stripe hover"  style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th>URL</th>
                        <th>Accessibility</th>
                        <th>PWA</th>
                        <th>Performance</th>
                        <th>SEO</th>
                        <th>Best Practices</th>
                        <th>Strategy ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div> 

        

    </div>


    <script type="module" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="module" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="module" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script type="module">
        
        $('.data-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        scrollable: true,
        scrollX: true,
        adjust: true,
        ajax: "{{ route('metric_history.index') }}",
        columns: [
            { data: 'url', name: 'url' },
            { data: 'accessibility_metric', name: 'accessibility_metric' },
            { data: 'pwa_metric', name: 'pwa_metric' },
            { data: 'performance_metric', name: 'performance_metric' },
            { data: 'seo_metric', name: 'seo_metric' },
            { data: 'best_practices_metric', name: 'best_practices_metric' },
            { data: 'strategy_id', name: 'strategy_id' },
            { data: 'action', name: 'action'},
        ]
    });
    </script> 
    
@endsection
