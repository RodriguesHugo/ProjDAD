Hello {{ $mail->receiver }},
This is a mail email for testing purposes! Also, it's the HTML version.
 
mail object values:
 
username: {{ $mail->mail_one }}
password: {{ $mail->mail_two }}
  
Thank You,
{{ $mail->sender }}