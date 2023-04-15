<template>
    <div class="container">
        <div class="name-container">
            <h1>{{ image_name }}</h1>
        </div>

        <div class="image-container">
            <img :src="require(`../../../img/uploaded_images/${upload_path}`)"> <!-- MUST BE IMAGES FROM /src/assets bc: https://stackoverflow.com/questions/56083044/how-to-pass-imageurl-as-props -->
        </div>

        <!-- <div class="footer">
            <p class="edit-text">Edit</p>
            <p class="delete-text">Delete</p>
        </div> -->
    </div>
</template>

<script> 
export default {
    name: "SavedItem",
    props: ["image_name", "upload_path"],
    components: {

    },
    data(){
        return {}
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
    width: 25vw;
    height: 40vh;
}

.name-container{
    text-align: center;
    font-size: x-large;
    font-weight: bold;
}

.name-container h1{
    font-size: larger;
}

.name-container :hover{
    cursor: pointer;
}

.image-container{
    width: 100%;
    height: 100%;
}

.image-container :hover{
    cursor: pointer;
}

img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.footer{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

.edit-text{
    color: #4AAE9B;
}
.delete-text{
    color: red;
}
</style>