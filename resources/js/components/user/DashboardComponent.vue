<template>

    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Dashboard</h3>
                    <h6 class="op-7 mb-2">User activity and subscription details here:</h6>
                </div>
                <div class="ms-md-auto py-2 py-md-0">
                    <router-link :to="{name: 'user.my.plan'}" class="btn btn-label-info btn-round me-2">Your Plan</router-link>
                    <router-link :to="{name: 'user.view.plan'}" class="btn btn-primary btn-round">View Plans</router-link>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center" v-if="dataFetch">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fas fa-money-check-alt"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Todays Credits</p>
                                        <h4 class="card-title">{{ boxesData?.todays_credits }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div v-if="dataFetch === false">
                                <div class="d-flex mb-2">
                                    <Skeleton shape="square" size="4rem" class="mr-2"></Skeleton>
                                    <div class="align-content-end ms-3">
                                        <Skeleton width="10rem" class="mb-3 ms-1"></Skeleton>
                                        <Skeleton width="5rem" class="mb-2 ms-1"></Skeleton>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center" v-if="dataFetch">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-info bubble-shadow-small">
                                        <i class="fas fa-user-check"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Total Email Verify</p>
                                        <h4 class="card-title">{{ boxesData?.total_email_verify }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div v-if="dataFetch === false">
                                <div class="d-flex mb-2">
                                    <Skeleton shape="square" size="4rem" class="mr-2"></Skeleton>
                                    <div class="align-content-end ms-3">
                                        <Skeleton width="10rem" class="mb-3 ms-1"></Skeleton>
                                        <Skeleton width="5rem" class="mb-2 ms-1"></Skeleton>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center" v-if="dataFetch">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                        <i class="fas fa-luggage-cart"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Days Left</p>
                                        <h4 class="card-title">{{ boxesData?.days_left }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div v-if="dataFetch === false">
                                <div class="d-flex mb-2">
                                    <Skeleton shape="square" size="4rem" class="mr-2"></Skeleton>
                                    <div class="align-content-end ms-3">
                                        <Skeleton width="10rem" class="mb-3 ms-1"></Skeleton>
                                        <Skeleton width="5rem" class="mb-2 ms-1"></Skeleton>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center" v-if="dataFetch">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                        <i class="far fa-check-circle"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Plan Price</p>
                                        <h4 class="card-title">₹ {{ boxesData?.plan_price }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div v-if="dataFetch === false">
                                <div class="d-flex mb-2">
                                    <Skeleton shape="square" size="4rem" class="mr-2"></Skeleton>
                                    <div class="align-content-end ms-3">
                                        <Skeleton width="10rem" class="mb-3 ms-1"></Skeleton>
                                        <Skeleton width="5rem" class="mb-2 ms-1"></Skeleton>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-round">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Last bulk upload Result</div>
                                <div class="card-tools">
                                    <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                                        <span class="btn-label">
                                            <i class="fa fa-pencil"></i>
                                        </span>
                                        Export
                                    </a>
                                    <a href="#" class="btn btn-label-info btn-round btn-sm">
                                        <span class="btn-label">
                                            <i class="fa fa-print"></i>
                                        </span>
                                        Print
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <DataTable :value="products">
                                <Column field="s_no" header="S.no">
                                    <template #body="slotProps">
                                        <Skeleton v-if="loading_sk" width="150px" />
                                        <span v-else>{{ slotProps.data.s_no }}</span>
                                    </template>
                                </Column>
                                <Column field="email" header="Email">
                                    <template #body="slotProps">
                                        <Skeleton v-if="loading_sk" width="150px" />
                                        <span v-else>{{ slotProps.data.email }}</span>
                                    </template>
                                </Column>
                                <Column field="status" header="Status">
                                    <template #body="slotProps">
                                        <Skeleton v-if="loading_sk" width="150px" />
                                        <span v-else>{{ slotProps.data.status }}</span>
                                    </template>
                                </Column>
                                <Column field="mx_record" header="Mx Record">
                                    <template #body="slotProps">
                                        <Skeleton v-if="loading_sk" width="150px" />
                                        <span v-else>{{ slotProps.data.mx_record }}</span>
                                    </template>
                                </Column>
                            </DataTable>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-round" v-if="dataFetch">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Single Email Result:</div>
                                <div class="card-tools">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-label-light dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Export
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-category">On {{ currentDate }}</div>
                        </div>
                        <div class="card-body pb-0 mb-4">
                            <div class="card shadow-sm mt-2 mb-2 w-100">
                                <div class="card-header bg-info text-white rounded">
                                    <h5 class="mb-0 text-white">{{ singleData?.email ?? '-' }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-5"><strong>Username:</strong></div>
                                        <div class="col-md-7">{{ singleData?.user ?? '-' }}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-5"><strong>Status:</strong></div>
                                        <div class="col-md-7"><span class="badge bg-success">{{ singleData?.status
                                                }}</span></div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-5"><strong>MX Record:</strong></div>
                                        <div class="col-md-7">{{ singleData?.mx_record ?? '-' }}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-5"><strong>Free Domain:</strong></div>
                                        <div class="col-md-7"><span class="badge bg-primary">{{ singleData?.free_email
                                                ?? '-' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-round" v-if="dataFetch === false">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Single Email Result:</div>
                                <div class="card-tools">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-label-light dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Export
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-category">
                                <div class="d-flex">On <Skeleton width="40%" class="ms-2 mt-1"></Skeleton>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0 mb-4">
                            <div class="card shadow-sm mt-2 mb-2 w-100">
                                <div class="card-header bg-info text-white rounded">
                                    <h5 class="mb-0 text-white">
                                        <Skeleton width="60%" class="ms-2 mt-1"></Skeleton>
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-5"><strong>Username:</strong></div>
                                        <div class="col-md-7">
                                            <Skeleton width="60%" class="ms-2 mt-1"></Skeleton>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-5"><strong>Status:</strong></div>
                                        <div class="col-md-7">
                                            <Skeleton width="30%" class="ms-2 mt-1"></Skeleton>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-5"><strong>MX Record:</strong></div>
                                        <div class="col-md-7">
                                            <Skeleton width="60%" class="ms-2 mt-1"></Skeleton>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-5"><strong>Free Domain:</strong></div>
                                        <div class="col-md-7">
                                            <Skeleton width="30%" class="ms-2 mt-1"></Skeleton>
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
import Skeleton from 'primevue/skeleton';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import axios from 'axios';

export default {
    components: {
        Skeleton,
        DataTable,
        Column,
    },
    data() {
        return {
            dataFetch: false,
            products: [
                { mx_record: 'P1001', status: 'Product 1', email: 'Category 1', s_no: 50 },
                { mx_record: 'P1002', status: 'Product 2', email: 'Category 2', s_no: 75 },
                { mx_record: 'P1001', status: 'Product 1', email: 'Category 1', s_no: 50 },
                { mx_record: 'P1002', status: 'Product 2', email: 'Category 2', s_no: 75 },
                { mx_record: 'P1001', status: 'Product 1', email: 'Category 1', s_no: 50 },
                { mx_record: 'P1002', status: 'Product 2', email: 'Category 2', s_no: 75 },
            ],
            singleData: false,
            loading_sk: true,
            boxesData: {},
            currentDate: false,
        }
    },
    methods: {


    },
    computed: {
        authInfo: function () {
            return this.$store.getters.authInfo;
        },
    },
    mounted() {
        const monthArray = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ];

        const date = new Date();
        this.currentDate = `${monthArray[date.getMonth()]} ${date.getDate().toString().padStart(2, '0')}, ${date.getFullYear()}`;
        axios.get('user-dashboard-info')
        .then((res)=>{

            this.boxesData = res.data; 
            this.products = res.data.bulk_email_data;
            this.singleData = res.data.single_data;
            this.loading_sk = false;
            this.dataFetch = true;

        })
        .catch((error)=>{
            console.log(error);
            this.$toaster.error(error);
        })
            
       
    },
    watch: {
        $route(e) {
        }

    }
}
</script>