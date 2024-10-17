<template>
    <div v-if="theme === 'frontend'">
        <main class="main" id="top">
            <div class="content">
                <NavComponent />
                <router-view></router-view>
                <FooterComponent />
            </div>
        </main>

    </div>

    <div v-if="theme === 'backend'">
        <div class="wrapper">
            <!-- Sidebar -->
            <SidebarComponent />
            <!-- End Sidebar -->
            <div class="main-panel">
                <HeaderComponent/>
                <router-view></router-view>
                <UserFooterComponent/>
            </div>
        </div>
    </div>

</template>
<script>
import NavComponent from '../components/NavComponent.vue';
import FooterComponent from '../components/FooterComponent.vue';
import SidebarComponent from './user/component/SidebarComponent.vue';
import HeaderComponent from './user/component/HeaderComponent.vue';
import { FooterComponent as UserFooterComponent } from './user/component/FooterComponent.vue';

export default {
    name: "DefaultComponent",
    data() {
        return {
            theme: "frontend",
        }
    },
    components: {
        NavComponent,
        FooterComponent,
        SidebarComponent,
        HeaderComponent,
        UserFooterComponent,


    },
    mounted() {
        this.loggedIn = this.$store.getters.authStatus || false;
    },
    watch: {
        $route(e) {
            if (e.meta.isFrontend === true) {
                this.theme = "frontend";
            } else {
                this.theme = "backend";
            }
        },
    },
}
</script>