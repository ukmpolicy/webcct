<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('images/logo.ico') }}" class="logo" alt="CCT Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
