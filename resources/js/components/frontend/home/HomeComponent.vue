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
							<div class="col-10 col-lg-7">
								<form method="POST" onsubmit="return false;">
									<div class="mb-2 w-100">
										<input class="form-control email-input" id="email" type="email"
											placeholder="Enter email" required="required" />
									</div>
									<div class="d-grid">
										<button class="btn btn-lg btn-primary lh-xl mb-x1" type="submit"> Subscribe
										</button>
									</div>
								</form>
							</div>
							<div class="col-10 col-lg-7">
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
							<h2 class="fs-4 fs-lg-3 fw-bold mb-2 text-center text-lg-start"> What is email verification?</h2>
							<p class="fs-8 lh-lg text-center text-lg-start fw-normal">Email verification is a crucial process that confirms the validity and deliverability of an email address!</p>
						</div>
						<div class="col-12 mt-0">
							<div class="mb-x1 mb-lg-3">
								<!-- <h5 class="fs-8 fw-bold lh-lg mb-1">Create Unlimited Teams </h5> -->
								<p class="b-0 lh-xl">It is commonly used by businesses to ensure that the email addresses they collect on sign-up forms or use in their mailing lists are valid and capable of receiving messages, with the goal of reducing bounces and safeguarding their sender reputation with email service providers.</p>
							</div>
							<div>
								<!-- <h5 class="fs-8 fw-bold lh-lg mb-1"> Hasslefree Chat with Everyone</h5> -->
								<p class="lh-xl mb-0">Our proprietary email verification technology involves over 30 steps, including checks on email address syntax with support for internationalized (non-ASCII) addresses, verification of the domain and its DNS records (including MX records), detection of disposable email addresses, execution of diagnostic commands on SMTP mail exchangers and much more.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="container mb-8 mb-lg-11">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-7">
					<h3 class="fs-4 fs-lg-3 fw-bold text-center mb-2 mb-lg-x1">How can I verify email addresses in bulk?</h3>
					<p class="fs-8 mb-7 mb-lg-8 text-center lh-lg">You can use bulk email verification process through its user-friendly dashboard.</p>
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
								<p class="text-lg-center lh-xl mb-0">Create an account by click on <a class="text-bolder" href="javascript:;"><span
									class="text-nowrap">sign up</span></a> button.</p>
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
								<p class="text-lg-center lh-xl mb-0">. Log into your account by your username and password.</p>
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
								<p class="text-lg-center lh-xl mb-0">Go to bulk upload option than upload a csv or excel and get the result.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- <section class="bg-1100 mt-n1">
			<div class="mx-auto text-center">
				<hr class="horizontal-rule m-0 d-inline-block" />
			</div>
			<div class="container pb-8 pb-lg-10">
				<div class="row justify-content-center">
					<div class="col-md-8 col-lg-7">
						<h2 class="fs-6 fs-lg-5 fw-bold text-white text-center pt-7 pb-4 pt-lg-9 pb-lg-6 lh-lg"> <span
								class="underline"> 1,749 remote teams </span>have shared their experience with our app!
						</h2>
					</div>
					<div class="col-12 mb-4 mb-lg-6">
						<div class="row g-2">
							<div class="swiper-theme-container">
								<div class="swiper position-relative"
									data-swiper='{"spaceBetween":20,"mousewheel":{"forceToAxis":true,"sensitiviye":20,"releaseOnEdges":true},"autoplay":{"delay":3000,"disableOnInteraction":false},"breakpoints":{"0":{"slidesPerView":1,"direction":"horizontal","centeredSlide":true,"loop":true},"768":{"direction":"horizontal","centeredSlide":true,"slidesPerView":2,"loop":true},"992":{"slidesPerView":3,"direction":"vertical","loop":false}}}'>
									<div class="swiper-wrapper">
										<div class="col-12 swiper-slide">
											<div class="d-flex justify-content-center gap-2">
												<div
													class="d-flex flex-column flex-lg-row gap-2 px-4 py-x1 review-card-1">
													<div class="text-center text-lg-start"><img
															class="card-image rounded-circle object-fit-cover"
															src="assets/img/feedback/reviewer_1.webp" alt="" /></div>
													<div class="text-center text-lg-start">
														<p class="fs-8 mb-2 lh-lg line-clamp-3 text-1100">“OMG! I cannot
															believe that I have got a brand new landing page after
															getting Omega. It was super easy to edit and publish.”</p>
														<p class="text-800 lh-xl mb-0">Isaac Olson</p>
													</div>
												</div>
											</div>
										</div>
										<div class="col-12 swiper-slide">
											<div class="d-flex justify-content-center gap-2">
												<div
													class="d-flex flex-column flex-lg-row gap-2 px-4 py-x1 review-card-2">
													<div class="text-center text-lg-start"><img
															class="card-image rounded-circle object-fit-cover"
															src="assets/img/feedback/reviewer_2.webp" alt="" /></div>
													<div class="text-center text-lg-start">
														<p class="fs-8 mb-2 lh-lg line-clamp-3 text-1100">“Simply the
															best. Better than all the rest. I’d recommend this product
															to beginners and advanced users who want success.”</p>
														<p class="text-800 lh-xl mb-0">Barry Young</p>
													</div>
												</div>
											</div>
										</div>
										<div class="col-12 swiper-slide">
											<div class="d-flex justify-content-center gap-2">
												<div
													class="d-flex flex-column flex-lg-row gap-2 px-4 py-x1 review-card-3">
													<div class="text-center text-lg-start"><img
															class="card-image rounded-circle object-fit-cover"
															src="assets/img/feedback/reviewer_3.webp" alt="" /></div>
													<div class="text-center text-lg-start">
														<p class="fs-8 mb-2 lh-lg line-clamp-3 text-1100">“Must have
															book for all, who want to be Product Designer or Interaction
															Designer.”</p>
														<p class="text-800 lh-xl mb-0">Esther Allison</p>
													</div>
												</div>
											</div>
										</div>
										<div class="col-12 swiper-slide">
											<div class="d-flex justify-content-center gap-2">
												<div
													class="d-flex flex-column flex-lg-row gap-2 px-4 py-x1 review-card-4">
													<div class="text-center text-lg-start"><img
															class="card-image rounded-circle object-fit-cover"
															src="assets/img/feedback/kakashi.webp" alt="" /></div>
													<div class="text-center text-lg-start">
														<p class="fs-8 mb-2 lh-lg line-clamp-3 text-1100">“Every day, I
															eat, sleep, and worry about stupid things. My job is to
															ensure that these kids have as many days as possible where
															they can be idiots like this.”</p>
														<p class="text-800 lh-xl mb-0">Kakashi Hatake</p>
													</div>
												</div>
											</div>
										</div>
										<div class="col-12 swiper-slide">
											<div class="d-flex justify-content-center gap-2">
												<div
													class="d-flex flex-column flex-lg-row gap-2 px-4 py-x1 review-card-5">
													<div class="text-center text-lg-start"><img
															class="card-image rounded-circle object-fit-cover"
															src="assets/img/feedback/obito.webp" alt="" /></div>
													<div class="text-center text-lg-start">
														<p class="fs-8 mb-2 lh-lg line-clamp-3 text-1100">“Life isn’t
															permanent or predictable. You never know when you will run
															out of time. The best thing you can do is to be honest with
															those around you and let them know how you really feel. You
															never know
															if you have a tomorrow to come.”</p>
														<p class="text-800 lh-xl mb-0">Obito Uchiha</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="text-center"><a class="py-1 link-success" href="#!"><span>Read more reviews </span><span
								class="uil uil-arrow-right icon"></span></a></div>
				</div>
			</div>
		</section>

		<section class="bg-1100">
			<div class="container">
				<div class="row py-8 py-md-10 py-lg-11">
					<div class="col-lg-6">
						<div class="row justify-content-center justify-content-lg-start">
							<div class="col-md-8 col-lg-12 col-xl-11">
								<h2 class="text-white fs-4 fs-lg-3 lh-sm mb-2 text-center text-lg-start fw-bold">We are
									always here for your backup.</h2>
								<p
									class="fs-8 text-white text-opacity-65 mb-4 mb-md-6 mb-lg-7 lh-lg mb-6 mb-lg-7 text-center text-lg-start">
									We share common trends and strategies for creating & improving your text-nowrap
									rental income.</p>
							</div>
							<div class="col-lg-10">
								<div class="d-flex gap-2 gap-lg-x1 mb-4 mb-lg-5">
									<div>
										<div
											class="check-icon bg-success mb-1 rounded-circle d-flex align-items-center justify-content-center">
											<span class="uil uil-check text-white"></span>
										</div>
									</div>
									<div>
										<h5 class="fs-8 fw-bold lh-lg mb-1 text-white">Noise Free Locations</h5>
										<p class="lh-xl text-white text-opacity-70 mb-0">We ensure noise-free locations
											for your peace of mind and sound sleep.</p>
									</div>
								</div>
								<div class="d-flex gap-2 gap-lg-x1 mb-4 mb-lg-5">
									<div>
										<div
											class="check-icon bg-success mb-1 rounded-circle d-flex align-items-center justify-content-center">
											<span class="uil uil-check text-white"></span>
										</div>
									</div>
									<div>
										<h5 class="fs-8 fw-bold lh-lg mb-1 text-white">24/7 Hour Support</h5>
										<p class="lh-xl text-white text-opacity-70 mb-0">Get support from our efficient
											customer support team, 24/7, all year round.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="accordion mt-lg-4 ps-3 pe-x1 bg-white" id="accordion">
							<div class="accordion-item">
								<h2 class="accordion-header" id="heading1"><button
										class="accordion-button fs-8 lh-lg fw-bold pt-x1 pb-2" type="button"
										data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expand="true"
										aria-controls="collapse1" data-accordion-button="data-accordion-button">How to
										setup BrainwaveIO?</button></h2>
								<div class="accordion-collapse collapse show" id="collapse1"
									data-bs-parent="#accordion">
									<div class="accordion-body lh-xl pt-0 pb-x1">Enjoy the easy setup process with
										little to no coding knowledge with us!</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="heading2"><button
										class="accordion-button fs-8 lh-lg fw-bold pt-x1 pb-2 collapsed" type="button"
										data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expand="false"
										aria-controls="collapse2" data-accordion-button="data-accordion-button">Can I
										use BrainwaveIO for my clients?</button></h2>
								<div class="accordion-collapse collapse" id="collapse2" data-bs-parent="#accordion">
									<div class="accordion-body lh-xl pt-0 pb-x1">Yes, you can. Enjoy special rates for
										your first client!</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="heading3"><button
										class="accordion-button fs-8 lh-lg fw-bold pt-x1 pb-2 collapsed" type="button"
										data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expand="false"
										aria-controls="collapse3" data-accordion-button="data-accordion-button">How
										often do you release update?</button></h2>
								<div class="accordion-collapse collapse" id="collapse3" data-bs-parent="#accordion">
									<div class="accordion-body lh-xl pt-0 pb-x1">We will keep updating the theme; stay
										with us to get updated!</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="heading4"><button
										class="accordion-button fs-8 lh-lg fw-bold pt-x1 pb-2 collapsed" type="button"
										data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expand="false"
										aria-controls="collapse4" data-accordion-button="data-accordion-button">How can
										I access to old version?</button></h2>
								<div class="accordion-collapse collapse" id="collapse4" data-bs-parent="#accordion">
									<div class="accordion-body lh-xl pt-0 pb-x1">Go to your cloud storage and provide
										the password. You’ll find it there..</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="heading5"><button
										class="accordion-button fs-8 lh-lg fw-bold pt-x1 pb-2 collapsed" type="button"
										data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expand="false"
										aria-controls="collapse5" data-accordion-button="data-accordion-button">How can
										I get your support?</button></h2>
								<div class="accordion-collapse collapse" id="collapse5" data-bs-parent="#accordion">
									<div class="accordion-body lh-xl pt-0 pb-x1">To reach our support team, simply send
										an email to support@brainwaveio.com. Our team will promptly address your inquiry
										and provide assistance as needed.</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->

	</div>
</template>

<script>
export default {
	mounted() {
		//document.querySelector("nav").style.backgroundColor = 'rgb(49, 60, 89)';
		document.querySelector("nav").classList.remove("bg-black");
	},
	methods: {
		scrollToSection(sectionId) {
			const section = document.getElementById(sectionId);
			if (section) {
				section.scrollIntoView({ behavior: 'smooth' });
			}
		}
	}
}
</script>