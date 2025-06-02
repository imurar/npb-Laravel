<h1>選手詳細</h1>
<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>背番号</th>
            <th>名前</th>
            <th>ポジション</th>
            <th>球団</th>
            <th>高校</th>
            <th>大学</th>
            <th>誕生日</th>
            <th>出身地(都道府県)</th>
            <th>出身地(市区町村)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ ($player->uniform_no) }}</td>
            <td>{{ ($player->name) }}</td>
            <td>{{ ($player->position->name ?? '') }}</td>
            <td>{{ ($player->team->name ?? '') }}</td>
            <td>{{ ($player->highschool) }}</td>
            <td>{{ ($player->university) }}</td>
            <td>{{ ($player->birthday) }}</td>
            <td>{{ ($player->prefecture->name ?? '') }}</td>
            <td>{{ ($player->city->name ?? '') }}</td>
        </tr>
    </tbody>

</table>
<a href="{{ route('players.edit', ['team_id' => $team->id, 'player_id' => $player->id]) }}">編集</a>
<a href="{{ route('players.index', ['team_id' => $team->id]) }}">戻る</a>