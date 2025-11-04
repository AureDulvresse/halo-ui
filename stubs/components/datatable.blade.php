@props([
    'columns' => [],
    'data' => [],
    'sortable' => true,
    'searchable' => true,
    'selectable' => false,
    'paginated' => true,
    'perPage' => 10,
    'exportable' => false,
    'actions' => [],
])

<div
    x-data="{
        search: '',
        sortColumn: null,
        sortDirection: 'asc',
        selectedRows: [],
        currentPage: 1,
        perPage: {{ $perPage }},

        get filteredData() {
            let data = {{ json_encode($data) }};

            // Search
            if (this.search) {
                data = data.filter(row => {
                    return Object.values(row).some(value =>
                        String(value).toLowerCase().includes(this.search.toLowerCase())
                    );
                });
            }

            // Sort
            if (this.sortColumn) {
                data.sort((a, b) => {
                    let aVal = a[this.sortColumn];
                    let bVal = b[this.sortColumn];

                    if (this.sortDirection === 'asc') {
                        return aVal > bVal ? 1 : -1;
                    } else {
                        return aVal < bVal ? 1 : -1;
                    }
                });
            }

            return data;
        },

        get paginatedData() {
            if (!{{ $paginated ? 'true' : 'false' }}) return this.filteredData;

            const start = (this.currentPage - 1) * this.perPage;
            const end = start + this.perPage;
            return this.filteredData.slice(start, end);
        },

        get totalPages() {
            return Math.ceil(this.filteredData.length / this.perPage);
        },

        sort(column) {
            if (this.sortColumn === column) {
                this.sortDirection = this.sortDirection === 'asc' ? 'desc' : 'asc';
            } else {
                this.sortColumn = column;
                this.sortDirection = 'asc';
            }
        },

        toggleRow(id) {
            const index = this.selectedRows.indexOf(id);
            if (index > -1) {
                this.selectedRows.splice(index, 1);
            } else {
                this.selectedRows.push(id);
            }
        },

        toggleAll() {
            if (this.selectedRows.length === this.paginatedData.length) {
                this.selectedRows = [];
            } else {
                this.selectedRows = this.paginatedData.map(row => row.id);
            }
        },

        exportData() {
            const csv = this.convertToCSV(this.filteredData);
            const blob = new Blob([csv], { type: 'text/csv' });
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'data.csv';
            a.click();
        },

        convertToCSV(data) {
            const columns = {{ json_encode(array_column($columns, 'key')) }};
            const header = columns.join(',');
            const rows = data.map(row => columns.map(col => row[col]).join(','));
            return [header, ...rows].join('\\n');
        }
    }"
    class="space-y-4"
>
    <!-- Toolbar -->
    <div class="flex items-center justify-between gap-4 bg-white dark:bg-slate-800 p-4 rounded-lg border border-slate-200 dark:border-slate-700">
        <!-- Search -->
        @if($searchable)
            <div class="flex-1 max-w-md">
                <x-halo::input
                    x-model="search"
                    placeholder="Search..."
                    icon="search"
                />
            </div>
        @endif

        <!-- Actions -->
        <div class="flex items-center gap-2">
            <!-- Selected Actions -->
            <template x-if="selectedRows.length > 0">
                <div class="flex items-center gap-2">
                    <span class="text-sm text-slate-600 dark:text-slate-400">
                        <span x-text="selectedRows.length"></span> selected
                    </span>

                    @foreach($actions as $action)
                        <x-halo::button
                            size="sm"
                            variant="{{ $action['variant'] ?? 'outline' }}"
                            @click="{{ $action['action'] ?? '' }}"
                        >
                            {{ $action['label'] }}
                        </x-halo::button>
                    @endforeach
                </div>
            </template>

            <!-- Export -->
            @if($exportable)
                <x-halo::button
                    size="sm"
                    variant="outline"
                    icon="download"
                    @click="exportData()"
                >
                    Export
                </x-halo::button>
            @endif
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800">
        <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700">
            <thead class="bg-slate-50 dark:bg-slate-900/50">
                <tr>
                    @if($selectable)
                        <th class="w-12 px-6 py-3">
                            <input
                                type="checkbox"
                                @click="toggleAll()"
                                :checked="selectedRows.length === paginatedData.length && paginatedData.length > 0"
                                class="w-4 h-4 rounded border-slate-300 dark:border-slate-600 text-blue-600"
                            />
                        </th>
                    @endif

                    @foreach($columns as $column)
                        <th
                            @if($sortable && ($column['sortable'] ?? true))
                                @click="sort('{{ $column['key'] }}')"
                                class="cursor-pointer hover:bg-slate-100 dark:hover:bg-slate-800"
                            @endif
                            class="px-6 py-3 text-left text-xs font-medium text-slate-900 dark:text-slate-100 uppercase tracking-wider"
                        >
                            <div class="flex items-center gap-2">
                                <span>{{ $column['label'] }}</span>

                                @if($sortable && ($column['sortable'] ?? true))
                                    <div class="flex flex-col">
                                        <svg
                                            class="w-3 h-3 transition-colors"
                                            :class="{ 'text-blue-600 dark:text-blue-400': sortColumn === '{{ $column['key'] }}' && sortDirection === 'asc' }"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                        >
                                            <path d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </th>
                    @endforeach

                    @if(count($actions) > 0)
                        <th class="px-6 py-3 text-right text-xs font-medium text-slate-900 dark:text-slate-100 uppercase">
                            Actions
                        </th>
                    @endif
                </tr>
            </thead>

            <tbody class="bg-white dark:bg-slate-800 divide-y divide-slate-200 dark:divide-slate-700">
                <template x-for="(row, index) in paginatedData" :key="row.id || index">
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                        @if($selectable)
                            <td class="px-6 py-4">
                                <input
                                    type="checkbox"
                                    :checked="selectedRows.includes(row.id)"
                                    @click="toggleRow(row.id)"
                                    class="w-4 h-4 rounded border-slate-300 dark:border-slate-600 text-blue-600"
                                />
                            </td>
                        @endif

                        @foreach($columns as $column)
                            <td class="px-6 py-4 text-sm text-slate-700 dark:text-slate-300">
                                @if(isset($column['component']))
                                    {!! $column['component'] !!}
                                @else
                                    <span x-text="row['{{ $column['key'] }}']"></span>
                                @endif
                            </td>
                        @endforeach

                        @if(count($actions) > 0)
                            <td class="px-6 py-4 text-right">
                                <x-halo::dropdown align="right" width="48">
                                    <x-slot:trigger>
                                        <button class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                            </svg>
                                        </button>
                                    </x-slot:trigger>

                                    @foreach($actions as $action)
                                        <x-halo::dropdown.item
                                            :icon="$action['icon'] ?? null"
                                            :destructive="$action['destructive'] ?? false"
                                        >
                                            {{ $action['label'] }}
                                        </x-halo::dropdown.item>
                                    @endforeach
                                </x-halo::dropdown>
                            </td>
                        @endif
                    </tr>
                </template>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($paginated)
        <div class="flex items-center justify-between px-4 py-3 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg">
            <div class="flex-1 flex justify-between sm:hidden">
                <button
                    @click="currentPage--"
                    :disabled="currentPage === 1"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium rounded-md text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-700 hover:bg-slate-50 dark:hover:bg-slate-600 disabled:opacity-50"
                >
                    Previous
                </button>
                <button
                    @click="currentPage++"
                    :disabled="currentPage === totalPages"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium rounded-md text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-700 hover:bg-slate-50 dark:hover:bg-slate-600 disabled:opacity-50"
                >
                    Next
                </button>
            </div>

            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-slate-700 dark:text-slate-300">
                        Showing
                        <span class="font-medium" x-text="(currentPage - 1) * perPage + 1"></span>
                        to
                        <span class="font-medium" x-text="Math.min(currentPage * perPage, filteredData.length)"></span>
                        of
                        <span class="font-medium" x-text="filteredData.length"></span>
                        results
                    </p>
                </div>

                <div class="flex gap-2">
                    <button
                        @click="currentPage--"
                        :disabled="currentPage === 1"
                        class="px-3 py-2 text-sm font-medium rounded-md text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-700 hover:bg-slate-50 dark:hover:bg-slate-600 disabled:opacity-50 border border-slate-300 dark:border-slate-600"
                    >
                        Previous
                    </button>

                    <template x-for="page in totalPages" :key="page">
                        <button
                            @click="currentPage = page"
                            :class="{ 'bg-blue-600 text-white': currentPage === page }"
                            class="px-3 py-2 text-sm font-medium rounded-md text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-700 hover:bg-slate-50 dark:hover:bg-slate-600 border border-slate-300 dark:border-slate-600"
                            x-text="page"
                        ></button>
                    </template>

                    <button
                        @click="currentPage++"
                        :disabled="currentPage === totalPages"
                        class="px-3 py-2 text-sm font-medium rounded-md text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-700 hover:bg-slate-50 dark:hover:bg-slate-600 disabled:opacity-50 border border-slate-300 dark:border-slate-600"
                    >
                        Next
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
