@component('mail::message')
# Hasil Pemerikasaan

Hai {{ $attendee->name }}. Maaf, anda gagal melalui proses pemeriksaan.
Data anda tidak sesuai dengan syarat dan ketentuan.

Terima kasih atas perhatiaannya,<br>
{{ config('app.name') }}
@endcomponent