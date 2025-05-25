<h1>球団一覧</h1>

@foreach($teams as $team)
    <p>{{ $team->name }}</p>
@endforeach