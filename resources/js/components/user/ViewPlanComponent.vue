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
                        <div class="card-body" v-if="paymentLayout === false">
                            <div class="row justify-content-center align-items-center mb-5" v-if="dataFetch === true">
                                <div class="col-md-3 ps-md-0">
                                    <div :class="['card-pricing2', `card-${plan1?.color_code}`]">
                                        <div class="pricing-header">
                                            <h3 class="fw-bold mb-3">{{ plan1?.name }}</h3>
                                            <span class="sub-title">{{ plan1?.description }}</span>
                                        </div>
                                        <div class="price-value">
                                            <div class="value">
                                                <span class="currency">₹</span>
                                                <span class="amount">{{ plan1?.price }}.00</span>
                                                <span
                                                    :class="{ 'month': 'm' == plan1?.type, 'quater': 'q' == plan1?.type, 'year': 'y' == plan1?.type }">/{{
                                                    plan1?.price }}.<span>00</span></span>
                                            </div>
                                        </div>
                                        <ul class="pricing-content">
                                            <li v-for="(item, index) in (plan1?.benefits || [])" :key="index"
                                                :class="{ disable: item.status === '0' }">
                                                {{ item.benefit }}
                                            </li>
                                        </ul>
                                        <a href="#" @click.prevent="handlePurchase(plan1?.id)" class="btn btn-success btn-border btn-lg w-75 fw-bold mb-3">Purchase</a>
                                    </div>
                                </div>
                                <div class="col-md-3 ps-md-0 pe-md-0">
                                    <div :class="['card-pricing2', `card-${plan2?.color_code}`]">
                                        <div class="pricing-header">
                                            <h3 class="fw-bold mb-3">{{ plan2?.name }}</h3>
                                            <span class="sub-title">{{ plan2?.description }}</span>
                                        </div>
                                        <div class="price-value">
                                            <div class="value">
                                                <span class="currency">₹</span>
                                                <span class="amount">{{ plan2?.price }}.00</span>
                                                <span
                                                    :class="{ 'month': 'm' == plan2?.type, 'quater': 'q' == plan2?.type, 'year': 'y' == plan2?.type }">/{{
                                                    plan2?.price }}.<span>00</span></span>
                                            </div>
                                        </div>
                                        <ul class="pricing-content">
                                            <li v-for="(item, index) in (plan2?.benefits || [])" :key="index"
                                                :class="{ disable: item.status === '0' }">
                                                {{ item.benefit }}
                                            </li>
                                        </ul>
                                        <a href="#" @click.prevent="handlePurchase(plan2?.id)" class="btn btn-success btn-border btn-lg w-75 fw-bold mb-3">Purchase</a>
                                    </div>
                                </div>
                                <div class="col-md-3 pe-md-0">
                                    <div :class="['card-pricing2', `card-${plan3?.color_code}`]">
                                        <div class="pricing-header">
                                            <h3 class="fw-bold mb-3">{{ plan3?.name }}</h3>
                                            <span class="sub-title">{{ plan3?.description }}</span>
                                        </div>
                                        <div class="price-value">
                                            <div class="value">
                                                <span class="currency">₹</span>
                                                <span class="amount">{{ plan3?.price }}.00</span>
                                                <span
                                                    :class="{ 'month': 'm' == plan3?.type, 'quater': 'q' == plan3?.type, 'year': 'y' == plan3?.type }">/{{
                                                    plan3?.price }}.<span>00</span></span>
                                            </div>
                                        </div>
                                        <ul class="pricing-content">
                                            <li v-for="(item, index) in (plan3?.benefits || [])" :key="index"
                                                :class="{ disable: item.status === '0' }">
                                                {{ item.benefit }}
                                            </li>
                                        </ul>
                                        <a href="#" @click.prevent="handlePurchase(plan3?.id)" class="btn btn-success btn-border btn-lg w-75 fw-bold mb-3">Purchase</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center mb-5" v-else>
                                <div class="col-md-3 ps-md-0">
                                    <div class="card-pricing2 card-grey">
                                        <div class="pricing-header">
                                            <h3 class="fw-bold mb-3">
                                                <Skeleton width="40%" class="ms-2 mt-1"></Skeleton>
                                            </h3>
                                            <span class="sub-title">
                                                <Skeleton width="70%" class="ms-2 mt-1"></Skeleton>
                                            </span>
                                        </div>
                                        <div class="price-values">
                                            <div class="d-flex justify-content-center">
                                                <Skeleton shape="circle" size="7rem" />
                                            </div>
                                        </div>
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
                                        <a href="#" class="btn btn-border btn-lg w-75 fw-bold mb-3 mt-3">
                                            <Skeleton width="80%" class="ms-2 mt-1"></Skeleton>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-3 ps-md-0 pe-md-0">
                                    <div class="card-pricing2 card-grey">
                                        <div class="pricing-header">
                                            <h3 class="fw-bold mb-3">
                                                <Skeleton width="40%" class="ms-2 mt-1"></Skeleton>
                                            </h3>
                                            <span class="sub-title">
                                                <Skeleton width="70%" class="ms-2 mt-1"></Skeleton>
                                            </span>
                                        </div>
                                        <div class="price-values">
                                            <div class="d-flex justify-content-center">
                                                <Skeleton shape="circle" size="7rem" />
                                            </div>
                                        </div>
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
                                        <a href="#" class="btn btn-border btn-lg w-75 fw-bold mb-3 mt-3">
                                            <Skeleton width="80%" class="ms-2 mt-1"></Skeleton>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-3 pe-md-0">
                                    <div class="card-pricing2 card-grey">
                                        <div class="pricing-header">
                                            <h3 class="fw-bold mb-3">
                                                <Skeleton width="40%" class="ms-2 mt-1"></Skeleton>
                                            </h3>
                                            <span class="sub-title">
                                                <Skeleton width="70%" class="ms-2 mt-1"></Skeleton>
                                            </span>
                                        </div>
                                        <div class="price-values">
                                            <div class="d-flex justify-content-center">
                                                <Skeleton shape="circle" size="7rem" />
                                            </div>
                                        </div>
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
                                        <a href="#" class="btn btn-border btn-lg w-75 fw-bold mb-3 mt-3">
                                            <Skeleton width="80%" class="ms-2 mt-1"></Skeleton>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" v-else>
                            <SelectPaymentGateway :planId="selectedPlanId" @handle-back="handleBackToPlan" :paymentPlanDetail="selectedPlanDetails"></SelectPaymentGateway>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import PageHeaderComponent from './component/PageHeaderComponent.vue';
import SelectPaymentGateway from './component/SelectPaymentGateway.vue';
import axios from 'axios';
import Skeleton from 'primevue/skeleton';

export default {
    name: "ViewPlanComponent",
    components: {
        PageHeaderComponent,
        Skeleton,
        SelectPaymentGateway,
    },
    data() {
        return {
            dataFetch: false,
            pageName: "View Plan",
            pageUrl: "user.view.plan",
            plan1: {},
            plan2: {},
            plan3: {},
            paymentLayout: true,
            selectedPlanId: 0,
            selectedPlanDetails: {},
            allPlans: {},
        }
    },
    mounted() {
        axios.get('/plans')
        .then((res) => {
            this.plan1 = res.data[0];
            this.plan2 = res.data[1];
            this.plan3 = res.data[2];
            res.data.forEach((plan)=>{
                this.allPlans[plan.id] = plan;
            });
            //console.log(this.allPlans);
            this.dataFetch = true;
        }).catch((error) => {
            console.log(error);
            this.$toaster.error(error);
        });
    },
    methods: {
        handlePurchase: function(planId) {
            this.selectedPlanId = planId;
            this.selectedPlanDetails = this.allPlans[planId];
            this.paymentLayout = true;
        },
        handleBackToPlan: function(value){
            this.paymentLayout = value;
            this.selectedPlanId = 0;
        }
    }
}
</script>