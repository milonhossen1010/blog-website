// $('.email-login').submit(function(e){
//     e.preventDefault();
// });

//Vue js code start
const root = new Vue({
    el: '#frontend',
    data: {
        auth_check: '',
        all_comments: '',
        all_reply: '',
        mess: '',
        reply_mess: '',
        form: {
            id: '',
            email: '',
            password: '',
            name: '',
            password_confirmation: '',
            comment: '',
            reply: '',
            commentID: ''
            
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

        //Login by vue
        login: function(event){ 
            axios.post('/login', this.form)
                .then(function(){
                    $('#loginPopup').modal('hide');
                    root.authCheck();
                })
                .catch(function(){
                    root.mess="Username and password not match!"
                }); 
        }, 

        //Register by vue
        register: function(event){ 
            axios.post('/register', this.form)
                .then(function(){
                    $('#loginPopup').modal('hide');
                    root.authCheck();
                })
                .catch(function(){
                    root.mess="Username and password not match!";
                }); 
        },

        //Post id get
        singlePostIdGet: function(id){
            this.form.id =  $('#post_id').val();
        },
        //create comment
        createComment: function(id){
            //Post id get
            this.form.id=id;

            //Validation
            if(this.form.comment == ''){
                this.mess='This field is required.';
            }else{
                axios.post('/post-comment-store', this.form).then((response)=>{
                    root.showComments();
                    root.form.comment='';
                });
            }
        },

        //Show all comments
        showComments: function(){
          
            axios.post('/post-comment-index/', this.form).then(function(response){
                 root.all_comments = response.data.comments;
                 root.all_reply = response.data.reply;
                // alert(response.data);
            });
        },

        //Comment reply box show
        replyBox: function(id){
            $("#"+id).toggle();
        },

        //comment reply create
        commentReplyCreate: function(id){
            this.form.commentID=id; 
            if(this.form.reply==''){
                this.reply_mess="The reply form is required!"
            }else{
                axios.post('/post-comment-reply-store', this.form).then(function(response){
                    root.showComments();
                    root.form.reply='';
                    $("#"+id).hide();
                });
            }
            
        },







    },
    

    created: function(){
        this.authCheck();
        this.singlePostIdGet();
        this.showComments();
    }
});