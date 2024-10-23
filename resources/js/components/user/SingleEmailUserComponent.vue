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
                            <div class="row justify-content-center">
                                <div class="col-sm-6 py-5 d-flex justify-content-center alert rounded">
                                    <SingleEmailValidateComponent />
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
import SingleEmailValidateComponent from '../frontend/components/SingleEmailValidateComponent.vue';
import PageHeaderComponent from './component/PageHeaderComponent.vue';
export default {
    name: "singleEmailUserComponent",
    components: {
        SingleEmailValidateComponent,
        PageHeaderComponent,
    },
    data() {
        return {
            pageName: "Single Email Validator",
            pageUrl: "user.single.email",
        }
    }
}
</script>