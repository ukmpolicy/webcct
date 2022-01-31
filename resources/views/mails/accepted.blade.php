<h1>Hasil Pemerikasaan</h1>

<p>Hai {{ $attendee->name }}. Selamat anda telah berhasil melalui proses pemeriksaan tahap pertama.
    Token anda adalah {{ $registration->token }}. Jangan berikan token ini kepada siapapun!</p>

<p>Code QR ini akan di scan oleh panitia saat pepemerikasaan ulang.</p>

<img src="{!!$message->embedData($qr, 'QrCode.png', 'image/png')!!}">

<p>Terima kasih atas perhatiaannya,</p>
<p>UKM-POLICY</p>