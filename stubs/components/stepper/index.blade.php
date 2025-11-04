@props([
    'steps' => [],
    'current' => 0,
])

<nav aria-label="Progress">
    <ol role="list" class="flex items-center">
        @foreach($steps as $index => $step)
            <li class="{{ $index !== count($steps) - 1 ? 'flex-1' : '' }}">
                <div class="group flex items-center">
                    <span class="flex items-center px-6 py-4 text-sm font-medium">
                        <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full {{ $index < $current ? 'bg-blue-600 dark:bg-blue-500' : ($index === $current ? 'border-2 border-blue-600 dark:border-blue-500' : 'border-2 border-slate-300 dark:border-slate-600') }}">
                            @if($index < $current)
                                <svg class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                </svg>
                            @else
                                <span class="{{ $index === $current ? 'text-blue-600 dark:text-blue-400' : 'text-slate-500 dark:text-slate-400' }}">
                                    {{ $index + 1 }}
                                </span>
                            @endif
                        </span>

                        <span class="ml-4 text-sm font-medium {{ $index <= $current ? 'text-blue-600 dark:text-blue-400' : 'text-slate-500 dark:text-slate-400' }}">
                            {{ $step }}
                        </span>
                    </span>

                    @if($index !== count($steps) - 1)
                        <div class="flex-1 h-0.5 {{ $index < $current ? 'bg-blue-600 dark:bg-blue-500' : 'bg-slate-200 dark:bg-slate-700' }}"></div>
                    @endif
                </div>
            </li>
        @endforeach
    </ol>
</nav>
