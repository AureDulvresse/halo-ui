@props([
    'label' => null,
    'value' => null,
    'format' => '24h',
])

<div x-data="{ 
    hour: {{ $value ? explode(':', $value)[0] : 12 }}, 
    minute: {{ $value ? explode(':', $value)[1] ?? 0 : 0 }},
    period: '{{ $format === '12h' ? 'AM' : '' }}'
}" class="space-y-2">
    @if($label)
        <label class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    @endif
    
    <div class="flex items-center gap-2">
        <input
            type="number"
            x-model="hour"
            min="{{ $format === '12h' ? 1 : 0 }}"
            max="{{ $format === '12h' ? 12 : 23 }}"
            class="w-20 px-3 py-2 border border-gray-300 rounded-md text-center"
        />
        <span class="text-2xl font-bold">:</span>
        <input
            type="number"
            x-model="minute"
            min="0"
            max="59"
            class="w-20 px-3 py-2 border border-gray-300 rounded-md text-center"
        />
        
        @if($format === '12h')
            <select x-model="period" class="px-3 py-2 border border-gray-300 rounded-md">
                <option value="AM">AM</option>
                <option value="PM">PM</option>
            </select>
        @endif
    </div>
    
    <input 
        type="hidden" 
        :value="String(hour).padStart(2, '0') + ':' + String(minute).padStart(2, '0')" 
        {{ $attributes->only(['name']) }}
    />
</div>