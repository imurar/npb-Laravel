<h1>{{ $team->name }}ページ</h1>

<a href="{{route('players.index', ['team_id' => $team->id])}}">所属選手一覧</a><br>
<a href="{{route('players.create', ['team_id' => $team->id])}}">選手追加</a><br>
<a href="{{route('teams.index')}}">戻る</a>