<template>

    <!-- Modal -->
    <div class="modal fade" id="viewModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">View Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="p-1">
                        <label>Name Preview</label>
                        <p>{{ rec.name }}</p>
                    </div>
                    <div class="p-1">
                        <label>Phone Preview</label>
                        <p>{{ rec.phone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
export default {
props: ['rec'],

}
</script>
<style type="text/css" scoped></style>
