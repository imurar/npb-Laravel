<h1>選手登録画面</h1>
@if ($errors->any())
    <div style = "color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('players.store', ['team_id' => $team->id]) }}">
    @csrf
    <label>名前: <input type="text" name = "name" value="{{ old('name') }}"></label><br>
    
    <label>ポジション:
        <select name="position">
            @foreach ($positions as $position)
                <option value="{{ $position->name }}" {{ old('position') == $position->name ? 'selected' : '' }}>
                    {{ $position -> name }}
                </option>
            @endforeach
        </select>
    </label><br>

    <label>背番号: <input type="text" name="uniform_no" value="{{ old('uniform_no') }}"></label><br>
    <label>球団</label>
    <label>高校: <input type="text" name="highschool" value="{{ old('highschool') }}"></label><br>
    <label>大学: <input type="text" name="university" value="{{ old('university') }}"></label><br>
    <label>誕生日: <input type="text" name="birthday" value="{{ old('birthday') }}"></label><br>
    <label>出身地(都道府県): 
        <select name="prefecture">
            @foreach ($prefectures as $prefecture)
                <option value="{{$prefecture -> name}}" {{ old('prefecture') == $prefecture->name ? 'selectetd' : '' }}>
                    {{$prefecture -> name}}
                </option>
            @endforeach
        </select>
    </label><br>
    <label>市区町村:
        <select name="city">
            @foreach ($citys as $city)
                <option value="{{$city -> name}}" {{ old('city') == $city->name ? 'selected' : '' }}>
                    {{ $city->name }}
                </option>
            @endforeach
        </select>
    </label><br>
    <button type="submit">登録</button>
</form>

<a href="{{ route('teams.show', ['team_id' => $team->id]) }}">戻る</a>