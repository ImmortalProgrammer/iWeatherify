<template>
    <div class="container" v-if="outerwear_img || middlewear_img || innerwear_img || pants_img || headwear_img || shoes_img">
        <div class="images">
            <div class="image-container" v-if="outerwear_img">
                <img :src = '`https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/uploads/${outerwear_img}`' >
            </div>
            <div class="image-container" v-if="middlewear_img">
                <img :src = '`https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/uploads/${middlewear_img}`' >
            </div>
            <div class="image-container" v-if="innerwear_img">
                <img :src = '`https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/uploads/${innerwear_img}`' >
            </div>
            <div class="image-container" v-if="pants_img">
                <img :src = '`https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/uploads/${pants_img}`' >
            </div>
            <div class="image-container" v-if="headwear_img">
                <img :src = '`https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/uploads/${headwear_img}`' >
            </div>
            <div class="image-container" v-if="shoes_img">
                <img :src = '`https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/uploads/${shoes_img}`' >
            </div>
        </div>

        <div class="location-temp">
            <h1>{{ temp_category }}</h1>
            <h1>{{ location }} - {{ temp }}°{{temp_unit}}</h1>
        </div>

        <div class="clothes">
            <p> {{outerwear_name}} </p>
            <p> {{middlewear_name}} </p>
            <p> {{innerwear_name}} </p>
            <p> {{pants_name}} </p>
            <p> {{headwear_name}} </p>
        </div>

        <div class="footer">
            <p class="delete-text">Delete</p>
        </div>
    </div>
</template>

<script> 
export default {
    name: "SavedOutfit",
    props: [
        "location", 
        "temp", 
        "temp_unit", 
        "temp_category", 
        "outerwear_name",
        "outerwear_img",
        "middlewear_name",
        "middlewear_img",
        "innerwear_name",
        "innerwear_img",
        "pants_name",
        "pants_img",
        "headwear_name",
        "headwear_img",
        "shoes_name",
        "shoes_img",
    ],
    components: {

    },
    data(){
        return {}
    },
    methods: {
    }
    
}
</script>

<style scoped>

.container{
    width: 80vw;
    display: flex;
    flex-direction: column;
    margin: auto;
    padding-bottom: 2vh;
}

.images{
    display: flex;
    flex-direction: row;
    background: grey;
    justify-content: center;
}

.image-container{
  width: 16.6%;
  padding: 10px;
  margin: 10px;
  background-color: rgba(255, 255, 255, 0.15);
  border-radius: 5px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.image-container img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}


.location-temp{
    text-align: center;
    font-size: x-large;
    font-weight: bold;
}

.footer{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

.delete-text{
    color: red;
    z-index: 1;
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