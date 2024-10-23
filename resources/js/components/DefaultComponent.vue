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

    <div class="wrapper" v-if="theme === 'backend'">
        <!-- Sidebar -->
        <SidebarComponent />
        <!-- End Sidebar -->
        <div class="main-panel">
            <HeaderComponent />
            <router-view></router-view>
            <UserFooterComponent />
        </div>
    </div>


</template>
<script>
import NavComponent from '../components/NavComponent.vue';
import FooterComponent from '../components/FooterComponent.vue';
import SidebarComponent from './user/component/SidebarComponent.vue';
import HeaderComponent from './user/component/HeaderComponent.vue';
import UserFooterComponent from './user/component/UserFooterComponent.vue';


export default {
    name: "DefaultComponent",
    data() {
        return {
            theme: "frontend",
            loading: false,
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
    methods: {
        async changeTheme(theme, cssFiles) {

            this.removeStyles();
            this.theme = theme;
            for (const file of cssFiles) {
                await import(`${file}?v=${Math.random()}`)
            }
            // cssFiles.forEach(file => {
            //     import(`${file}?v=${Math.random()}`)
            //         .then(() => {
            //             console.log(`${file} loaded`); 
            //         })
            //         .catch(err => {
            //             console.error(`Error loading ${file}:`, err);
            //         });
            // });
        },
        removeStyles() {
            [...document.querySelectorAll("style[data-vite-dev-id]")].forEach(style => style.remove());
        },

    },
    watch: {
        $route(e) {
            if (e.meta.isFrontend === true) {
                this.theme = "frontend";
                this.changeTheme('frontend', [
                    '../../css/frontend/theme.min.css'
                ]);
            } else {
                this.theme = "backend";
                this.changeTheme('backend', [
                    '../../css/backend/bootstrap.min.css',
                    '../../css/backend/plugins.min.css',
                    '../../css/backend/kaiadmin.min.css',
                    '../../css/backend/bulk-email.css',
                ]);
            }

            let loader = this.$loading.show({
                // container: document.body,
                canCancel: false,
                color: '#000',
                loader: 'bars',
                backgroundColor: '#fff',
                opacity: 0.9,
            });

            setTimeout(() => { loader.hide(); }, 1000);
        },
    },
}
</script>