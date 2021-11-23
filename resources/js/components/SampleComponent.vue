<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">Sample Component</div>

                    <div class="card-body">
                        Hello {{ name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Sample Component mounted.')
        },
        data(){
            return{
                name: "Ajmal"
            }
        }
    }
</script>

<style type="text/css" scoped >

div{
    color: blue;
}

</style>
