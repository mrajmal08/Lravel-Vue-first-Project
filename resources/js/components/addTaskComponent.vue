<template>

    <!-- Modal -->
    <div class="modal fade" id="addModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add New Tasl</h5>
                    <button type="button" class="close" @click="clearError" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="p-1">
                    <p class="alert alert-success" v-if="success.length > 0">{{ success }}</p>
                </div>
                <div class="modal-body">
                    <div class="p-1">
                        <label>Add Name</label>
                        <input type="text" name="name" class="form-control" v-model="name">
                        <ul v-if="error.name">
                            <li v-for="err in error.name" class="alert alert-danger">{{ err }}</li>
                        </ul>
                    </div>
                    <div class="p-1">
                        <label>Add Phone</label>
                        <input type="text" name="phone" class="form-control" v-model="phone">
                        <ul v-if="error.phone">
                            <li v-for="err in error.phone" class="alert alert-danger">{{ err }}</li>
                        </ul>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click="addNewTask">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
export default {
    data() {
        return {
            success: "",
            name: "",
            phone: "",
            error: []
        }
    },
    methods: {
        addNewTask() {
            axios.post('http://127.0.0.1:8000/tasks', {
                'name': this.name,
                'phone': this.phone
            })
                .then(data => {
                    this.$emit('recordAdded', data)
                    this.success = "Record Added Successfully!!!"
                    this.name = '';
                    this.phone = '';
                })
                .catch(error => this.error = error.response.data.errors);

        },
        clearError() {
            this.error = [];
            this.success = '';
            this.name = '';
            this.phone = '';
        }
    }

}
</script>
<style type="text/css" scoped></style>
