// $('.email-login').submit(function(e){
//     e.preventDefault();
// });

//Vue js code start
const root = new Vue({
    el: '#frontend',
    data: {
        auth_check: '',
        mess: '',
        form: {
            email: '',
            password: '',
            
        }
    }, 
    methods: {
        authCheck: function(){
            axios.get('/auth-manage').then((response)=>{
                root.auth_check=response.data;
            });
        },
        loginPopupShow: function(event){
            event.preventDefault();
            
            $('#loginPopup').modal('show');
        },

        login: function(event){
            this.submitted = true;
            axios.post('/login', this.form)
                .then(function(){
                    $('#loginPopup').modal('hide');
                    root.authCheck();
                })
                .catch(function(){
                    root.mess="Username and password not match!"
                });
            this.submitted = false;
        }
    },
    

    created: function(){
        this.authCheck();
    }
});