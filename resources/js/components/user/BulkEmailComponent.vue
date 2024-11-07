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
                            <div class="container my-5">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 col-md-10 col-sm-12">
                                        <div id="drop-area" class="mb-3" @click="fileUpload">
                                            <div class="drop-icon">
                                                <i class="fa fa-file-upload"></i>
                                            </div>
                                            <div class="drop-text">Drag and drop files here or click to upload</div>
                                        </div>

                                        <form method="POST" action="/upload" id="regFormss"
                                            enctype="multipart/form-data" class="mb-3">

                                            <div class="custom-file mb-3 d-none">
                                                <input type="file" class="custom-file-input" id="excel" name="excel">
                                                <label class="custom-file-label" for="excel">Choose file</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                        </form>



                                        <div class="table-responsive">

                                            <table class="table table-light table-striped rounded">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Sno.</th>
                                                        <th scope="col">File Name</th>
                                                        <th scope="col">Start</th>
                                                        <th scope="col">End</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td colspan="6" align="center">No Data Found</td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
import PageHeaderComponent from './component/PageHeaderComponent.vue';
export default {
    name: "BulkEmailComponent",
    components: {
        PageHeaderComponent,
    },
    data() {
        return {
            pageName: "Bulk Email Validator",
            pageUrl: "user.bulk.email",
        }
    },
    methods: {
        fileUpload: function(){
            document.querySelector("input[type=file]").click();
        }
    }
}
</script>