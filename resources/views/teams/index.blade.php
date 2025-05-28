<form action="{{ route('players.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="選手">
    <button type="submit">登録</button>
</form>

<a href="{{ route('top') }}">戻る</a>