<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ title }}</div>
                    <hr>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
                            <i class="fas fa-plus"></i>
                        </button>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Payment List</h3>
                            </div>
                            <table class="table table-bordered table-striped table-condensed" id="dtAll">
                                <tr>
                                    <td>ID</td>
                                    <td>NAME</td>
                                    <td>PHONE</td>
                                    <td>ACTION</td>
                                </tr>

                                <tr v-for="user in users" :key="user.id">
                                    <td>{{ user.id }}</td>
                                    <td>{{ user.name }}</td>
                                    <td>@</td>
                                    <td>
                                        <button @click="edit(user.id)" type="button" class="btn btn-xs btn-warning"
                                            title="Edit Record"><i class="fa fa-edit"></i></button>
                                        <button @click="deleteRecord(user.id)" type="button" class="btn btn-xs btn-danger"
                                            title="Delete Record"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                          <label for="">ID</label>
                          <input type="text"
                            class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>
                        <div class="form-group">
                          <label for="">NAME</label>
                          <input type="text"
                            class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
    export default {
        mounted() {
            console.log('Component.');
            axios.get("http://localhost:8000/api/user").then( data => (this.users = data.data));
        },
         data() {
            return {
                users: {},
                title: "Component"
            }
        },
        methods: {
            loadUsers() {
                
            },
        }
    }

</script>
