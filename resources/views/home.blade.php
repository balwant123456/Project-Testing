@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <div>
        <h1>Users</h1>
        <div id="showusers"><div>
    </div>
</div>
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>

<script>
$(function(){
    $.ajax({
        type: 'GET',
        dataType: "json",
        url: 'http://127.0.0.1:8000/api/get-all-users',
        headers: {         
            'Authorization' : 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhcHBWZXIiOiIwLjAuMCIsImV4cCI6NDcyNjM4OTEyMiwibG9jYWxlIjoiIiwibWFzdGVyVmVyIjoiIiwicGxhdGZvcm0iOiIiLCJwbGF0Zm9ybVZlciI6IiIsInVzZXJJZCI6IiJ9.QIZbmB5_9Xlap_gDhjETfMI6EAmR15yBtIQkWFWJkrg',
        },
        success: function (data, status, xhr) {
    // Displaying specific fields (id, name, email, age)
    var displayData = '';
    console.log(data.users);
    $(data.users).each(function(index, user) {
        displayData += '<p>ID: ' + user.id + '</p>';
        displayData += '<p>Name: ' + user.name + '</p>';
        displayData += '<p>Email: ' + user.email + '</p>';
        displayData += '<p>Age: ' + user.age + '</p>';
        displayData += '<hr>'; 
    });
    $('#showusers').html(displayData);
},
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
});
</script>
@endsection
