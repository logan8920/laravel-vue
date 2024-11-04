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
                        <div :class="{
                            'card-body bg-light': editProfile === true,
                            'card-body': editProfile === false,
                        }">
                            <div class="row justify-content-center">
                                <div class="col-md-12" v-if="editProfile">
                                    <form @submit.prevent="handleProfileData" id="profile-form">
                                        <div class="card-body bg-light">
                                            <div class="row">
                                                <div class="col-md-4 p-4 border border-white">
                                                    <label for="name" class="fs-5 fw-bold">Name</label><br>
                                                    <small style="color: #b7b0b0;"><em>(Name Doesn't contain special
                                                            charaters)</em></small>
                                                </div>
                                                <div
                                                    class="col-md-8 col-md-4 p-4 border border-white align-content-around">
                                                    <input type="text" name="name" id="name" class="form-control"
                                                        placeholder="Enter Your Name" :value="authInfo?.name" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 p-4 border border-white">
                                                    <label class="fs-5 fw-bold" for="email">Email</label><br>
                                                    <small style="color: #b7b0b0;"><em>(Enter Email should be
                                                            unique)</em></small>
                                                </div>
                                                <div
                                                    class="col-md-8 col-md-4 p-4 border border-white align-content-around">
                                                    <input type="email" name="email" id="email" class="form-control"
                                                        placeholder="Enter Your Email" :value="authInfo?.email" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 p-4 border border-white">
                                                    <label class="fs-5 fw-bold" for="password">Password</label><br>
                                                    <small style="color: #b7b0b0;"><em>(Password must contain 8 digits
                                                            wiht one samll, one Large word and special
                                                            charater)</em></small>
                                                </div>
                                                <div
                                                    class="col-md-8 col-md-4 p-4 border border-white align-content-around">
                                                    <div class="input-group">
                                                        <input type="password" name="password" id="password"
                                                            class="form-control" placeholder="Enter Your password" />
                                                        <span class="input-group-text fa fa-eye-slash" id="passhideshow"
                                                            style="cursor: pointer;" @click="viewHidePassword"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 p-4 border border-white">
                                                    <label class="fs-5 fw-bold" for="avatar">Profile Pic</label><br>
                                                    <small style="color: #b7b0b0;"><em>(Must be an image format
                                                            jpg,png,jpeg)</em></small>
                                                </div>
                                                <div
                                                    class="col-md-8 col-md-4 p-4 border border-white align-content-around">
                                                    <div class="exiting-img">
                                                        <img :src="authInfo.avatar || 'assets/image/'" alt=""
                                                            width="10%" class="mb-1 ms-1 imagePreview">
                                                    </div>
                                                    <input type="file" @change="handleImage()" name="avatar" id="avatar"
                                                        class="form-control" accept="image/*" />
                                                    <div class="d-flex justify-content-end" style="font-size: 10px;">
                                                        (File size cannot be greater than 2 MB)</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 p-4 border border-white">
                                                    <label class="fs-5 fw-bold" for="phone">Mobile No.</label><br>
                                                    <small style="color: #b7b0b0;"><em>(Must be Number contain 10
                                                            Digits)</em></small>
                                                </div>
                                                <div
                                                    class="col-md-8 col-md-4 p-4 border border-white align-content-around">
                                                    <div class="input-group">
                                                        <span class="input-group-text">+91</span>
                                                        <input type="number" name="phone" id="phone"
                                                            class="form-control" placeholder="Enter Your Mobile No."
                                                            :value="authInfo?.phone" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 p-4 border border-white">
                                                    <label class="fs-5 fw-bold" for="bio_role">Role</label><br>
                                                    <small style="color: #b7b0b0;"><em>(Enter your role in your
                                                            organisation)</em></small>
                                                </div>
                                                <div
                                                    class="col-md-8 col-md-4 p-4 border border-white align-content-around">
                                                    <input type="text" name="bio_role" id="bio_role"
                                                        class="form-control" placeholder="Enter Your Role"
                                                        :value="authInfo?.bio_role" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 p-4 border border-white">
                                                    <label class="fs-5 fw-bold" for="bio_role">Description</label><br>
                                                    <small style="color: #b7b0b0;"><em>(Enter a small discription about
                                                            you)</em></small>
                                                </div>
                                                <div
                                                    class="col-md-8 col-md-4 p-4 border border-white align-content-around">
                                                    <textarea class="form-control" rows="5" name="bio_desc"
                                                        id="bio_desc"
                                                        placeholder="Enter a small description...">{{ authInfo?.bio_desc }}</textarea>
                                                    <div class="d-flex justify-content-end" style="font-size: 10px;">
                                                        (like, dislikes, hobbies, food etc...)</div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 p-4 border border-white">
                                                    <label class="fs-5 fw-bold" for="bio_role">Social Links</label><br>
                                                    <small style="color: #b7b0b0;"><em>(Enter your social media
                                                            links)</em></small>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div
                                                            class="col-md-4 p-4 border border-white align-content-around">
                                                            <div class="input-group">
                                                                <span
                                                                    class="input-group-text icon-social-twitter"></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter twitter profile link" aria-label="Enter twitter profile link"
                                                                    aria-describedby="basic-addon1" name="twitter" :value="authInfo?.twitter"/>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-md-4 p-4 border border-white align-content-around">
                                                            <div class="input-group">
                                                                <span
                                                                    class="input-group-text icon-social-facebook"></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter Facebook link" aria-label="Enter Facebook link"
                                                                    aria-describedby="basic-addon1" name="facebook" :value="authInfo?.facebook"/>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-md-4 p-4 border border-white align-content-around">
                                                            <div class="input-group">
                                                                <span
                                                                    class="input-group-text icon-social-instagram"></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter instagram link" aria-label="Enter instagram link"
                                                                    aria-describedby="basic-addon1" name="instagram" :value="authInfo?.instagram"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn btn-primary me-2" type="submit"><i
                                                            class="fas fa-tags"></i> &nbsp;Edit</button>
                                                    <button class="btn btn-danger" @click.prevent="profilePreview"
                                                        type="button"><i class="fas fa-arrow-circle-left"></i>
                                                        &nbsp;Back</button>
                                                </div>
                                            </div>

                                        </div>

                                    </form>
                                </div>
                                <div class="col-md-4" v-else>
                                    <div class="card card-profile">
                                        <div class="card-header"
                                            style="background-image: url('assets/img/blogpost.jpg')">
                                            <div class="profile-picture">
                                                <div class="avatar avatar-xl">
                                                    <img :src="authInfo?.avatar || 'assets/img/profile.jpg'"
                                                        :alt="authInfo?.name" class="avatar-img rounded-circle">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="user-profile text-center">
                                                <div class="name">{{ authInfo?.name.toUpperCase() }}</div>
                                                <div class="job">{{ authInfo?.bio_role || '-' }}</div>
                                                <div class="desc">{{ authInfo?.bio_desc || '-' }}</div>
                                                <div class="social-media">
                                                    <a class="btn btn-info btn-twitter btn-sm btn-link" target="_blank"
                                                        :href="authInfo?.twitter || '#'">
                                                        <span class="btn-label just-icon"><i
                                                                class="icon-social-twitter"></i>
                                                        </span>
                                                    </a>
                                                    <a class="btn btn-primary btn-sm btn-link" target="_blank"
                                                        rel="publisher" :href="authInfo?.facebook || '#'">
                                                        <span class="btn-label just-icon"><i
                                                                class="icon-social-facebook"></i>
                                                        </span>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm btn-link" target="_blank"
                                                        rel="publisher" :href="authInfo.instagram || '#'">
                                                        <span class="btn-label just-icon"><i
                                                                class="icon-social-instagram"></i>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="view-profile">
                                                    <a href="#" class="btn btn-secondary w-100"
                                                        @click.prevent="openEditProfile">Edit Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row user-stats text-center">
                                                <div class="col">
                                                    <p>Joined At {{ calculateDate(authInfo.created_at) }} ago.</p>
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
        </div>
    </div>
</template>

<script>
import { handleError } from 'vue';
import PageHeaderComponent from './component/PageHeaderComponent.vue';
import { valHooks } from 'jquery';
export default {
    name: "MyProfileComponent",
    components: {
        PageHeaderComponent,
    },
    data() {
        return {
            pageName: "My Profile",
            pageUrl: "user.my.profile",
            editProfile: false,
        }
    },
    mounted() {
		$("#profile-form").validate();
	},
    methods: {
        calculateDate: function (inputDate) {
            const timeDifference = (new Date()) - (new Date(inputDate));
            return `${Math.floor(timeDifference / (1000 * 60 * 60 * 24))} Days`;
        },
        openEditProfile: function () {
            this.editProfile = true;
        },
        profilePreview: function () {
            this.editProfile = false;
        },
        handleImage: function () {
            const file = document.querySelector("input[type=file]");
            const fileData = file.files[0];
            const reader = new FileReader();

            reader.onload = function (e) {
                const base64String = e.target.result;
                const imagePreview = document.querySelector('.imagePreview');
                imagePreview.src = base64String;
                // const base64Output = document.getElementById('base64Output');
                // base64Output.value = base64String;
            };

            reader.readAsDataURL(fileData);
        },
        viewHidePassword: function() {

            const span = document.querySelector("#passhideshow");
            $(span).hasClass('fa-eye-slash') ? $(span).removeClass('fa-eye-slash').addClass('fa-eye').prev('input').attr('type','text') : $(span).removeClass('fa-eye').addClass('fa-eye-slash').prev('input').attr('type','password')
        },
        handleProfileData: function(event) {
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

    },
    computed: {
        authInfo: function () {
            return this.$store.getters.authInfo;
        }
    },
}
</script>

<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>