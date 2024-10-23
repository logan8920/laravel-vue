<template>
    <div class="page-header">
        <h3 class="fw-bold mb-3">{{ page }}</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <router-link :to="{name:'user.dashboard'}">
                    <i class="icon-home"></i>
                </router-link>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <router-link :to="{name:url}">{{ page }}</router-link>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "PageHeaderComponent",
    props: {
        page: {
            type: String,
            required: true,
        },
        url: {
            type: String,
            required: true,
        },
    }
}
</script>