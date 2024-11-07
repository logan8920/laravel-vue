<template>
    <div class="container">
        <div class="page-inner">
            <PageHeaderComponent :page="pageName" :url="pageUrl" />
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">{{ pageName }}</div>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center align-items-center mb-1">
                                <div class="col-md-4 ps-md-0 pe-md-0" v-if="dataFetch === false">
                                    <div class="card card-pricing card-pricing-focus">
                                        <div class="card-header">
                                            <h4 class="card-title d-flex justify-content-center">
                                                <Skeleton height="1.5rem" width="40%" class="ms-2 mt-1"></Skeleton>
                                            </h4>
                                            <div class="card-price d-flex justify-content-center">
                                                <Skeleton height="2rem" width="20%" class="ms-2 mt-2"></Skeleton>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <ul class="pricing-contents">
                                                <li class="d-flex" style="list-style : none;margin-top: 17px;">
                                                    <Skeleton shape="circle" size="1.5rem" class="me-3" />
                                                    <Skeleton width="70%" class="ms-2 mt-1"></Skeleton>
                                                </li>
                                                <li class="d-flex" style="list-style : none;margin-top: 17px;">
                                                    <Skeleton shape="circle" size="1.5rem" class="me-3" />
                                                    <Skeleton width="70%" class="ms-2 mt-1"></Skeleton>
                                                </li>
                                                <li class="d-flex" style="list-style : none;margin-top: 17px;">
                                                    <Skeleton shape="circle" size="1.5rem" class="me-3" />
                                                    <Skeleton width="70%" class="ms-2 mt-1"></Skeleton>
                                                </li>
                                                <li class="d-flex" style="list-style : none;margin-top: 17px;">
                                                    <Skeleton shape="circle" size="1.5rem" class="me-3" />
                                                    <Skeleton width="70%" class="ms-2 mt-1"></Skeleton>
                                                </li>
                                                <li class="d-flex"
                                                    style="list-style : none;margin-top: 17px;margin-bottom: 20px;">
                                                    <Skeleton shape="circle" size="1.5rem" class="me-3" />
                                                    <Skeleton width="70%" class="ms-2 mt-1"></Skeleton>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-footer">
                                            <a href="#" class="btn btn-border btn-lg w-75 fw-bold mb-3 mt-3">
                                                <Skeleton width="80%" class="ms-2 mt-1"></Skeleton>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 ps-md-0 pe-md-0" v-else>
                                    <div class="card card-pricing card-pricing-focus">
                                        <div class="card-header">
                                            <h4 class="card-title">{{ myPlan?.name }}</h4>
                                            <div class="card-price">
                                                <span class="price">₹ {{ myPlan?.price }}</span>
                                                <span class="text">/{{ myPlan?.type }}</span>
                                            </div>
                                        </div>
                                        <div class="card-body card-pricing2">
                                            <ul class="pricing-content">
                                                <li v-for="(item, index) in (myPlan?.benefits || [])" :key="index"
                                                    :class="{ disable: item.status === '0' }">
                                                    {{ item.benefit }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-light w-100" disabled>
                                                <b>My Plan</b>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import PageHeaderComponent from './component/PageHeaderComponent.vue';
import Skeleton from 'primevue/skeleton';
export default {
    name: "MyPlanComponent",
    components: {
        PageHeaderComponent,
        Skeleton,
    },
    data() {
        return {
            pageName: "My Plan",
            pageUrl: "user.my.plan",
            dataFetch: false,
            myPlan: {},
        }
    },
    mounted() {
        axios.get('/user-plan')
        .then((res) => {
            this.myPlan = res.data;
            this.dataFetch = true;
        }).catch((error) => {
            console.log(error);
            $this.toaster.error(error);
        });
    }
}
</script>