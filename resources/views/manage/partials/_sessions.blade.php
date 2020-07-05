@if (session('success'))
    <script>
        new Noty({
            layout: 'topRight',
            theme: 'metroui',
            type: 'success',
            text: "{{session('success') }}",
            killer: true,
            timeout: 2000,
        }).show();
    </script>
@endif

@if (session('error'))
    <script>
        new Noty({
            layout: 'topRight',
            theme: 'metroui',
            type: 'error',
            text: "{{session('error') }}",
            killer: true,
            timeout: 2000,
        }).show();
    </script>
@endif

@if (session('warning'))
    <script>
        new Noty({
            layout: 'topRight',
            theme: 'metroui',
            type: 'warning',
            text: "{{session('warning') }}",
            killer: true,
            timeout: 2000,
        }).show();
    </script>
@endif

@if (session('info'))
    <script>
        new Noty({
            layout: 'topRight',
            theme: 'metroui',
            type: 'info',
            text: "{{session('info') }}",
            killer: true,
            timeout: 2000,
        }).show();
    </script>
@endif

@if (session('alert'))
    <script>
        new Noty({
            layout: 'topRight',
            theme: 'metroui',
            type: 'alert',
            text: "{{session('alert') }}",
            killer: true,
            timeout: 2000,
        }).show();
    </script>
@endif