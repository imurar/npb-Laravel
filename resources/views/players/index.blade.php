<h1>選手一覧</h1>
<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>名前</th>
            <th>ポジション</th>
            <th>背番号</th>
            <th>球団</th>
            <th>高校</th>
            <th>大学</th>
            <th>誕生日</th>
            <th>出身地(都道府県)</th>
            <th>出身地(市区町村)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($players as $player)
        <tr>
            <td>{{ ($player->name) }}</td>
            <td>{{ ($player->position->name ?? '') }}</td>
            <td>{{ ($player->uniform_no) }}</td>
            <td>{{ ($player->team->name ?? '') }}</td>
            <td>{{ ($player->highschool) }}</td>
            <td>{{ ($player->university) }}</td>
            <td>{{ ($player->birthday) }}</td>
            <td>{{ ($player->prefecture->name ?? '') }}</td>
            <td>{{ ($player->city->name ?? '') }}</td>
        </tr>
        @endforeach
    </tbody>

</table>
<a href="{{ route('teams.show', ['team_id' => $team->id]) }}">戻る</a>