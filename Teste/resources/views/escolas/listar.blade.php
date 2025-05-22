@extends('layouts.app')

@section('title', 'Lista de Alunos')

@section('content')

@if(session('success'))
<script>
    Swal.fire({
    title: 'Sucesso!',
    html: "{!! html_entity_decode(session('success')) !!}",
    icon: 'success',
    confirmButtonText: 'Ok',
    allowOutsideClick: false,
    allowEscapeKey: false,
    confirmButtonColor: '#1b5e20'
});
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
    title: 'Erro!',
    text: "{{ session('error') }}",
    icon: 'error',
    confirmButtonText: 'Ok',
    confirmButtonColor: '#d33'
});
</script>
@endif

<body class="bg-gray-300">
    <div class="mb-6 flex justify-center">
        <img src="{{ asset('imagens/logo.png') }}" alt="Logo do sistema"
            class="w-20 h-20 rounded-full border-4 border-gray-300">
    </div>


    <script src="{{ asset('js/script.js') }}"></script>
</body>
@endsection