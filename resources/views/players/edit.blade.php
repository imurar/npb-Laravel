<h1>選手情報編集画面</h1>

<form method="POST" action="{{ route('players.update', ['team_id'=> $team->id, 'player_id' => $player->id]) }}" >
    @csrf
    @method('PUT')
    <label>背番号:
        <input type="text" name='uniform_no' value="{{ old('uniform_no', $player->uniform_no) }}">
    </label><br>
    <label>名前：
        <input type="text" name='name' value="{{ old('name', $player->name) }}">
    </label><br>
    <label>ポジション:
        <select name="position_id">
            @foreach($positions as $position)
                <option value="{{ $position->id }}" {{ old('position_id', $player->position_id) == $position->id ? 'selected' : ''}}>
                    {{ $position->name }}
                </option>
            @endforeach
        </select>
    </label><br>
    <label>球団: {{ $team->name }}</label><br>
    <label>高校:
        <input type="text" name='highschool' value="{{ old('highschool', $player->highschool) }}">
    </label><br>
    <label>大学:
        <input type="text" name='university' value="{{ old('university', $player->university) }}">
    </label><br>
    <label>誕生日:
        <input type="text" name='birthday' value="{{ old('birthday', $player->birthday) }}">
    </label><br>
    <label>出身地(都道府県):
        <select name="prefecture_id">
            @foreach($prefectures as $prefecture)
                <option value="{{ $prefecture->id }}" {{ old('prefecture_id', $player->prefecture_id) == $prefecture->id ? 'selected' : ''}}>
                    {{ $prefecture->name }}
                </option>
            @endforeach
        </select>
    </label><br>
        <label>出身地(市区町村):
        <select name="city_id">
            @foreach($citys as $city)
                <option value="{{ $city->id }}" {{ old('city_id', $player->city_id) == $city->id ? 'selected' : ''}}>
                    {{ $city->name }}
                </option>
            @endforeach
        </select>
    </label><br>
    <button type="submit">更新</button>
    <a href="{{ route('players.show', ['team_id' => $team->id, 'player_id' => $player->id]) }}">戻る</a>
</form>