Hello <i>{{ $mail->receiver }}</i>,
<p>This is a mail email for testing purposes! Also, it's the HTML version.</p>
 
<p><u>mail object values:</u></p>
 
<div>
<p><b>Username:</b>&nbsp;{{ $mail->mail_one }}</p>
<p><b>Password:</b>&nbsp;{{ $mail->mail_two }}</p>
</div>
 
Thank You,
<br/>
<i>{{ $mail->sender }}</i>