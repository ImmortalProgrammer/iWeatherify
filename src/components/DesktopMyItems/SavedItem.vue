<template>
    <div class="container">

        <div v-if="showErrorModal" class="overlay">
            <error-modal
            :show-modal="showErrorModal"
            :title="errorTitle"
            :message="errorMessage"
            @close-modal="showErrorModal = false"
            ></error-modal>
        </div>

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
import axios from "axios";
import ErrorModal from "@/components/ModalBox/ErrorModal.vue";

export default {
    name: "SavedItem",
    props: ["clothing_name", "upload_path", "image_name", "userid", "temp_category", "clothing_category"],
    components: {
        ErrorModal,
    },
    data(){
        return {
            errorTitle: "",
            errorMessage: "",
            showErrorModal: false,
        }
    },
    methods: {
        deleteAnItem(){
            console.log("Delete was called")
            axios.post(process.env.VUE_APP_WEB_DOMAIN + "/backend/delete_my_items.php", {
                userid: this.userid,
                clothing_name: this.clothing_name,
                image_name: this.image_name,
                temp_category: this.temp_category,
                clothing_category: this.clothing_category
            }).then((res) => {
                console.log(res)
                if (res.data.status == 1) {
                    this.errorTitle = 'Success';
                    this.errorMessage = 'Your item deletion successfully!';
                    this.showErrorModal = true;
                }
                // alert(res.data.message)//Here
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

.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1000;
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