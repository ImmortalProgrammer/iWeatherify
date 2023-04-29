<template>
    <div class="container">
        <div class="name-container">
            <h1>{{ clothing_name }}</h1>
        </div>

        <div class="image-container">
            <img :src = upload_path >
        </div>

        <div class="footer">
            <p class="delete-text" @click="deleteAnItem">Delete</p>
        </div>
    </div>
</template>

<script> 
import axios from "axios"
export default {
    name: "SavedItem",
    props: ["clothing_name", "upload_path", "image_name", "userid", "temp_category", "clothing_category"],
    components: {

    },
    data(){
        return {}
    },
    methods: {
        deleteAnItem(){
            console.log("Delete was called")
            axios.post("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/delete_my_items.php", {
                userid: this.userid,
                clothing_name: this.clothing_name,
                image_name: this.image_name,
                temp_category: this.temp_category,
                clothing_category: this.clothing_category
            }).then((res) => {
                console.log(res)
                alert(res.data.message)
            })
        }
    }
    
}
</script>

<style scoped>

.container{
    /* width: 25vw;
    height: 40vh;
    padding-bottom: 5vh; */
    margin-right: 1vw;
    display: flex;
    flex-direction: column;
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
    margin-left: auto;
}
.delete-text :hover{
    cursor: pointer;
}

@media screen and (max-width: 615px) {
    .container{
      height: 40vh;
      padding-bottom: 5vh;
      width: 80vw;
  }
}
</style>