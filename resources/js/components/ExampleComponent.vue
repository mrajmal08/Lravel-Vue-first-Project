<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an Example component .
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript" >
    export default {
        mounted() {
            console.log('Example Component mounted.')
        }
    }
</script>

<style type="text/css" scoped>
    div{
        color: green;
    }

</style>
