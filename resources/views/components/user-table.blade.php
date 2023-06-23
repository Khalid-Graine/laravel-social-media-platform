@props(['users'])
<div>
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user['id'] }}</td>
            <td>{{ $user['name'] }}</td>
        </tr>
        @endforeach
    </table>
</div>
