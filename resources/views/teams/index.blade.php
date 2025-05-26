<h1>球団一覧</h1>

<a href="{{ route('teams/create') }}">球団作成</a>
@foreach($teams as $team)
    <p>{{ $team->name }}</p>
@endforeach