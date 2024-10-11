<template>
	<nav class="navbar navbar-expand-md fixed-top" id="navbar" data-navbar-soft-on-scroll="data-navbar-soft-on-scroll">
	    <div class="container-fluid px-0">
	        <router-link :to="{name: 'frontend.home'}"><img class="navbar-brand w-75 d-md-none" src="assets/img/logos/hyper_email_validator_logo-removebg-preview.png" alt="logo" /></router-link><router-link :to="{name: 'frontend.home'}" class="navbar-brand fw-bold d-none d-md-block" >Hyperemail.validator</router-link><router-link :to="{name: 'frontend.home'}" class="btn btn-primary btn-sm ms-md-x1 mt-lg-0 order-md-1 ms-auto" href="#">Sign up </router-link>
			<router-link :to="{name: 'frontend.login'}" class="btn btn-info btn-sm ms-md-1 mt-lg-0 order-md-1 ms-auto">Login </router-link>
	        <button
	        class="navbar-toggler border-0 pe-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
	            <div class="collapse navbar-collapse justify-content-md-end" id="navbar-content" data-navbar-collapse="data-navbar-collapse">
	                <ul class="navbar-nav gap-md-2 gap-lg-3 pt-x1 pb-1 pt-md-0 pb-md-0" data-navbar-nav="data-navbar-nav">
	                    <li class="nav-item">
	                    	<router-link :to="{name: 'frontend.about'}" class="nav-link lh-xl">About us</router-link>
	                    </li>
	                    <li class="nav-item">
	                    	<router-link :to="{name: 'frontend.support'}" class="nav-link lh-xl">Support</router-link>
	                    </li>
	                    <li class="nav-item">
	                    	<router-link :to="{name: 'frontend.pricing'}" class="nav-link lh-xl">Pricing</router-link>
	                    </li>
	                    <li class="nav-item">
	                    	<router-link :to="{name: 'frontend.contact'}" class="nav-link lh-xl">Contact</router-link>
	                    </li>
	                </ul>
	            </div>
	    </div>
	</nav>
</template>
<script>
	export default {
		mounted() {
			document.querySelector("nav").style.backgroundColor = 'rgb(49, 60, 89)';
			document.querySelector("nav").classList.add("bg-black");
		}
	}
</script>