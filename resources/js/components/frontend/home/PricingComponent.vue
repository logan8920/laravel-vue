<template>
    <section class="bg-300" id="pricing">
        <div class="container py-8 py-lg-10 mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7">
                    <h3 class="fs-4 fs-lg-3 fw-bold text-center mb-2 mb-lg-x1 lh-sm">Pricing made easy</h3>
                    <p class="fs-8 mb-7 mb-lg-8 text-center lh-lg fw-normal">Show your pricing to your customers once
                        they’re here with easily modifiable pricing cards. </p>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-3"
                        v-if="dataFetch === false">
                        <div
                            class="p-x1 text-center price-card-1 bg-transparent border mb-3 mb-md-0 rounded-2 pricing-card">
                            <p class="fs-10 text-uppercase mb-3 fw-bold text-primary ls-2 d-flex justify-content-center">
                                <Skeleton width="40%" class="ms-2 mt-1"></Skeleton>
                            </p>
                            <h2 class="mb-3 d-flex justify-content-center">
                                <Skeleton width="30%" height="2rem" class="ms-2 mt-1"></Skeleton>
                            </h2>
                            <ul class="list-unstyled fs-8 lh-xl fw-light text-1100 ls-1">
                                <li class="py-x1 px-1 border-top">
                                    <Skeleton width="90%" class="ms-2 mt-1"></Skeleton>
                                </li>
                                <li class="py-x1 px-1 border-top">
                                    <Skeleton width="90%" class="ms-2 mt-1"></Skeleton>
                                </li>
                                <li class="py-x1 px-1 border-top">
                                    <Skeleton width="90%" class="ms-2 mt-1"></Skeleton>
                                </li>
                                <li class="py-x1 px-1 border-top">
                                    <Skeleton width="90%" class="ms-2 mt-1"></Skeleton>
                                </li>
                                <li class="mt-1 d-grid">
                                    <button class="btn btn-lg lh-xl">
                                        <Skeleton width="90%" class="ms-2 mt-1"></Skeleton>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="p-x1 text-center bg-white border shadow-sm rounded-2 pricing-card">
                            <p class="fs-10 text-uppercase mb-3 fw-bold text-primary ls-2 d-flex justify-content-center">
                                <Skeleton width="40%" class="ms-2 mt-1"></Skeleton>
                            </p>
                            <h2 class="mb-3 d-flex justify-content-center">
                                <Skeleton width="30%" height="2rem" class="ms-2 mt-1"></Skeleton>
                            </h2>
                            <ul class="list-unstyled fs-8 lh-xl fw-light text-1100 ls-1">
                                <li class="py-x1 px-1 border-top">
                                    <Skeleton width="90%" class="ms-2 mt-1"></Skeleton>
                                </li>
                                <li class="py-x1 px-1 border-top">
                                    <Skeleton width="90%" class="ms-2 mt-1"></Skeleton>
                                </li>
                                <li class="py-x1 px-1 border-top">
                                    <Skeleton width="90%" class="ms-2 mt-1"></Skeleton>
                                </li>
                                <li class="py-x1 px-1 border-top">
                                    <Skeleton width="90%" class="ms-2 mt-1"></Skeleton>
                                </li>
                                <li class="mt-1 d-grid">
                                    <button class="btn btn-lg lh-xl">
                                        <Skeleton width="90%" class="ms-2 mt-1"></Skeleton>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div
                            class="p-x1 text-center price-card-1 bg-transparent border mb-3 mb-md-0 rounded-2 pricing-card">
                            <p class="fs-10 text-uppercase mb-3 fw-bold text-primary ls-2 d-flex justify-content-center">
                                <Skeleton width="40%" class="ms-2 mt-1"></Skeleton>
                            </p>
                            <h2 class="mb-3 d-flex justify-content-center">
                                <Skeleton width="30%" height="2rem" class="ms-2 mt-1"></Skeleton>
                            </h2>
                            <ul class="list-unstyled fs-8 lh-xl fw-light text-1100 ls-1">
                                <li class="py-x1 px-1 border-top">
                                    <Skeleton width="90%" class="ms-2 mt-1"></Skeleton>
                                </li>
                                <li class="py-x1 px-1 border-top">
                                    <Skeleton width="90%" class="ms-2 mt-1"></Skeleton>
                                </li>
                                <li class="py-x1 px-1 border-top">
                                    <Skeleton width="90%" class="ms-2 mt-1"></Skeleton>
                                </li>
                                <li class="py-x1 px-1 border-top">
                                    <Skeleton width="90%" class="ms-2 mt-1"></Skeleton>
                                </li>
                                <li class="mt-1 d-grid">
                                    <button class="btn btn-lg lh-xl">
                                        <Skeleton width="90%" class="ms-2 mt-1"></Skeleton>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-3" v-else>
                        <div v-for="(plan, index) in plans" :key="index"
                            class="p-x1 text-center price-card-1 bg-transparent border mb-3 mb-md-0 rounded-2 pricing-card">
                            <p class="fs-10 text-uppercase mb-3 fw-bold text-primary ls-2"> {{ plan?.name }}</p>
                            <h2 class="mb-3"><span class="fs-6 fs-md-7 fw-bold">₹</span><span
                                    class="fs-2 fs-md-1 fw-bold">{{ plan?.price }}</span><span
                                    class="fs-9 lh-xl font-sans-serif">/
                                    {{ plan?.type }}</span></h2>
                            <ul class="list-unstyled fs-8 lh-xl fw-light text-1100 ls-1"
                                v-for="(benefit, i) in (plan?.benefits || [])" :key="i">
                                <li class="py-x1 px-1 border-top"> {{ benefit?.benefit }} </li>
                            </ul>
                            <button class="btn btn-secondary btn-lg lh-xl">Get Started Now</button>
                        </div>
                        <!-- <div class="p-x1 text-center bg-white border shadow-sm rounded-2 pricing-card">
                            <p class="fs-10 text-uppercase mb-3 fw-bold text-primary ls-2"> Unlimited</p>
                            <h2 class="mb-3"><span class="fs-6 fs-md-7 fw-bold">$</span><span
                                    class="fs-2 fs-md-1 fw-bold">99</span><span class="fs-9 lh-xl font-sans-serif">/
                                    mo</span></h2>
                            <ul class="list-unstyled fs-8 lh-xl fw-light text-1100 ls-1">
                                <li class="py-x1 px-1 border-top"> Unlimited Team Members </li>
                                <li class="py-x1 px-1 border-top"> Unlimited Cloud Storage </li>
                                <li class="py-x1 px-1 border-top"> Unlimited Meetings </li>
                                <li class="py-x1 px-1 border-top"> Premium Support </li>
                                <li class="mt-1 d-grid">
                                    <button class="btn btn-primary btn-lg lh-xl">Get Started Now</button>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Skeleton from 'primevue/skeleton';
import axios from 'axios';
import { placements } from '@popperjs/core';
export default {
    components: {
        Skeleton,
    },
    mounted() {
        document.querySelector("nav").style.backgroundColor = 'rgb(49, 60, 89)';
        document.querySelector("nav").classList.add("bg-black");
        window.scrollTo(0, 0);
        axios.get("public-plans")
        .then((res) => {
            this.plans = res.data;
            this.dataFetch = true;
        })
        .catch((error)=>{
            console.log(error);
            this.$toaster.error(error);
        })

    },
    data() {
        return {
            dataFetch: false,
            plans: {},
        };
    }
}
</script>