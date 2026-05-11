<!doctype html>
<html lang="{{ getLocale() }}">
    <head>
        @include('head.php')

        <title>{{ app('workspace') }}</title>
        <style>
            body.public-view-body {
                min-height: 100vh;
            }

            .public-view-main {
                min-height: 100vh;
                height: auto;
                background-attachment: fixed;
            }

            .public-view-overlay {
                min-height: 100vh;
                height: auto;
                padding: 24px 16px 48px 16px;
            }

            .public-view-content {
                position: relative;
                top: auto;
                left: auto;
                transform: none;
                width: min(960px, 100%);
                min-width: 0;
                margin: 0 auto;
                text-align: left;
                overflow: visible;
            }

            .public-view-content .content {
                overflow-wrap: anywhere;
            }

            .public-view-content .plant-column {
                margin-left: 0;
                margin-right: 0;
            }

            .public-view-content .plant-column > .column {
                min-width: 0;
            }

            .public-view-content .plant-column table {
                width: 100%;
                table-layout: fixed;
            }

            .public-view-content .plant-column table td {
                word-break: break-word;
                overflow-wrap: anywhere;
                vertical-align: top;
            }

            .public-view-content .table-scroll-horizontally,
            .public-view-content .plant-log,
            .public-view-content .plant-gallery,
            .public-view-content .plant-tasks {
                overflow-x: auto;
            }

            .public-view-content .plant-gallery-photos {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
            }

            .public-view-content .plant-gallery-item {
                width: min(315px, 100%);
                margin-left: 0;
                margin-right: 0;
            }

            .public-view-content #plant-log-table td:last-child,
            .public-view-content #plant-log-table thead td:last-child {
                width: 88px;
                white-space: nowrap;
            }

            .public-view-content #plant-log-table td:nth-child(2),
            .public-view-content #plant-log-table thead td:nth-child(2) {
                width: 180px;
            }

            .public-view-content .plant-log-paginate td {
                white-space: normal;
            }

            @media screen and (max-width: 1024px) {
                .public-view-content .plant-column {
                    display: block;
                    width: 100%;
                    padding-left: 0;
                    padding-right: 0;
                }

                .public-view-content .plant-column .column {
                    width: 100%;
                    display: block;
                    padding-left: 0;
                    padding-right: 0;
                }

                .public-view-content .plant-column .column.is-two-third,
                .public-view-content .plant-column .column.is-one-third {
                    flex: none;
                    width: 100%;
                    max-width: 100%;
                }

                .public-view-content .plant-column table td:first-child,
                .public-view-content .plant-column table thead td:first-child {
                    width: 34%;
                }

                .public-view-content .plant-photo {
                    float: none;
                    width: 100%;
                    max-width: 560px;
                    height: min(72vw, 520px);
                    margin: 16px auto 0 auto;
                }

                .public-view-content .plant-log table {
                    min-width: 640px;
                }
            }

            @media screen and (max-width: 768px) {
                .public-view-overlay {
                    padding: 12px 10px 28px 10px;
                }

                .public-view-content {
                    padding: 14px;
                }

                .public-view-content .auth-header {
                    text-align: center;
                }

                .public-view-content .plant-column {
                    display: block;
                    width: 100%;
                    padding-left: 0;
                    padding-right: 0;
                }

                .public-view-content .plant-column .column {
                    width: 100%;
                    padding-left: 0;
                    padding-right: 0;
                }

                .public-view-content .plant-column table td:first-child,
                .public-view-content .plant-column table thead td:first-child {
                    width: 40%;
                }

                .public-view-content .plant-photo {
                    float: none;
                    width: 100%;
                    height: min(70vw, 420px);
                    margin-top: 12px;
                }

                .public-view-content .plant-tags-content {
                    width: 100%;
                }

                .public-view-content .task {
                    width: 100%;
                    margin-left: 0;
                    margin-right: 0;
                }

                .public-view-content .task-header {
                    height: auto;
                    min-height: 50px;
                }

                .public-view-content .task-header-title {
                    width: calc(100% - 52px);
                    overflow-wrap: anywhere;
                }

                .public-view-content .task-footer {
                    position: relative;
                }

                .public-view-content .task-footer-date,
                .public-view-content .task-footer-due,
                .public-view-content .task-footer-action {
                    display: block;
                    width: 100%;
                    float: none;
                    margin-bottom: 6px;
                }

                .public-view-content .plant-log table {
                    min-width: 560px;
                }

                .public-view-content #plant-log-table td:nth-child(2),
                .public-view-content #plant-log-table thead td:nth-child(2) {
                    width: 160px;
                }
            }

            @media screen and (max-width: 480px) {
                .public-view-content {
                    padding: 12px 10px;
                    border-radius: 0;
                }

                .public-view-content .auth-header img {
                    width: 96px;
                    height: 96px;
                }

                .public-view-content .auth-header h1 {
                    font-size: 1.8em;
                }

                .public-view-content .plant-details-title h1 {
                    font-size: 1.8em;
                    overflow-wrap: anywhere;
                }

                .public-view-content .plant-details-title h2 {
                    overflow-wrap: anywhere;
                }

                .public-view-content .plant-column table td {
                    padding: 8px;
                    font-size: 0.95em;
                }

                .public-view-content .plant-column table td:first-child,
                .public-view-content .plant-column table thead td:first-child {
                    width: 44%;
                }

                .public-view-content .plant-log table {
                    min-width: 520px;
                }

                .public-view-content #plant-log-table td:nth-child(2),
                .public-view-content #plant-log-table thead td:nth-child(2) {
                    width: 140px;
                }
            }
        </style>
    </head>

    <body class="public-view-body">
        <div id="app" class="auth-main public-view-main" style="background-image: url('{{ asset('img/background.jpg') }}');">
            <div class="auth-overlay public-view-overlay">
                <div class="auth-content public-view-content" style="max-width: 960px;">
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
