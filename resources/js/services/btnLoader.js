export default {
    startLoading: function(thi,text='Please Wait...') {
  
        thi.setAttribute('disabled',true);
        var loader = document.createElement('span');
        Object.assign(loader,{
            className : 'spinner-border spinner-border-sm'
        });
        
        loader.setAttribute('role', 'status');
        loader.setAttribute('aria-hidden', 'true');
        
        thi.innerHTML = `${loader.outerHTML} ${text}`;  
    },

    stopLoading: function(thi,text,disabled=false) {
        form && $('select,input,textarea').removeAttr('disabled');
        thi.disabled = disabled;
        thi.innerHTML = text;
    }
}