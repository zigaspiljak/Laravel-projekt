
@extends('layouts.master')
@section('title', 'Home')
@section('content')
<h1 class="site_header">Users</h1>
<table class="table align-middle table_custom">
    <thead>
        <tr>
            <th scope="col">Username:</th>
            <th scope="col">Email:</th>
            <th scope="col">Active:</th>
            <th scope="col">Status:</th>
            <th scope="col">Admin:</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php $count = 0; ?>
        {{-- {{ $projects }} --}}
        @if(!isset($error))
        @isset($users)
            @foreach ($users as $data)
            <tr>
                <td class="align-middle">{{ $data->name }}</td>
                <td class="align-middle">{{ $data->email }}</td>
                <td class="align-middle">{{ $data->active }}</td>
                <td class="align-middle">{{ $data->status }}</td>
                <td class="align-middle">{{ $data->admin }}</td>
                <td class="align-middle"> 
                    @if($data->active != true)
                    <button onclick="ActivateThis('{{ $data->email }}')" name="btnActivate" class="btn btn-add">Activate</button>
                    @endIf
                    @if($data->status == "okay")
                    <button onclick="LockThis('{{ $data->email }}')" name="btnLock" class="btn btn-delete">Lock</button>
                    @else
                    <button onclick="LockThis('{{ $data->email }}')" name="btnLock" class="btn btn-delete">Unlock</button>
                    <a href="{{ url('user'.$data->name) }} ">Profile</a>
                                   
                    @endIf
                </td>
            </tr>
            @endforeach
        @endisset
        @endif
    </tbody>
</table>
<script>
    function ActivateThis(item)
    {
        $.ajax({
            type: 'POST',
            url: "{{ route('post.users_activate') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
              'email':item
            },
            success: function (data) {
                // location.reload();
                 console.log(data);
                // data = JSON.parse(data);
                if(data.success === true)
                {
                    location.reload();
                }
            }
        });
    }

    function LockThis(item)
    {
        $.ajax({
            type: 'POST',
            url: "{{ route('post.users_lock') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
              'email':item
            },
            success: function (data) {
                // location.reload();
                 console.log(data);
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


