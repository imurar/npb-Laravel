<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <title>プロ野球選手名鑑</title>
    <body>
        <h1>プロ野球選手名鑑</h1>
        <a href="{{ route('teams.index') }}">球団一覧</a>
        <br>
        <a href="{{ route('players.index', ['team_id' => 1]) }}">選手一覧画面</a>
        <br>
        <a href="{{ route('players.create', ['team_id' => 1]) }}">選手登録画面</a>
    </body>
</html>
