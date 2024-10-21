<template>
    <section class="hero-section overflow-hidden position-relative z-0 mb-lg-0">
        <div class="hero-background justify-content-center" style="min-height: 52rem;background-image:url(assets/img/illustrations/BG.webp);">
            <div class="container card p-4">

                <div class="row justify-content-center">
                    <div class="col-sm-5 align-content-around">
                        <div class="text-center mb-0">
                            <img src="assets/img/logos/hyper_email_validator_logo-removebg-preview.png" alt="Logo"
                                class="img-fluid rounded-circle" style="width: 80px;">
                        </div>
                        <h4 class="text-center mb-3">Social Media Signup</h4>
                        <div class="text-center">
                            <a href="auth/redirect/google" class="btn btn-outline-primary btn-sm w-75 mb-2">
                                <!-- w-45 to ensure even size buttons -->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    aria-hidden="true" role="img" class="iconify iconify--logos MuiBox-root css-0 fs-8"
                                    width="0.98em" height="1em" viewBox="0 0 256 262">
                                    <path fill="#4285F4"
                                        d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622l38.755 30.023l2.685.268c24.659-22.774 38.875-56.282 38.875-96.027">
                                    </path>
                                    <path fill="#34A853"
                                        d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055c-34.523 0-63.824-22.773-74.269-54.25l-1.531.13l-40.298 31.187l-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1">
                                    </path>
                                    <path fill="#FBBC05"
                                        d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82c0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602z">
                                    </path>
                                    <path fill="#EB4335"
                                        d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0C79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251">
                                    </path>
                                </svg>&nbsp;&nbsp; Google
                            </a>
                            <a href="#" class="btn btn-outline-info btn-sm w-75">
                                <i class="uil uil-facebook fs-8"></i> Facebook
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-1 align-content-around">
                        <div class="align-items-center">

                            <span class="mx-2 text-muted">Or</span>

                        </div>

                    </div>
                    <div class="col-sm-5 align-content-arounds p-4">
                        <h4 class="text-center mb-2">Sign up</h4>
                        <form autocomplete="off" @submit.prevent="handler" id="registration">

                            <div class="mb-2">
                                <label for="name" class="form-label">Name *</label>
                                <input type="text" class="form-control email-input" id="name" name="name"
                                    placeholder="Enter Name" required>
                            </div>

                            <div class="mb-2">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control email-input" name="email" id="email"
                                    placeholder="mail@example.com" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password *</label>
                                <input type="password" class="form-control email-input" name="password" maxlength="8" id="password"
                                    placeholder="Min. 8 characters" required>
                            </div>


                            <button type="submit" class="btn btn-primary w-100 btn-sm">Sign In</button>
                        </form>

                    </div>

                </div>

                <div class="text-center mt-2">
                    <p>Already have an account? <router-link :to="{name: 'frontend.login'}" class="text-decoration-none">Sign in </router-link></p>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import router from "../../../router";

export default {

	mounted() {
		document.querySelector("nav").classList.remove("bg-black");
		$("#registration").validate();
        window.scrollTo(0, 0);

	},
    methods: {
        handler: function(event) {
            const form = event.target;
            if(!$(form).valid()) return false;
            const btn = form.querySelector("button[type=submit]");
            const btnTxt = btn.textContent;
            this.$toaster.setPosition("toast-bottom-center");
            
            try {
                startLoadings(btn,"Please wait...");
                this.$store.dispatch("register",event.target).then(res=>{
                    console.log(res.data.success);
                    if(res.data.success) {
                        this.$toaster.success("registration Success");
                        router.push({name:"user.dashboard"});
                    }
                    stopLoadings(btn,btnTxt);
                })
                .catch(error => {
                    this.$toaster.error(error?.response?.data?.errors || error?.response?.data?.message);
                    stopLoadings(btn,btnTxt);
                });
                
            } catch (error) {
                this.$toaster.error(error);
                stopLoadings(btn,btnTxt);
            }
        }
    }
}
</script>