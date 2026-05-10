<!doctype html>
<html lang="{{ getLocale() }}">
    <head>
        @include('head.php')

        <title>{{ app('workspace') }}</title>
    </head>

    <body>
        <div id="app" class="auth-main" style="background-image: url('{{ asset('img/background.jpg') }}');">
            <div class="auth-overlay">
                <div class="auth-content" style="max-width: 960px;">
                    <div class="auth-header">
                        <img src="{{ asset('logo.png') }}" alt="Logo"/>

                        <h1>{{ app('workspace') }}</h1>
                    </div>

                    <div class="content is-default-text-color">
                        {%content%}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
