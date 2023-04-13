<template>
    <div class="container">
        <div class="name-container">
            <h1>{{ image_name }}</h1>
        </div>

        <div class="image-container">
            <img :src="require(`@/assets/${upload_path}`)">
        </div>

        <div class="footer">
            <p>Edit</p>
            <p>Delete</p>
        </div>
    </div>
</template>

<script> 
export default {
    props: ["image_name", "upload_path"],
    components: {

    },
    data(){

    },
    methods: {
        getImageUrl(){
            return this.upload_path
        }
    }
    
}
</script>

<style scoped>

.container{
    width: 30vw;
    height: 40vh;
    background: blue;
}

.name-container{
    text-align: center;
}

.name-container h1{
    font-size: larger;
}

img{
    width: -webkit-fill-available;
}

</style>