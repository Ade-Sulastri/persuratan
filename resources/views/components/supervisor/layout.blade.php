<!DOCTYPE html>
<html lang="en" class="antialiased">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
	<!--Replace with your tailwind.css once created-->


	<!--Regular Datatables CSS-->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" />
    {{-- Link CSS --}}
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
</head>

<body class="flex">
    <x-supervisor.sidebar/>

    @if (session('success'))
    <x-alert.success :message="session('success')"/>
    @endif

    @if (session('confirm'))
        <x-alert.confirm :message="session('confirm')"/>
    @endif

    <!-- Main Content -->
    <div class="flex-1">
        <x-supervisor.navbar/>
        {{ $slot }}
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
