<li class="inline-flex items-center">
    @if ($href ?? false)
        <a href="{{ $href }}" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
            {{ $slot }}
        </a>
    @else
        <span class="text-gray-500 inline-flex items-center">
            {{ $slot }}
        </span>
    @endif
</li>
