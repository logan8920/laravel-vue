<template>
    <VueElementLoading spinner="bar-fade-scale" color="#F23E14" :active="isActive" :is-full-screen="true"/>
</template>

<script>
import VueElementLoading from 'vue-element-loading';

export default {
    name: "VueElementLoading",
    components: {VueElementLoading},
    props: {
        isActive: {
            type: Boolean,
            required: true
        }
    }
}
</script>
