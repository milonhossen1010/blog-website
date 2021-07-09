$(document).ready(function () {

    
 
    //Vue js code
    const root = new Vue({
        el: '#app',
        data: {
            tags: {
                name: '',
                edit: {
                    name: '',
                    id: ''
                },
                all: []
            },
            //Category
            category: {
                name: '',
                edit: {
                    id: '',
                    name: '',
                },
                all: []
            },
            posts: {
                all: [],
                edit: {
                    id: '',
                    title: '',
                    categories: '',
                    user_id: '',
                    image: '',
                    description: '',
                },
            }

        },

        methods: {

            /**
             * Tag vue js start
             */
            //Show all tag
            showAllTags: function () {
                axios.get('/admin/show-all-tag').then(function (response) {
                    root.tags.all = response.data;
                });
            },

            //Add tag
            addTag: function (event) {
                event.preventDefault();
                let tagName = new FormData();
                tagName.append('name', this.tags.name);

                if (this.tags.name == '') {
                    alertify.error('Name is required!!');
                } else {

                    axios.post("/admin/tag", tagName).then(function (response) {
                        root.showAllTags();
                        alertify.success('Tag added successful!!');
                        root.tags.name = '';

                    }).catch(error => {
                        if (error.response.status === 422) {
                            // this.tags.errors = error.response.data.errors || {};
                            alertify.error('the name already exists');
                        }

                    });
                }
            },

            //Delete tag
            deleteTag: function (id, event) {
                event.preventDefault();

                alertify.confirm("Delete alert!", "Are you sure?",
                    function () {
                        axios.get('/admin/delete-tag/' + id).then(function (response) {
                            alertify.success('Tag deleted successful!');
                            root.showAllTags();
                        });
                    },
                    function () {
                        alertify.error('Cancel');
                    });
            },

            //Edit tag
            editTag: function (id, event) {
                event.preventDefault();
                axios.get(`/admin/tag/${id}/edit`).then(function (response) {
                    root.tags.edit.name = response.data.name;
                    root.tags.edit.id = response.data.id;
                    $('#tagEditModal').modal('show');
                });

            },

            //Update tag
            updateTag: function () {
                let id = this.tags.edit.id;
                let tagUpdate = new FormData();
                tagUpdate.append('name', this.tags.edit.name);
                tagUpdate.append('id', this.tags.edit.id);

                if (this.tags.edit.name == '') {
                    alertify.error('The name field is required.');
                } else {
                    axios.post(`/admin/update-tag`, tagUpdate).then(function (response) {
                        root.showAllTags();
                        $('#tagEditModal').modal('hide');
                        alertify.success('Tag updated successful!');
                    }).catch(function (error) {
                        if (error.response.status === 422) {
                            // this.tags.errors = error.response.data.errors || {};
                            alertify.error('The name already exists.');
                        }
                    });
                }


            },

            /**
             * Category vue js start
             */
            //Show all category
            showAllCategory: function () {
                axios.get('/admin/category/show-all').then(function (response) {
                    root.category.all = response.data;
                });
            },
            //Add category function
            addCategory: function (even) {
                even.preventDefault();
                let catName = new FormData();
                catName.append('name', this.category.name);

                //Validation
                if (this.category.name == '') {
                    alertify.error('Name is required!');
                } else {
                    axios.post('/admin/category/store', catName).then(function (response) {
                        root.showAllCategory();
                        root.category.name = '';
                        alertify.success('Category added successful!');
                    }).catch(function () {
                        alertify.error('The name already exits!');
                    });
                }

            },

            //Delete Category function
            deleteCategory: function (id, event) {
                event.preventDefault();
                alertify.confirm("Category Delete","Are you sure?",
                    function () {
                        axios.get(`/admin/category/destroy/${id}`).then(function (response) {
                            root.showAllCategory();
                            alertify.success('Category deleted successful!');
                        });
                    },
                    function () {
                        alertify.error('Cancel');
                    });
                
            },

            //Category edit
            editCategory: function(id,event){
                event.preventDefault();
                axios.get(`/admin/category/edit/${id}/`).then((response)=>{
                    root.category.edit.name=response.data.name;
                    root.category.edit.id=response.data.id;
                    $('#categoryEditModal').modal('show');
                });
                
            },

            //Update category
            updateCategory: function(){
                let id = this.category.edit.id;
                let updateCategory = new FormData();
                updateCategory.append('name',this.category.edit.name);
                axios.post(`/admin/category/update/${id}`, updateCategory).then((response)=>{
                    root.showAllCategory();
                    $("#categoryEditModal").modal('hide');
                    alertify.success('Category update success!');
                }).catch((error)=>{
                    alertify.error('The name already exits!');
                });
            },

            /**
             * Post function
             */
            //Show all function
            showAllPost: function(){
                axios.post('/admin/post/showall').then((response)=>{
                    root.posts.all=response.data;

                });
            },
            //Delete function
            deletePost: function(id, event){
                event.preventDefault();
                alertify.confirm("Delete alert!","Are you sure?",
                    function(){
                        axios.delete(`/admin/post/${id}`).then((response)=>{
                    
                            alertify.success('Post delete successful!!');
                            root.showAllPost();
                        });
                    },
                    function(){
                        alertify.error('Cancel');
                    });
                
            },

            //Post Status function
            statusPost: function(id){
                axios.get(`/admin/post/status/${id}`).then(function(response){
                    if(response.data){
                        alertify.success('Post active successful.');
                    }else{
                        alertify.success('Post deactivate successful.');
                    }
                });
            },

            //Edit function
            editFunction: function(id, event){
                event.preventDefault();
                $("#postEditModal").modal("show");
                axios.get(`/admin/post/${id}/edit`).then((response)=> {
                    root.posts.edit.id=response.data.id;
                    root.posts.edit.title=response.data.title;
                    root.posts.edit.image=response.data.image;
                    root.posts.edit.categories=response.data.categories;
                    root.posts.edit.user_id=response.data.user_id;
                    root.posts.edit.description=response.data.description;
                    // $(' img').attr('src', response.data.image);
                    $('.dropify-preview').show();
                    $(".dropify-render").html(`<img src="${response.data.image}">`);
                });
               
            }

        },
        //Created function
        created: function () {
            this.showAllTags();
            this.showAllCategory();
            this.showAllPost();
        }
    });


});
