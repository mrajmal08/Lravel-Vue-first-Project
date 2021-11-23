<template>

    <!-- Modal -->
    <div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                        <input type="text" name="name" class="form-control" v-model="rec.name">
                        <ul v-if="error.name">
                            <li v-for="err in error.name" class="alert alert-danger">{{ err }}</li>
                        </ul>
                    </div>
                    <div class="p-1">
                        <label>Add Phone</label>
                        <input type="text" name="phone" class="form-control" v-model="rec.phone">
                        <ul v-if="error.phone">
                            <li v-for="err in error.phone" class="alert alert-danger">{{ err }}</li>
                        </ul>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click="updateTask">Update changes</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
export default {
    props: ['rec'],
    data() {
        return {
            success: "",
            error: []
        }
    },
    methods: {
        updateTask() {
            axios.post('http://127.0.0.1:8000/tasks/'+this.rec.id , {
                'name': this.rec.name,
                'phone': this.rec.phone,
                '_method': 'PUT'
            })
                .then(data => {
                    this.$emit('editRecord', data)
                    this.success = "Record Updated Successfully!!!"

                })
                .catch(error => this.error = error.response.data.errors);
            this.name = '';
            this.phone = '';
        },
        clearError() {
            this.error = [];
            this.success = '';

        }
    }

}
</script>
<style type="text/css" scoped></style>
