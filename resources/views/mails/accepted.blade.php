@component('mail::message')

<h2 class="ticket-competition">Ticket Cyber Competition And Talkshow</h2>

<p>Hai {{ $registration->name }}, Terima kasih telah mendaftar diri anda pada acara Cyber Competion And Talkshow. Berikut adalah nomor serial anda:</p>

<div class="serial">{{ $registration->serial_number }}</div><br>

<p>Jika anda adalah peserta offline, anda harus menunjukan email ini saat rechecking di tempat acara. Nomor serial ini dapat digunakan untuk absensi pada saat acara berlangsung. Untuk informasi lebih lanjut anda dapat mengunjungi sosial media kami atau dapat menghubungi kontak person berikut:</p>

<ul>
    <li>Ayatullah R. K. : 0822-7780-0517</li>
    <li>Jihan Dwi Sarah : 0823-6070-2396</li>
</ul>

<p>Terima kasih atas perhatiaannya,</p>
<p>#CCT_UKM-POLICY</p>

@endcomponent