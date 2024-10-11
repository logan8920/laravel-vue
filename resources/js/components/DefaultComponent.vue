<template>
	<main class="main" id="top">
        <div class="content">
            <NavComponent />
            <router-view></router-view>
            <FooterComponent />
        </div>
	</main>
</template>
<script>
import NavComponent from '../components/NavComponent.vue';
import FooterComponent from '../components/FooterComponent.vue';

export default {
    name: "DefaultComponent",
    components: {
        NavComponent,
        FooterComponent,
    }
}
</script>