{{-- stubs/components/calendar.blade.php --}}
@props([
    'value' => null,
    'min' => null,
    'max' => null,
])

<div
    x-data="{
        currentDate: new Date('{{ $value ?? date('Y-m-d') }}'),
        selectedDate: '{{ $value }}',
        viewDate: new Date('{{ $value ?? date('Y-m-d') }}'),
        getDaysInMonth() {
            const year = this.viewDate.getFullYear();
            const month = this.viewDate.getMonth();
            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);
            const daysInMonth = lastDay.getDate();
            const startDay = firstDay.getDay();
            
            const days = [];
            for (let i = 0; i < startDay; i++) {
                days.push(null);
            }
            for (let i = 1; i <= daysInMonth; i++) {
                days.push(new Date(year, month, i));
            }
            return days;
        },
        formatDate(date) {
            if (!date) return '';
            return date.toISOString().split('T')[0];
        },
        selectDate(date) {
            this.selectedDate = this.formatDate(date);
            this.currentDate = date;
        },
        prevMonth() {
            this.viewDate = new Date(this.viewDate.getFullYear(), this.viewDate.getMonth() - 1);
        },
        nextMonth() {
            this.viewDate = new Date(this.viewDate.getFullYear(), this.viewDate.getMonth() + 1);
        }
    }"
    {{ $attributes->merge(['class' => 'bg-white border border-gray-200 rounded-lg p-4']) }}
>
    <div class="flex items-center justify-between mb-4">
        <button @click="prevMonth()" class="p-2 hover:bg-gray-100 rounded-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        
        <h3 class="text-lg font-semibold" x-text="viewDate.toLocaleDateString('en-US', { month: 'long', year: 'numeric' })"></h3>
        
        <button @click="nextMonth()" class="p-2 hover:bg-gray-100 rounded-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>
    
    <div class="grid grid-cols-7 gap-1 text-center">
        <div class="text-xs font-semibold text-gray-600 py-2">Su</div>
        <div class="text-xs font-semibold text-gray-600 py-2">Mo</div>
        <div class="text-xs font-semibold text-gray-600 py-2">Tu</div>
        <div class="text-xs font-semibold text-gray-600 py-2">We</div>
        <div class="text-xs font-semibold text-gray-600 py-2">Th</div>
        <div class="text-xs font-semibold text-gray-600 py-2">Fr</div>
        <div class="text-xs font-semibold text-gray-600 py-2">Sa</div>
        
        <template x-for="(day, index) in getDaysInMonth()" :key="index">
            <button
                @click="day && selectDate(day)"
                :disabled="!day"
                class="aspect-square p-2 text-sm rounded-lg transition-colors"
                :class="{
                    'hover:bg-gray-100': day,
                    'bg-blue-600 text-white': day && formatDate(day) === selectedDate,
                    'text-gray-400': !day
                }"
                x-text="day ? day.getDate() : ''"
            ></button>
        </template>
    </div>
    
    <input type="hidden" x-model="selectedDate" {{ $attributes->only(['name']) }} />
</div>