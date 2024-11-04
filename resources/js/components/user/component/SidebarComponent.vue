<template>
    <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
                <a href="index.html" class="logo">
                    <img src="assets/img/logos/hyper_email_valid_text.png" alt="navbar brand" class="navbar-brand" height="20" />
                </a>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="gg-menu-right"></i>
                    </button>
                    <button class="btn btn-toggle sidenav-toggler">
                        <i class="gg-menu-left"></i>
                    </button>
                </div>
                <button class="topbar-toggler more">
                    <i class="gg-more-vertical-alt"></i>
                </button>
            </div>
            <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <ul class="nav nav-secondary">
                    <li class="nav-item active">
                        <router-link :to="{name:'user.dashboard'}">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </router-link>
                    </li>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Components</h4>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'user.bulk.email'}">
                            <i class="fas fa-layer-group"></i>
                            <p>Bulk Email Validator</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'user.single.email'}">
                            <i class="fas fa-th-list"></i>
                            <p>Single Email Validator</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name:'user.my.plan'}">
                            <i class="fas fa-pen-square"></i>
                            <p>My Plan</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name:'user.view.plan'}">
                            <i class="fas fa-table"></i>
                            <p>View Plans</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name:'user.my.profile'}">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>My Profile</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <a href="#" @click.prevent="logout">
                            <i class="far fa-chart-bar"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="widgets.html">
                            <i class="fas fa-desktop"></i>
                            <p>Widgets</p>
                            <span class="badge badge-success">4</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../documentation/index.html">
                            <i class="fas fa-file"></i>
                            <p>Documentation</p>
                            <span class="badge badge-secondary">1</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#submenu">
                            <i class="fas fa-bars"></i>
                            <p>Menu Levels</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="submenu">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="#subnav1">
                                        <span class="sub-item">Level 1</span>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="subnav1">
                                        <ul class="nav nav-collapse subnav">
                                            <li>
                                                <a href="#">
                                                    <span class="sub-item">Level 2</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="sub-item">Level 2</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#subnav2">
                                        <span class="sub-item">Level 1</span>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="subnav2">
                                        <ul class="nav nav-collapse subnav">
                                            <li>
                                                <a href="#">
                                                    <span class="sub-item">Level 2</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="sub-item">Level 1</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    methods: {
        logout: function () {
            this.$store.dispatch("logout").then(res => {
                this.$router.push({ name: "frontend.home" });
            }).catch();
        },
    },
}
</script>