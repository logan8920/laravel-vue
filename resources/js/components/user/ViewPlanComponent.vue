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
                            <div class="row justify-content-center align-items-center mb-5">
                                <div class="col-md-3 ps-md-0">
                                    <div class="card-pricing2 card-success">
                                        <div class="pricing-header">
                                            <h3 class="fw-bold mb-3">Standard</h3>
                                            <span class="sub-title">Lorem ipsum</span>
                                        </div>
                                        <div class="price-value">
                                            <div class="value">
                                                <span class="currency">$</span>
                                                <span class="amount">10.<span>99</span></span>
                                                <span class="month">/month</span>
                                            </div>
                                        </div>
                                        <ul class="pricing-content">
                                            <li>50GB Disk Space</li>
                                            <li>50 Email Accounts</li>
                                            <li>50GB Monthly Bandwidth</li>
                                            <li class="disable">10 Subdomains</li>
                                            <li class="disable">15 Domains</li>
                                        </ul>
                                        <a href="#" class="btn btn-success btn-border btn-lg w-75 fw-bold mb-3">Sign
                                            up</a>
                                    </div>
                                </div>
                                <div class="col-md-3 ps-md-0 pe-md-0">
                                    <div class="card-pricing2 card-primary">
                                        <div class="pricing-header">
                                            <h3 class="fw-bold mb-3">Business</h3>
                                            <span class="sub-title">Lorem ipsum</span>
                                        </div>
                                        <div class="price-value">
                                            <div class="value">
                                                <span class="currency">$</span>
                                                <span class="amount">20.<span>99</span></span>
                                                <span class="month">/month</span>
                                            </div>
                                        </div>
                                        <ul class="pricing-content">
                                            <li>60GB Disk Space</li>
                                            <li>60 Email Accounts</li>
                                            <li>60GB Monthly Bandwidth</li>
                                            <li>15 Subdomains</li>
                                            <li class="disable">20 Domains</li>
                                        </ul>
                                        <a href="#" class="btn btn-primary btn-border btn-lg w-75 fw-bold mb-3">Sign
                                            up</a>
                                    </div>
                                </div>
                                <div class="col-md-3 pe-md-0">
                                    <div class="card-pricing2 card-secondary">
                                        <div class="pricing-header">
                                            <h3 class="fw-bold mb-3">Premium</h3>
                                            <span class="sub-title">Lorem ipsum</span>
                                        </div>
                                        <div class="price-value">
                                            <div class="value">
                                                <span class="currency">$</span>
                                                <span class="amount">30.<span>99</span></span>
                                                <span class="month">/month</span>
                                            </div>
                                        </div>
                                        <ul class="pricing-content">
                                            <li>70GB Disk Space</li>
                                            <li>70 Email Accounts</li>
                                            <li>70GB Monthly Bandwidth</li>
                                            <li>20 Subdomains</li>
                                            <li>25 Domains</li>
                                        </ul>
                                        <a href="#" class="btn btn-secondary btn-border btn-lg w-75 fw-bold mb-3">Sign
                                            up</a>
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
export default {
    name: "ViewPlanComponent",
    components: {
        PageHeaderComponent,
    },
    data() {
        return {
            pageName: "View Plan",
            pageUrl: "user.view.plan",
        }
    }
}
</script>