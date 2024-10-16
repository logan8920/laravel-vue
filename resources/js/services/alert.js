toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

export default {
    success: function(message) {
        
        if(typeof(message) === "object") {

            Object.keys(message).forEach(m=>{
                toastr.success(message[m]);
            })

        } else if(typeof(message) == "string") {
            toastr.success(message);
        }
    },
    error: function(message){
        if(typeof(message) === "object") {

            Object.keys(message).forEach(m=>{
                toastr.error(message[m]);
            })

        } else if(typeof(message) == "string") {
            toastr.error(message);
        }
    },
    warning: function(message){
        if(typeof(message) === "object") {

            Object.keys(message).forEach(m=>{
                toastr.warning(message[m]);
            })

        } else if(typeof(message) == "string") {
            toastr.warning(message);
        }
    },
    info: function(message){
        if(typeof(message) === "object") {

            Object.keys(message).forEach(m=>{
                toastr.info(message[m]);
            })

        } else if(typeof(message) == "string") {
            toastr.info(message);
        }
    },
    setPosition: function(position){
        toastr.options.positionClass = position;  
    },
    reset: function() {
        toastr.options.positionClass = "toast-top-right"; 
    }
}