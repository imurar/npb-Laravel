<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <title>阪神名鑑</title>
    <body>
        <h1>阪神タイガース</h1>
        <a href="{{ route('satoteru') }}">佐藤 輝明</a> 
        <br>
        <a href="{{ route('teams') }}">球団一覧</a>
    </body>
</html>
