<div class="row">
 <a href="{{ URL::to('/users/pdf') }}">Export PDF</a>
    <label>{{$user}}</label>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
        </tr>
        
        @foreach ($usersMariageList as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->address }}</td>
        </tr>
        @endforeach
    </table>
</div>