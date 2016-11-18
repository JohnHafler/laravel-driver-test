@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                @if (isset($user_id))
                    <div class="panel-body">
                        Your user_id: {{$user_id}}
                    </div>

                    <div class="panel-body">
                        Your remember_token: {{$access_token}}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
