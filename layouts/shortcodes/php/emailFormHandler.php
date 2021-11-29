<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = [];
    parse_str(file_get_contents('php://input'), $body);

    $email = filter_var($body['senderEmail'], FILTER_SANITIZE_EMAIL);


    if (
        !array_key_exists("sessionKey", $body) ||
        ($body["sessionKey"] === "false") ||
        !$body["sessionKey"] === session_id()
    ) {
        http_response_code(400);
?>
<div class="alert alert-danger" role="alert">
  Invalid CSRF token.
</div>
<?php
    } elseif (!($email == $body['senderEmail']) || !filter_var($body['senderEmail'], FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
?>
<div class="alert alert-danger" role="alert">
    The email address you have provided is invalid.
</div>
<?php
    } else {
        $headers = [
            'From: {{ .Get "from"}} ',
            'Reply-To: ' . $body['senderEmail'],
        ];
        mail(
            $to="{{ .Get "to" }}",
            $subject=htmlspecialchars($body['subject']) . "{{ .Get "subject" }}",
            $message=wordwrap(htmlspecialchars($body['messageBody']), 70, "\r\n"),
            $additional_headers=implode("\r\n", $headers),
        );
?>
<div class="alert alert-success" role="alert">
  Your email has been sent!
</div>
<?php
    }
}
?>
<!-- Must close ?> -->
