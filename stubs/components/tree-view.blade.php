@props(['data' => []])

<div x-data="{
    expandedNodes: [],
    
    toggle(id) {
        const index = this.expandedNodes.indexOf(id);
        if (index > -1) {
            this.expandedNodes.splice(index, 1);
        } else {
            this.expandedNodes.push(id);
        }
    },
    
    isExpanded(id) {
        return this.expandedNodes.includes(id);
    }
}" class="space-y-1">
    <template x-for="node in {{ json_encode($data) }}" :key="node.id">
        <div>
            <div @click="node.children ? toggle(node.id) : null" :class="node.children ? 'cursor-pointer' : ''" class="flex items-center gap-2 px-3 py-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition">
                <template x-if="node.children">
                    <svg :class="isExpanded(node.id) ? 'rotate-90' : ''" class="w-4 h-4 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                </template>
                
                <svg class="w-5 h-5 text-slate-500 dark:text-slate-400" :class="node.children ? 'text-amber-500' : 'text-blue-500'" fill="currentColor" viewBox="0 0 20 20">
                    <path x-show="node.children" d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"/>
                    <path x-show="!node.children" fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/>
                </svg>
                
                <span class="text-sm text-slate-900 dark:text-slate-100" x-text="node.label"></span>
            </div>
            
            <div x-show="node.children && isExpanded(node.id)" x-collapse class="ml-6 border-l-2 border-slate-200 dark:border-slate-700 pl-2">
                <template x-for="child in node.children" :key="child.id">
                    <div @click="child.children ? toggle(child.id) : null" :class="child.children ? 'cursor-pointer' : ''" class="flex items-center gap-2 px-3 py-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition">
                        <template x-if="child.children">
                            <svg :class="isExpanded(child.id) ? 'rotate-90' : ''" class="w-4 h-4 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </template>
                        
                        <svg class="w-4 h-4" :class="child.children ? 'text-amber-500' : 'text-blue-500'" fill="currentColor" viewBox="0 0 20 20">
                            <path x-show="child.children" d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"/>
                            <path x-show="!child.children" fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/>
                        </svg>
                        
                        <span class="text-sm text-slate-900 dark:text-slate-100" x-text="child.label"></span>
                    </div>
                </template>
            </div>
        </div>
    </template>
</div>