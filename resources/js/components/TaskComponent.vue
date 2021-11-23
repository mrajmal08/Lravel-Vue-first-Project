<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">Tasks Component <a class="btn btn-secondary btn-sm float-right"
                                                                data-toggle="modal" href="#addModel">Add</a></div>
                    <div class="card-body">
                        <div class="mb-3">
                            <input type="search" v-model="search" @keyup="searchRecord" class="form-control" placeholder="Search anything">
                        </div>
                        <ul class="list-group pb-3">
                            <li class="list-group-item" v-for="task in tasks.data"> {{ task.name }} - {{ task.phone }}

                                <span class="float-right">
                                     <a class="btn btn-warning btn-sm" data-toggle="modal" href="#editModel" @click="getRecord(task.id)">Edit</a>
                                    <button class="btn btn-danger btn-sm " @click="deleteRecord(task.id)">Delete</button>
                                    <a class="btn btn-success btn-sm" data-toggle="modal" href="#viewModel"  @click="getRecord(task.id)">View</a>
                                </span>
                            </li>
                        </ul>
                        <pagination :data="tasks" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>
            </div>
            <div id="model">
                <addTask @recordAdded="refreshRecord"></addTask>
                <editTask :rec="editRecord" @editRecord="refreshRecord"></editTask>
                <viewTask :rec="editRecord" ></viewTask>
            </div>

        </div>
    </div>
</template>

<script type="text/javascript">
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('addTask', require('./addTaskComponent.vue').default);
Vue.component('editTask', require('./editTaskComponent.vue').default);
Vue.component('viewTask', require('./viewTaskComponent.vue').default);

export default {
    mounted() {
        console.log('tasks Component mounted.')
    },
    data() {
        return {
            tasks: {},
            editRecord: {},
            errors: [],
            search: ''
        }
    },
    methods: {
        getResults(page = 1) {
            axios.get('http://127.0.0.1:8000/tasks?page=' + page)
                .then((response) => this.tasks = response.data)
                .catch((error) => console.log(error));
        },
        getRecord(id){
            axios.get('http://127.0.0.1:8000/tasks/'+id+'/edit')
            .then( response => this.editRecord = response.data )
            .catch(error => this.errors = error.response.data.errors)
        },
        refreshRecord(record){
            this.tasks = record.data
        },
        deleteRecord(id){
            let alert = confirm('are you sure you want to delete this record?');
            if (alert){
                axios.post('http://127.0.0.1:8000/tasks/'+id ,{
                    'id': this.id,
                    '_method': 'DELETE'
                })
                .then( response => this.tasks = response.data )
                .catch(error => this.errors = error.response.data.errors)
            }
        },
        searchRecord(){
            if (this.search.length > 3){
                axios.get('http://127.0.0.1:8000/tasks/search/'+this.search)
                    .then( response => this.tasks = response.data )
                    .catch(error => this.errors = error.response.data.errors)
            }else{
                this.getResults()
            }
        }

    },
    created() {
        axios.get('http://127.0.0.1:8000/tasks')
            .then((response) => this.tasks = response.data)
            .catch((error) => console.log(error));
        console.log('tasks loading ...')
    }
}
</script>
<style type="text/css" scoped></style>
