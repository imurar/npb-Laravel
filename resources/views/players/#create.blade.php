<h1>選手登録画面</h1>
<!--
@if ($errors->any())
    <div style = "color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('players.store') }}">
    @csrf
    <label>名前: <input type="text" name="name" value="{{ old('name') }}"></label><br>
    <label>ポジション: <input type="text" name="position" value="{{ old('position') }}"></label><br>
    <label>背番号: <input type="text" name="uniform_no" value="{{ old('uniform_no') }}"></label><br>
    <label>球団: <input type="text" name="team" value="{{ old('team') }}"></label><br>
    <label>高校: <input type="text" name="highschool" value="{{ old('highschool') }}"></label><br>
    <label>大学: <input type="text" name="university" value="{{ old('university') }}"></label><br>
    <label>誕生日: <input type="text" name="birthday" value="{{ old('birthday') }}"></label><br>
    <label>出身地(都道府県): <input type="text" name="prefecture" value="{{ old('prefecture') }}"></label><br>
    <label>出身地(市区町村): <input type="text" name="city" value="{{ old('city') }}"></label><br>

    <button type="submit">登録</button>
</form>
-->

<a href="{{ route('players.index') }}">戻る</a>