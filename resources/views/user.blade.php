
@extends('layouts.master')
@section('title', 'Home')
@section('content')
<h1 class="site_header">Projects</h1>
<table class="table align-middle table_custom">
    <thead>
        <tr>
            <th scope="col">Name:</th>
            <th scope="col">Time:</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php $count = 0; ?>
        {{-- {{ $projects }} --}}
        @if(!isset($error))
        @isset($projects)
            @foreach ($projects as $data)
            <tr>
                <td class="align-middle">{{ $data->name }}</td>
                <td class="align-middle">{{ $data->timestamp }}</td>
            </tr>
            @endforeach
        @endisset
        @endif
    </tbody>
</table>
<script>
 
</script>
@endsection


