@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <p class="h1">LOGIN</p>
            <form action="login" method="post">
                <input type="hidden" type="text" name="key" value="rNkJGSL1sg@Jbz@iFWV8|4fB5lP{n#Z%HGGQtQOb">
                Telephone:<br>
                <input type="text" name="tel"><br><br>
                Password:<br>
                <input type="password" name="password"><br><br>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>
@endsection
