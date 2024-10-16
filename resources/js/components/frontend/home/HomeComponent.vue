<template>
	<div data-bs-target="#navbar" tabindex="0">
		<section class="hero-section overflow-hidden position-relative z-0 mb-4 mb-lg-0" id="home">
			<div class="hero-background" style="min-height: 49rem;">
				<div class="container">
					<div class="row gy-4 gy-md-8 pt-9 pt-lg-0">
						<div class="col-lg-6 text-center text-lg-start">
							<h1 class="fs-2 fs-lg-1 text-white fw-bold mb-2 mb-lg-x1 lh-base mt-3 mt-lg-0">Simple and
								fast <span class="text-nowrap">email validation service</span></h1>
							<p class="fs-8 text-white mb-3 mb-lg-4 lh-lg">Email Validation API: Clean Lists, Boost
								Deliverability & Maximize ROI.Remove fake emails and spam users from your email lists.
							</p>
							<div class="d-flex justify-content-center justify-content-lg-start">
								<a class="btn btn-primary btn-lg lh-xl mb-4 mb-md-5 mb-lg-7" href="#explore-more"
									@click.prevent="scrollToSection('explore-more')">Explore more</a>
							</div>
							<p class="mb-x1 fs-10 button-text text-uppercase fw-bold lh-base text-300 d-none">Download
								our app</p>
							<div
								class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-2 position-relative z-2 d-none">
								<a class="border-0 p-0 bg-transparent cursor-pointer rounded-1" href="#!"> <img
										class="img-fluid" src="assets/img/logos/App_Store.webp"
										alt="assets/img/logos/App_Store.webp" /></a>
								<a class="border-0 p-0 bg-transparent cursor-pointer rounded-1" href="#!"> <img
										class="img-fluid" src="assets/img/logos/Play_Store.webp"
										alt="assets/img/logos/Play_Store.webp" /></a>
							</div>
						</div>
						<div class="col-lg-6 position-lg-relative">
							<div class="position-lg-absolute z-1 text-center"><img class="img-fluid chat-image ms-13"
									src="assets/img/home/1a9fa827-ab76-453d-9d47-543c6d7b2cb0.png" alt="" />
								<div class="position-absolute dots d-none d-md-block"> <img
										class="img-fluid w-50 w-lg-75" src="assets/img/illustrations/Dots.webp"
										alt="" /></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="position-absolute bottom-0 start-0 end-0 z-1"><img class="wave mb-md-n2"
					src="assets/img/illustrations/Wave.svg" alt="" />
				<div class="bg-white py-2 py-md-5"></div>
			</div> -->
		</section>

		<section class="bg-300 position-relative z-0" id="explore-more">
			<div class="container py-8 py-lg-9">
				<div class="row justify-content-center">
					<div class="col-md-8 col-lg-8">
						<div class="row justify-content-center">
							<div class="col-12 col-lg-10">
								<h2 class="fs-4 fs-lg-3 fw-bold text-center mb-2 lh-sm">Free Email Validator</h2>
								<p class="fs-8 mb-5 mb-lg-6 text-center lh-lg fw-normal"> Validate email instantly with
									our cutting-edge free online email verification tool!</p>
							</div>
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

								<button class="btn btn-info btn-sm ms-md-1 mt-lg-0 order-md-1 ms-auto"
									@click.prevent="handleBack"> Back <span class="uil uil-arrow-right"></span>
								</button>

							</div>
							<div class="col-10 col-lg-7" v-else>
								<form method="POST" onsubmit="return false;" @submit.prevent="handleSubmit"
									id="public-single-email">
									<div class="mb-2 w-100">
										<input class="form-control email-input" id="email" type="email"
											placeholder="Enter email" name="email" required="required" />
									</div>

									<div class="mb-2 w-100">
										<vue-recaptcha ref="recaptcha" data-size="362px" data-theme="dark"
											:sitekey="siteKey" style="width: 100%; max-width: 400px;"></vue-recaptcha>
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

						</div>
					</div>
				</div>
			</div>
			<div class="position-absolute bottom-0 end-0 z-n1 d-none d-lg-block"><img
					src="assets/img/illustrations/Green_dots.svg" alt="" /></div>
			<div class="position-relative bottom-0 start-0 z-1"><img class="img-fluid w-100"
					src="assets/img/illustrations/Wave_3.svg" alt="" /></div>
		</section>

		<section class="container mb-8 mb-lg-13">
			<div class="row align-items-center">
				<div class="col-12 col-lg-6 col-xl-5 order-lg-1"><img class="img-fluid"
						src="assets/img/home/transfer-files-concept-landing-page.png" alt="" /></div>
				<div class="col-12 col-lg-6 col-xl-7">
					<div class="row justify-content-center justify-content-lg-start">
						<div class="col-sm-10 col-md-8 col-lg-11">
							<h2 class="fs-4 fs-lg-3 fw-bold mb-2 text-center text-lg-start"> What is email verification?
							</h2>
							<p class="fs-8 lh-lg text-center text-lg-start fw-normal">Email verification is a crucial
								process that confirms the validity and deliverability of an email address!</p>
						</div>
						<div class="col-12 mt-0">
							<div class="mb-x1 mb-lg-3">
								<!-- <h5 class="fs-8 fw-bold lh-lg mb-1">Create Unlimited Teams </h5> -->
								<p class="b-0 lh-xl">It is commonly used by businesses to ensure that the email
									addresses they collect on sign-up forms or use in their mailing lists are valid and
									capable of receiving messages, with the goal of reducing bounces and safeguarding
									their sender reputation with email service providers.</p>
							</div>
							<div>
								<!-- <h5 class="fs-8 fw-bold lh-lg mb-1"> Hasslefree Chat with Everyone</h5> -->
								<p class="lh-xl mb-0">Our proprietary email verification technology involves over 30
									steps, including checks on email address syntax with support for internationalized
									(non-ASCII) addresses, verification of the domain and its DNS records (including MX
									records), detection of disposable email addresses, execution of diagnostic commands
									on SMTP mail exchangers and much more.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="container mb-8 mb-lg-11">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-7">
					<h3 class="fs-4 fs-lg-3 fw-bold text-center mb-2 mb-lg-x1">How can I verify email addresses in bulk?
					</h3>
					<p class="fs-8 mb-7 mb-lg-8 text-center lh-lg">You can use bulk email verification process through
						its user-friendly dashboard.</p>
				</div>
				<div class="col-12">
					<div class="row g-sm-2 g-lg-3 align-items-center timeline">
						<div
							class="col-12 col-lg-4 d-flex flex-row flex-lg-column justify-content-center gap-2 gap-sm-x1 gap-md-4 gap-lg-0">
							<div class="timeline-step-1 w-25 w-lg-100 mb-4 mb-lg-5 mb-xl-6">
								<div class="timeline-item d-flex justify-content-center">
									<div
										class="timeline-icon bg-primary rounded-circle d-flex justify-content-center align-items-center">
										<span class="fs-6 fs-lg-5 fs-xl-4 text-white"> 1</span>
									</div>
								</div>
							</div>
							<div class="py-1 py-lg-0 px-lg-5 w-75 w-sm-50 w-lg-100 timeline-content">
								<h6 class="fs-8 fw-bold text-lg-center lh-lg mb-2">Create account</h6>
								<p class="text-lg-center lh-xl mb-0">Create an account by click on <a
										class="text-bolder" href="javascript:;"><span class="text-nowrap">sign
											up</span></a> button.</p>
							</div>
						</div>
						<div
							class="col-12 col-lg-4 d-flex flex-row flex-lg-column justify-content-center gap-2 gap-sm-x1 gap-md-4 gap-lg-0">
							<div class="timeline-step-2 w-25 w-lg-100 mb-4 mb-lg-5 mb-xl-6">
								<div class="timeline-item d-flex justify-content-center">
									<div
										class="timeline-icon bg-success rounded-circle d-flex justify-content-center align-items-center">
										<span class="fs-6 fs-lg-5 fs-xl-4 text-white"> 2</span>
									</div>
								</div>
							</div>
							<div class="py-1 py-lg-0 px-lg-5 w-75 w-sm-50 w-lg-100 timeline-content">
								<h6 class="fs-8 fw-bold text-lg-center lh-lg mb-2">Log into your account</h6>
								<p class="text-lg-center lh-xl mb-0">. Log into your account by your username and
									password.</p>
							</div>
						</div>
						<div
							class="col-12 col-lg-4 d-flex flex-row flex-lg-column justify-content-center gap-2 gap-sm-x1 gap-md-4 gap-lg-0">
							<div
								class="timeline-step-3 position-relative z-1 overflow-hidden w-25 w-lg-100 mb-4 mb-lg-5 mb-xl-6">
								<div class="timeline-item d-flex justify-content-center">
									<div
										class="timeline-icon bg-info rounded-circle d-flex justify-content-center align-items-center">
										<span class="fs-6 fs-lg-5 fs-xl-4 text-white"> 3</span>
									</div>
								</div>
							</div>
							<div class="py-1 py-lg-0 px-lg-5 w-75 w-sm-50 w-lg-100 timeline-content">
								<h6 class="fs-8 fw-bold text-lg-center lh-lg mb-2">Navigate to Dashboard</h6>
								<p class="text-lg-center lh-xl mb-0">Go to bulk upload option than upload a csv or excel
									and get the result.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

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
		document.querySelector("nav").classList.remove("bg-black");
		$("#public-single-email").validate();
		window.scrollTo(0, 0);

	},
	methods: {
		scrollToSection(sectionId) {
			const section = document.getElementById(sectionId);
			if (section) {
				section.scrollIntoView({ behavior: 'smooth' });
			}
		},
		async handleSubmit(event) {

			if (!$(event.target).valid()) return;
			const form = event?.target;
			const btn = $(form).find("button[type=submit]")[0];
			const btnTxt = btn?.textContent;
			const url = `${baseUrl}/verify-single-email`;
			const data = new FormData(form);
			startLoadings(btn, "Please wait...");
			try {
				const res = await makeHttpRequest(url, "post", data, true);
				if (res?.errors) {
					Object.keys(res.errors).forEach(message => {
						res.errors[message].forEach(error => toastr.error(error))
					});
				}

				if (res.success) {
					this.responseData = res.response[0];  // Store the response data
					this.success = true;
					console.log(res.response);
				} else {
					console.log(res.response);
				}
				console.log(res);
			} catch (error) {
				console.log(error);
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
