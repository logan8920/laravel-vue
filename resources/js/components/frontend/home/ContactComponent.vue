<template>
	<section class="bg-300 position-relative z-0" id="contact">
        <div class="container py-8 py-lg-9 mt-10">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-8">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10">
                            <h2 class="fs-4 fs-lg-3 fw-bold text-center mb-2 lh-sm">Get latest updates</h2>
                            <p class="fs-8 mb-5 mb-lg-6 text-center lh-lg fw-normal"> Subscribe to our monthly newsletter to stay connected with everything you need!</p>
                        </div>
                        <div class="col-10 col-lg-7">
                            <form method="POST" onsubmit="return false;">
                                <div class="mb-2 w-100">
                                    <input class="form-control email-input" id="email" type="email" placeholder="Enter your email" required="required" />
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-lg btn-primary lh-xl mb-x1" type="submit"> Subscribe </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-10 col-lg-7">
                            <p class="text-center lh-lg mb-0">We’ll never share your details with third parties. View our Privacy Policy for more info.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="position-absolute bottom-0 end-0 z-n1 d-none d-lg-block"><img src="assets/img/illustrations/Green_dots.svg" alt="" /></div>
        <div class="position-relative bottom-0 start-0 z-1"><img class="img-fluid w-100" src="assets/img/illustrations/Wave_3.svg" alt="" /></div>
    </section>
</template>