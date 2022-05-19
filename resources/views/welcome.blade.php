
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
                <td class="align-middle"> <button onclick="DeleteThis('{{ $data->name }}')" name="btnDelete" class="btn btn-delete">Delete</button> </td>
            </tr>
            @endforeach
        @endisset
        @endif
    </tbody>
</table>
<script>
    function DeleteThis(item)
    {
        $.ajax({
            type: 'POST',
            url: "{{ route('post.delete_project') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
              'name':item
            },
            success: function (data) {
                // location.reload();
                // console.log(data);
                // data = JSON.parse(data);
                if(data.success === true)
                {
                    location.reload();
                }
            }
        });
    }
</script>
@endsection


