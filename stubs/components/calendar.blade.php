@props(['events' => [], 'month' => null, 'year' => null])

<div x-data="{
    currentDate: new Date({{ $year ?? 'new Date().getFullYear()' }}, {{ $month ?? 'new Date().getMonth()' }}),
    events: {{ json_encode($events) }},
    selectedDate: null,
    
    get monthName() {
        return this.currentDate.toLocaleDateString('en-US', { month: 'long', year: 'numeric' });
    },
    
    generateCalendar() {
        const year = this.currentDate.getFullYear();
        const month = this.currentDate.getMonth();
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        
        let days = [];
        for (let i = 0; i < firstDay; i++) days.push(null);
        for (let i = 1; i <= daysInMonth; i++) days.push(i);
        
        return days;
    },
    
    getEventsForDay(day) {
        if (!day) return [];
        const dateStr = `${this.currentDate.getFullYear()}-${String(this.currentDate.getMonth() + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
        return this.events.filter(e => e.date === dateStr);
    },
    
    previousMonth() {
        this.currentDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() - 1);
    },
    
    nextMonth() {
        this.currentDate = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1);
    }
}" class="bg-white dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700 p-6">
    
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-slate-900 dark:text-slate-100" x-text="monthName"></h2>
        <div class="flex gap-2">
            <button @click="previousMonth()" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button @click="nextMonth()" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Calendar Grid -->
    <div class="grid grid-cols-7 gap-px bg-slate-200 dark:bg-slate-700 border border-slate-200 dark:border-slate-700">
        <template x-for="day in ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']">
            <div class="bg-slate-50 dark:bg-slate-900 p-2 text-center text-sm font-semibold text-slate-700 dark:text-slate-300" x-text="day"></div>
        </template>
        
        <template x-for="(day, index) in generateCalendar()" :key="index">
            <div class="bg-white dark:bg-slate-800 min-h-[100px] p-2">
                <div x-show="day" class="text-sm font-medium text-slate-900 dark:text-slate-100" x-text="day"></div>
                <div x-show="day" class="mt-1 space-y-1">
                    <template x-for="event in getEventsForDay(day)">
                        <div :class="'text-xs p-1 rounded truncate ' + event.color" x-text="event.title"></div>
                    </template>
                </div>
            </div>
        </template>
    </div>
</div>