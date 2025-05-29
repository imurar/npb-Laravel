<h1>球団一覧</h1>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>id</th>
            <th>球団名</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teams as $team)
        <tr>
            <td>{{ $team->id }}</td>
            <td>
                <a href="{{ route('teams.show', ['id' => $team->id]) }}">
                    {{ $team->name }}
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    <a href="{{route('top')}}">戻る</a>