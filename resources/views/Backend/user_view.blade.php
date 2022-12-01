@extends('Backend.layouts')

@section('main-body')

<div style="margin-left:15%; margin-top:2%"> 
<h2 style="text-align:center"> {{$user->companyName}} </h2>
<hr>
<div class="container"> 
    <div class="row">
        <div class="col-md-6">
            <h4> Personal Details</h4>
            <p>First Name: {{$user->firstName}}</p>
            <p>Middle Name: {{$user->middleName}}</p>
            <p>Sur Name: {{$user->surName}}</p>
            <p>Full Name: {{$user->fullName}}</p>
            <p>User Name: {{$user->userName}}</p>
        </div>
        <div class="col-md-6">
            <h4>Email And Address</h4>
            <p>E-mail : {{$user->email}}</p>
            <p>phone : {{$user->phone}}</p>
            <p>Is Email Verified : 
                @if($user->is_verify !== 0){
                    Email Verified
                }
                @else {
                    Not Verified
                }
                @endif
                
                </p>
            <p>Country : {{$user->country}}</p>
            <p>Divition : {{$user->divition}}</p>
            <p>Distric : {{$user->ditric}}</p>
            <p>SubDistric : {{$user->subDitric}}</p>
            <p>Address : {{$user->address}}
                
            </p>
        </div>
    </div>
</div>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Company Details</h3>
            <p> Company Name : {{$user->companyName}} </p>
            <p> Company Trade Licence No : {{$user->companyTradeLicenceNo}} </p>
            <p> Company Logo : <img src="{{asset($user->companyLogo)}}"  alt="logo missing"/> </p>
            <p> Company Type : {{$user->type}} </p>
            <p> Is Account Approved : 
            @if($user->role !== 0){
                approve as {{$user->type}}
            }        
            @else{
                Not Approve
            }
            @endif
        </p>
        </div>
    </div>
</div>

</div>

@endsection