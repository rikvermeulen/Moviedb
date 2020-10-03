<template>
    <div>
        <button v-for="(color, theme) in themes"
            class="rounded-full w-4 h-4 bg-default border mr-2 focus:outline-none"
            :class="{'border-accent': selectedTheme == theme}"
            :style="{ backgroundColor: color }"
            @click="selectedTheme =  theme">
        </button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                themes: {
                    'theme-light': '#f5f6f9',
                    'theme-dark': '#4a5568'
                },
                selectedTheme: 'theme-dark'
            };
        },

        created(){
            this.selectedTheme = localStorage.getItem('theme') || 'theme-dark';
        },

        watch: {
            selectedTheme(){
                document.body.className = document.body.className.replace(/theme-\w+/, this.selectedTheme);
                localStorage.setItem('theme', this.selectedTheme);
            }
        }
    }
</script>
