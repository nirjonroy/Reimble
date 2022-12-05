@extends('Backend.layouts')

@section('main-body')

<div style="margin-left:15%; margin-top:2%;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <form action="{{url('admin-backend-users-update-Role-updated/'. $user->id)}}" method="POST">
                @csrf
                <label for="sel1" class="form-label">Select Role For {{$user->fullName}} ({{$user->type}}):</label><br>
                    <select class="form-select" id="sel1" name="role">
                    <option >Select</option>
                    <option value="2">Manufacturer</option>
                    <option value="1">Admin</option>
                    <option value="3">Distributor</option>
                    <option value="4">Dealer</option>
                    <option value="5">Retailer</option>
                </select><br>
                    <input type="submit" class="btn btn-success">
            </form>
            </div>
        </div>
    </div>
</div>

@endsection