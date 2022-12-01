@extends('Backend.layouts')

@section('main-body')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<div style="margin-left:15%; margin-top:2%;">
    <table id="table_id" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>SurName</th>
                <th>Full Name</th>
                <th>User Name</th>
                <th>Company Name</th>
                <th>Business Type</th>
                <th>Country</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->firstName}}</td>
                <td>{{$user->middleName}}</td>
                <td>{{$user->surName}}</td>
                <td>{{$user->fullName}}</td>
                <td>{{$user->userName}}</td>
                <td>{{$user->companyName}}</td>
                <td>{{$user->type}}</td>
                <td>{{$user->country}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>
                    <a href ="{{url('admin-backend-users-view/'. $user->id)}}" class="btn btn-success">View</a>
                    <a href ="{{url('admin-backend-users-update-Role/'. $user->id)}}" class="btn btn-warning">Update User Role</a>
                </td>
                
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>

<script>
    $(document).ready(function () {
        $('#table_id').DataTable();
    });
</script>
@endsection