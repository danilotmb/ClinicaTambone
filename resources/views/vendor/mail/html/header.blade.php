@props(['url'])

<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block; text-decoration: none;">
            @if (trim($slot) === 'Laravel')
                <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo" style="max-width: 100%;">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
