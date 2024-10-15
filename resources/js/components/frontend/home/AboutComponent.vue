<template>
	<div data-bs-target="#navbar" tabindex="0">
	    <section class="container mb-8 mb-lg-13 mt-10">
	        <div class="row align-items-center">
	            <div class="col-12 col-lg-6 col-xl-7"><img class="img-fluid" src="assets/img/Hero/Team.webp" alt="" /></div>
	            <div class="col-12 col-lg-6 col-xl-5">
	                <div class="row justify-content-center justify-content-lg-start">
	                    <div class="col-sm-10 col-md-8 col-lg-12">
	                        <h2 class="fs-4 fs-lg-3 fw-bold mb-2 text-center text-lg-start">Collaborate with team members.</h2>
	                        <p class="fs-8 mb-4 mb-lg-5 lh-lg text-center text-lg-start fw-normal">We share common trends and strategies for improving your rental income</p>
	                    </div>
	                    <div class="col-12">
	                        <div class="mb-x1 mb-lg-3">
	                            <h5 class="fs-8 fw-bold lh-lg mb-1">Project Based Groups </h5>
	                            <p class="mb-0 lh-xl">You can use this module to monitor ongoing projects seamlessly.</p>
	                        </div>
	                        <div>
	                            <h5 class="fs-8 fw-bold lh-lg mb-1"> Unlimited Video Meetings</h5>
	                            <p class="lh-xl mb-0">Conduct unlimited video meetings with us for better business operations.</p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	</div>
</template>

<script>
	export default {
		mounted() {
			document.querySelector("nav").style.backgroundColor = 'rgb(49, 60, 89)';
			document.querySelector("nav").classList.add("bg-black");
			window.scrollTo(0, 0);
		}
	}
</script>