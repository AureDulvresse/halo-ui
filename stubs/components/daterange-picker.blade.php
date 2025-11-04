@props([
    'label' => null,
    'placeholder' => 'Select date range',
    'format' => 'Y-m-d',
    'minDate' => null,
    'maxDate' => null,
])

<div
    x-data="{
        showPicker: false,
        startDate: null,
        endDate: null,
        currentMonth: new Date(),
        hoveredDate: null,
        
        get formattedRange() {
            if (!this.startDate) return '{{ $placeholder }}';
            if (!this.endDate) return this.formatDate(this.startDate);
            return this.formatDate(this.startDate) + ' - ' + this.formatDate(this.endDate);
        },
        
        formatDate(date) {
            return new Date(date).toLocaleDateString('en-US', { 
                year: 'numeric', 
                month: 'short', 
                day: 'numeric' 
            });
        },
        
        getDaysInMonth(month, year) {
            return new Date(year, month + 1, 0).getDate();
        },
        
        getFirstDayOfMonth(month, year) {
            return new Date(year, month, 1).getDay();
        },
        
        generateCalendar() {
            const year = this.currentMonth.getFullYear();
            const month = this.currentMonth.getMonth();
            const daysInMonth = this.getDaysInMonth(month, year);
            const firstDay = this.getFirstDayOfMonth(month, year);
            
            let days = [];
            
            // Previous month days
            const prevMonth = month === 0 ? 11 : month - 1;
            const prevYear = month === 0 ? year - 1 : year;
            const daysInPrevMonth = this.getDaysInMonth(prevMonth, prevYear);
            
            for (let i = firstDay - 1; i >= 0; i--) {
                days.push({
                    day: daysInPrevMonth - i,
                    month: prevMonth,
                    year: prevYear,
                    isCurrentMonth: false
                });
            }
            
            // Current month days
            for (let i = 1; i <= daysInMonth; i++) {
                days.push({
                    day: i,
                    month: month,
                    year: year,
                    isCurrentMonth: true
                });
            }
            
            // Next month days
            const remainingDays = 42 - days.length;
            const nextMonth = month === 11 ? 0 : month + 1;
            const nextYear = month === 11 ? year + 1 : year;
            
            for (let i = 1; i <= remainingDays; i++) {
                days.push({
                    day: i,
                    month: nextMonth,
                    year: nextYear,
                    isCurrentMonth: false
                });
            }
            
            return days;
        },
        
        selectDate(day) {
            const date = new Date(day.year, day.month, day.day);
            
            if (!this.startDate || (this.startDate && this.endDate)) {
                this.startDate = date;
                this.endDate = null;
            } else if (date < this.startDate) {
                this.endDate = this.startDate;
                this.startDate = date;
            } else {
                this.endDate = date;
                this.showPicker = false;
            }
        },
        
        isSelected(day) {
            const date = new Date(day.year, day.month, day.day);
            if (!this.startDate) return false;
            if (!this.endDate) return date.getTime() === this.startDate.getTime();
            return date >= this.startDate && date <= this.endDate;
        },
        
        isStart(day) {
            const date = new Date(day.year, day.month, day.day);
            return this.startDate && date.getTime() === this.startDate.getTime();
        },
        
        isEnd(day) {
            const date = new Date(day.year, day.month, day.day);
            return this.endDate && date.getTime() === this.endDate.getTime();
        },
        
        isInRange(day) {
            const date = new Date(day.year, day.month, day.day);
            if (!this.startDate || !this.endDate) return false;
            return date > this.startDate && date < this.endDate;
        },
        
        previousMonth() {
            this.currentMonth = new Date(this.currentMonth.getFullYear(), this.currentMonth.getMonth() - 1);
        },
        
        nextMonth() {
            this.currentMonth = new Date(this.currentMonth.getFullYear(), this.currentMonth.getMonth() + 1);
        },
        
        selectPreset(days) {
            const end = new Date();
            const start = new Date();
            start.setDate(start.getDate() - days);
            this.startDate = start;
            this.endDate = end;
            this.showPicker = false;
        }
    }"
    @click.outside="showPicker = false"
    class="relative"
>
    @if($label)
        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
            {{ $label }}
        </label>
    @endif
    
    <button
        type="button"
        @click="showPicker = !showPicker"
        class="w-full flex items-center justify-between px-4 py-2 bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400"
    >
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-slate-400 dark:text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <span class="text-slate-900 dark:text-slate-100" x-text="formattedRange"></span>
        </div>
        
        <svg class="w-5 h-5 text-slate-400 dark:text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    <div
        x-show="showPicker"
        x-cloak
        x-transition
        class="absolute z-50 mt-2 bg-white dark:bg-slate-800 rounded-lg shadow-xl border border-slate-200 dark:border-slate-700 p-4"
    >
        <div class="flex gap-4">
            <!-- Presets -->
            <div class="flex flex-col gap-2 pr-4 border-r border-slate-200 dark:border-slate-700">
                <button
                    @click="selectPreset(7)"
                    class="px-3 py-2 text-sm text-left text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded"
                >
                    Last 7 days
                </button>
                <button
                    @click="selectPreset(30)"
                    class="px-3 py-2 text-sm text-left text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded"
                >
                    Last 30 days
                </button>
                <button
                    @click="selectPreset(90)"
                    class="px-3 py-2 text-sm text-left text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded"
                >
                    Last 90 days
                </button>
            </div>

            <!-- Calendar -->
            <div>
                <!-- Month Navigation -->
                <div class="flex items-center justify-between mb-4">
                    <button
                        @click="previousMonth()"
                        class="p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    
                    <h3 class="text-sm font-semibold text-slate-900 dark:text-slate-100">
                        <span x-text="currentMonth.toLocaleDateString('en-US', { month: 'long', year: 'numeric' })"></span>
                    </h3>
                    
                    <button
                        @click="nextMonth()"
                        class="p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>

                <!-- Day Headers -->
                <div class="grid grid-cols-7 gap-1 mb-2">
                    <div class="text-center text-xs font-medium text-slate-500 dark:text-slate-400">Su</div>
                    <div class="text-center text-xs font-medium text-slate-500 dark:text-slate-400">Mo</div>
                    <div class="text-center text-xs font-medium text-slate-500 dark:text-slate-400">Tu</div>
                    <div class="text-center text-xs font-medium text-slate-500 dark:text-slate-400">We</div>
                    <div class="text-center text-xs font-medium text-slate-500 dark:text-slate-400">Th</div>
                    <div class="text-center text-xs font-medium text-slate-500 dark:text-slate-400">Fr</div>
                    <div class="text-center text-xs font-medium text-slate-500 dark:text-slate-400">Sa</div>
                </div>

                <!-- Days Grid -->
                <div class="grid grid-cols-7 gap-1">
                    <template x-for="day in generateCalendar()" :key="`${day.year}-${day.month}-${day.day}`">
                        <button
                            @click="selectDate(day)"
                            :class="{
                                'text-slate-400 dark:text-slate-600': !day.isCurrentMonth,
                                'bg-blue-600 text-white': isStart(day) || isEnd(day),
                                'bg-blue-100 dark:bg-blue-900/30': isInRange(day),
                                'hover:bg-slate-100 dark:hover:bg-slate-700': day.isCurrentMonth && !isSelected(day)
                            }"
                            class="w-10 h-10 flex items-center justify-center text-sm rounded-md transition-colors"
                        >
                            <span x-text="day.day"></span>
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </div>
</div>