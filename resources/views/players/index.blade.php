<h1>選手一覧</h1>
<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>背番号</th>
            <th>名前</th>
            <th>ポジション</th>
        </tr>
    </thead>
    <tbody>
        @foreach($players as $player)
        <tr>
            <td>{{ ($player->uniform_no) }}</td>
            <td>
            <a href="{{ route('players.show', ['team_id' => $team->id, 'player_id' => $player->id]) }}">
                {{ ($player->name) }}
            </a>

            <td>{{ ($player->position->name ?? '') }}</td>
        </tr>
        @endforeach
    </tbody>

</table>
<a href="{{ route('teams.show', ['team_id' => $team->id]) }}">戻る</a>