<!DOCTYPE html>
<html>
<head>
    @vite('resources/css/app.css')
    <title>Broobe - PageSpeed</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <form id="metricsForm">
        @csrf
        <label for="url">URL:</label>
        <input type="text" id="url" name="url" required>

        <div>
            @foreach($categories as $category)
                <label>
                    <input type="checkbox" name="categories[]" value="{{ $category->name }}"> {{ $category->name }}
                </label>
            @endforeach
        </div>

        <label for="strategy">Strategy:</label>
        <select id="strategy" name="strategy" required>
            @foreach($strategies as $strategy)
                <option value="{{ $strategy->name }}">{{ $strategy->name }}</option>
            @endforeach
        </select>

        <button type="submit">Get Metrics</button>
    </form>

    <div id="results"></div>

    <script>
        $(document).ready(function () {
            
            $('#metricsForm').submit(function (e) {
                e.preventDefault();
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/get-metrics',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function (data) {
                        console.log(data['lighthouseResult']);
                        //$('#results').html(data);
                    },
                    error: function (xhr) {
                        console.log(xhr);
                        $('#results').html('<p>Ocurrio un error inesperado</p>');
                    }
                });
            });
        });
    </script>
</body>
</html>
