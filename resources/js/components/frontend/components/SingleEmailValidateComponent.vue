<template>
    <div class="col-10 col-lg-7" v-if="success">
        <h4 class="text-center">Response</h4>
        <div class="card shadow-sm mt-2 mb-2 w-100">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0 text-white">{{ responseData.email }}</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-5"><strong>Username:</strong></div>
                    <div class="col-md-7">{{ responseData.user_name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-5"><strong>Status:</strong></div>
                    <div class="col-md-7"><span :class="{
                        'badge bg-success': responseData.status == 'valid',
                        'badge bg-danger': responseData.status == 'invalid'
                    }">{{ responseData.status }}</span></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-5"><strong>MX Record:</strong></div>
                    <div class="col-md-7">{{ responseData.mx_record }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-5"><strong>Free Domain:</strong></div>
                    <div class="col-md-7"><span class="badge bg-primary">{{
                        responseData.free_domain }}</span></div>
                </div>
            </div>
        </div>

        <button class="btn btn-info btn-sm ms-md-1 mt-lg-0 order-md-1 ms-auto" @click.prevent="handleBack"> Back <span
                class="uil uil-arrow-right"></span>
        </button>

    </div>
    <div class="col-10 col-lg-7" v-else>
        <form method="POST" onsubmit="return false;" @submit.prevent="handleSubmit" id="public-single-email">
            <div class="mb-2 w-100">
                <input class="form-control email-input" id="email" type="email" placeholder="Enter email" name="email"
                    required="required" />
            </div>

            <div class="mb-2 w-100">
                <vue-recaptcha ref="recaptcha" data-size="362px" data-theme="dark" :sitekey="siteKey"
                    style="width: 100%; max-width: 400px;"></vue-recaptcha>
            </div>
            <div class="d-grid">
                <button class="btn btn-lg btn-primary lh-xl mb-x1" type="submit"> Subscribe
                </button>
            </div>
        </form>
        <p class="text-center lh-lg mb-0">simply enter the email address in the box below, and
            our advanced email validator will provide you with real-time email deliverability
            results!.</p>
    </div>
</template>

<script>
import { VueRecaptcha } from 'vue-recaptcha'
export default {
	components: {
		VueRecaptcha,
	},
	data() {
		return {
			siteKey: "6Lee1mAqAAAAAKfTiLKhMFKiSvD0oEovKzUAg2Gq", // Use your actual site key here
			token: '',
			success: false,
		};
	},
	mounted() {
		$("#public-single-email").validate();
		//window.scrollTo(0, 0);

	},
	methods: {
		async handleSubmit(event) {

			if (!$(event.target).valid()) return;
			const form = event?.target;
			const btn = $(form).find("button[type=submit]")[0];
			const btnTxt = btn?.textContent;
			startLoadings(btn, "Please wait...");
			try {

				const res = await this.$store.dispatch("singleEmailVerify",event.target);
				console.log(res);
				if (res?.data?.errors) {
					Object.keys(res?.data?.errors).forEach(message => {
						res.errors[message].forEach(error => toastr.error(error))
					});
				}

				if (res?.data?.success) {
					this.responseData = res?.data?.response[0] ?? [];  // Store the response data
					this.success = true;
					console.log(res.response);
				} else {
					this.$toaster.error(res?.data?.response);
				}
				console.log(res);
			} catch (error) {
				this.$toaster.error(error?.response?.data?.errors || error?.response?.data?.message);
				stopLoadings(btn,btnTxt);
			}
			stopLoadings(btn, btnTxt);
		},
		handleBack() {
			this.success = false;
			console.log($(document).find("#public-single-email"))
			$(document).find("#public-single-email").validate();
		}
	}
}
</script>