<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                     <router-link :to="{name: 'demo'}"
                        class="text-sm capitalize py-1 transition-all duration-300 hover:text-primary hover:underline" :class="!icon ? 'font-medium' : ''">
                        <i v-if="icon" class="lab lab-line-chevron-right"></i>
                        demo
                    </router-link>
                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
