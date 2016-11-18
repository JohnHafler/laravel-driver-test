@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <p class="h1">LIST ORDER</p>
            @foreach($order as $item)
                Your order_id: {{$item->id}}<br>
                Your oredr_status_id: {{$item->getStatusOrder()}}<br><br>
            @endforeach
        </div>
    </div>
</div>
@endsection
