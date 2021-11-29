<?php
// {{ $url := urls.Parse .Site.BaseURL }}
session_set_cookie_params(
    [
        "path" => "{{ $url.Path }}",
        "domain" => "{{ $url.Host }}",
        "secure" => true,
        "httponly" => true,
        "samesite" => "Strict",
    ]
);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    {{- partial "head.html" . -}}
    <body>
        {{- partial "header.html" . -}}
        <div id="content">
        {{- block "main" . }}{{- end }}
        </div>
        {{- partial "footer.html" . -}}
    </body>
</html>
