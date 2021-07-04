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
                    name: '',
                    id: ''
                },
                all: []
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
            }

        },
        //Created function
        created: function () {
            this.showAllTags();
            this.showAllCategory();
        }
    });


});
