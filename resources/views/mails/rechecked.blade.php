@component('mail::message')
# Hasil Pemerikasaan

Hai {{ $attendee->name }}. Selamat anda telah berhasil melalui proses pemeriksaan ulang.

Terima kasih atas perhatiaannya, Good Luck ;)<br>
{{ config('app.name') }}
@endcomponent