hhhhhhhhhhhhhhhhhh
<form action="{{ route('formname') }}" method="post">
    @csrf
    <label for="USERNAME">USERNAME</label> <br>
    <input type="text" name="username" >
    <label for="email">email</label> <br>
    <input type="text" name="email" >
    <input type="submit" value="submit">
</form>
