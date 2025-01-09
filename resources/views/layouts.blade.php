<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



    <title>Repository Design Pattern in Laravel 11</title>
    {{-- <style>
        .list-group-item a {
            color: #000;
            /* Default text color */
            font-weight: bold;
        }

        .list-group-item a:hover {
            color: #007bff;
            /* Bootstrap primary color */
            text-decoration: underline;
            /* Optional for hover effect */
        }
    </style> --}}
    <style>
        /* .font-weight-bold {
    font-weight: bold;
} */
    </style>
</head>

<body>

    <div class="container py-4">
        <nav class="mb-5">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('todos.index') ? 'active' : '' }}" href="{{ route('todos.index') }}">Todos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('chart_of_accounts.index') ? 'active' : '' }}" href="{{ route('chart_of_accounts.index') }}">COA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('account_ledgers.index') ? 'active' : '' }}" href="{{ route('account_ledgers.index') }}">Ledger</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('product_types.index') ? 'active' : '' }}" href="{{ route('product_types.index') }}">Product Type</a>
                </li>
            </ul>
        </nav>
        @yield('content')
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jsTree CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/themes/default/style.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jsTree JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/jstree.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
    <script>
        $('#chart-treeview').jstree({
            "core": {
                "themes": {
                    "responsive": true
                },
                "check_callback": true
            },
            "plugins": ["wholerow", "dnd"]
        }).on('click', 'a', function(event) {
            // Prevent jsTree's default click behavior
            event.stopImmediatePropagation();

            // Get the href attribute of the clicked link
            var href = $(this).attr('href');
            if (href) {
                // Navigate to the edit page
                window.location.href = href;
            }
        });

        // Apply the bold style to account names
        $(document).ready(function() {
            $('#chart-treeview a').each(function() {
                $(this).addClass('font-weight-bold'); // Add the bold class to each account name
            });
        });

        $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Select Chart of Account',
            allowClear: true
        });
    });
    </script>
</body>

</html>
