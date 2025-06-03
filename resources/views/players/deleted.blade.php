<h1>削除された選手一覧</h1>
<table border="1" cellpadding="5">
    <tr>
        <th>名前</th>
        <th>操作</th>
    </tr>
    @foreach($players as $player)
        <tr>
            <td>{{ $player->name }}</td>
            <td>
                <form action="{{ route('players.restore', ['team_id' => $team_id, 'player_id' => $player->id]) }}" method="POST">
                    @csrf
                    <button type="submit">復元</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

<a href="{{ route('players.index', ['team_id' => $team_id]) }}">戻る</a>
