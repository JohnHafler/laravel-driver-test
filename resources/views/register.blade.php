<form action="register" method="post">
    <input type="hidden" type="text" name="key" value="rNkJGSL1sg@Jbz@iFWV8|4fB5lP{n#Z%HGGQtQOb">
    Country:<br>
    <select name="country">
        <option value="1">Ukraine</option>
        <option value="2">USA</option>
        <option value="3">Russia</option>
        <option value="4">Poland</option>
    </select><br><br>
    Password:<br>
    <input type="password" name="password"><br><br>
    Telephone:<br>
    <input type="text" name="tel"><br><br>
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <input type="submit" value="Submit">
</form>

Your id:
{{$user_id}}<br>

Your access_token:
{{$access_token}}
