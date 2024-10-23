<template>
    <footer class="footer">
        <div class="container-fluid d-flex justify-content-between">
            <nav class="pull-left">
                <div class="copyright">
                    {{ currentYear }}, made with <i class="fa fa-heart heart text-danger"></i> by
                    <a target="_blank" href="https://www.hypervix.com">Hypervix.com</a>
                </div>
            </nav>

            <div>
                Copyright &copy; {{ currentYear }} 
                <a target="_blank" href="https://hypervix.com/">Hypervix.com</a> All Rights Reserved.
            </div>
        </div>
    </footer>
</template>
<script>
export default {
    name: 'UserFooterComponent',
    data(){
        return {
            currentYear: (new Date()).getFullYear(),
        }
    },
};
</script>