@props([
    'columns' => [],
    'tasks' => [],
])

<div x-data="{
    columns: {{ json_encode($columns) }},
    tasks: {{ json_encode($tasks) }},
    draggedTask: null,
    draggedFromColumn: null,

    getTasksForColumn(columnId) {
        return this.tasks.filter(task => task.columnId === columnId);
    },

    startDrag(task, columnId) {
        this.draggedTask = task;
        this.draggedFromColumn = columnId;
    },

    onDragOver(event) {
        event.preventDefault();
    },

    onDrop(event, targetColumnId) {
        event.preventDefault();

        if (this.draggedTask) {
            this.draggedTask.columnId = targetColumnId;
            this.draggedTask = null;
            this.draggedFromColumn = null;

            // Dispatch event for backend sync
            this.$dispatch('task-moved', {
                taskId: this.draggedTask.id,
                newColumnId: targetColumnId
            });
        }
    },

    addTask(columnId) {
        const title = prompt('Task title:');
        if (title) {
            const newTask = {
                id: Date.now(),
                title: title,
                description: '',
                columnId: columnId,
                priority: 'medium',
                assignee: null
            };
            this.tasks.push(newTask);

            this.$dispatch('task-created', newTask);
        }
    },

    deleteTask(taskId) {
        if (confirm('Delete this task?')) {
            this.tasks = this.tasks.filter(t => t.id !== taskId);
            this.$dispatch('task-deleted', { taskId });
        }
    }
}" class="flex gap-4 overflow-x-auto pb-4">
    <template x-for="column in columns" :key="column.id">
        <div @dragover="onDragOver($event)" @drop="onDrop($event, column.id)"
            class="flex-shrink-0 w-80 bg-slate-100 dark:bg-slate-800 rounded-lg p-4">
            <!-- Column Header -->
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 rounded-full" :style="{ backgroundColor: column.color }"></div>
                    <h3 class="font-semibold text-slate-900 dark:text-slate-100" x-text="column.title"></h3>
                    <span
                        class="px-2 py-0.5 text-xs font-medium bg-slate-200 dark:bg-slate-700 text-slate-600 dark:text-slate-400 rounded-full"
                        x-text="getTasksForColumn(column.id).length"></span>
                </div>

                <button @click="addTask(column.id)"
                    class="p-1 hover:bg-slate-200 dark:hover:bg-slate-700 rounded transition-colors">
                    <svg class="w-5 h-5 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
            </div>

            <!-- Tasks -->
            <div class="space-y-3 min-h-[200px]">
                <template x-for="task in getTasksForColumn(column.id)" :key="task.id">
                    <div draggable="true" @dragstart="startDrag(task, column.id)"
                        class="bg-white dark:bg-slate-700 rounded-lg p-4 shadow-sm border border-slate-200 dark:border-slate-600 cursor-move hover:shadow-md transition-shadow">
                        <!-- Task Header -->
                        <div class="flex items-start justify-between mb-2">
                            <h4 class="font-medium text-slate-900 dark:text-slate-100" x-text="task.title"></h4>

                            <x-halo::dropdown align="right" width="48">
                                <x-slot:trigger>
                                    <button class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                        </svg>
                                    </button>
                                </x-slot:trigger>

                                <x-halo::dropdown.item icon="edit">Edit</x-halo::dropdown.item>
                                <x-halo::dropdown.item icon="trash" :destructive="true" @click="deleteTask(task.id)">
                                    Delete
                                </x-halo::dropdown.item>
                            </x-halo::dropdown>
                        </div>

                        <!-- Task Description -->
                        <p x-show="task.description" class="text-sm text-slate-600 dark:text-slate-400 mb-3"
                            x-text="task.description"></p>

                        <!-- Task Meta -->
                        <div class="flex items-center justify-between">
                            <!-- Priority Badge -->
                            <span
                                :class="{
                                    'bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400': task
                                        .priority === 'high',
                                    'bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-400': task
                                        .priority === 'medium',
                                    'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400': task
                                        .priority === 'low'
                                }"
                                class="px-2 py-1 text-xs font-medium rounded" x-text="task.priority"></span>

                            <!-- Assignee Avatar -->
                            <div x-show="task.assignee" class="flex -space-x-2">
                                <div
                                    class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-white text-xs font-medium ring-2 ring-white dark:ring-slate-700">
                                    <span x-text="task.assignee?.initials || 'U'"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </template>
</div>
