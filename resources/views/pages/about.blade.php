<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>LARP</title>
</head>

<body>
    @extends('layouts.app') @section('content')

    <h1>@lang('lang.about')</h1>
    <div class="card">
        <p>@lang('lang.abouttext')</p>
    </div>
    @endsection
</body>

</html>