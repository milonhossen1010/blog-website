// const { default: axios } = require("axios");

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
            }

        },

        methods: {

             //Show all 
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
                        root.tags.name='';

                    }).catch(error => {
                        if(error.response.status === 422) {
                                // this.tags.errors = error.response.data.errors || {};
                                alertify.error('The name has already been taken.');
                        }
                       
                    });
                }
            },

            //Delete tag
            deleteTag: function(id, event) {
                event.preventDefault();

                alertify.confirm("Delete alert!","Are you sure?",
                        function(){
                            axios.get('/admin/delete-tag/'+ id).then(function(response){
                                alertify.success('Tag deleted successful!');
                                root.showAllTags();
                             });
                        },
                        function(){
                            alertify.error('Cancel');
                        });
            },

            //Edit tag
            editTag: function(id, event){
                event.preventDefault();
                axios.get(`/admin/tag/${id}/edit`).then(function(response){
                    root.tags.edit.name = response.data.name;
                    root.tags.edit.id = response.data.id;
                    $('#tagEditModal').modal('show'); 
                });
                
            },

            //Update tag
            updateTag: function(){
                let id = this.tags.edit.id;
                let tagUpdate = new FormData();
                tagUpdate.append('name',this.tags.edit.name);
                tagUpdate.append('id',this.tags.edit.id);
                axios.post(`/admin/update-tag`,tagUpdate ).then(function(response){
                    root.showAllTags();
                });
                $('#tagEditModal').modal('hide');
            }


           
        },
        created: function () {
            this.showAllTags();
        }
    });


});
