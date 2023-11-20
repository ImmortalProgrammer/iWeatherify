<template>
    <div class="container" v-if="outerwear_img || middlewear_img || innerwear_img || pants_img || headwear_img || shoes_img">
        <div class="images">
            <div class="image-container" v-if="outerwear_img">
                <img :src = '`${process.env.VUE_APP_WEB_DOMAIN}/uploads/${outerwear_img}`' >
            </div>
            <div class="image-container" v-if="middlewear_img">
                <img :src = '`${process.env.VUE_APP_WEB_DOMAIN}/uploads/${middlewear_img}`' >
            </div>
            <div class="image-container" v-if="innerwear_img">
                <img :src = '`${process.env.VUE_APP_WEB_DOMAIN}/uploads/${innerwear_img}`' >
            </div>
            <div class="image-container" v-if="pants_img">
                <img :src = '`${process.env.VUE_APP_WEB_DOMAIN}/uploads/${pants_img}`' >
            </div>
            <div class="image-container" v-if="headwear_img">
                <img :src = '`${process.env.VUE_APP_WEB_DOMAIN}/uploads/${headwear_img}`' >
            </div>
            <div class="image-container" v-if="shoes_img">
                <img :src = '`${process.env.VUE_APP_WEB_DOMAIN}/uploads/${shoes_img}`' >
            </div>
        </div>

        <div class="location-temp">
            <h1>{{ temp_category }}</h1>
            <div v-if="location && temp != null && temp_unit">
                <h1> 
                    {{ location }} - {{ temp }}°{{temp_unit}} - {{ time_stamp }}
                </h1>
            </div>
            <div v-else>
                <h1>
                    {{ location }}
                </h1>
                <h1>{{ temp }}°{{temp_unit}} - {{ time_stamp }}</h1>
            </div>
        </div>

        <div class="clothes">
            <p id="clothes-subheader"> Clothing pieces: </p>
            <p> {{outerwear_name}} </p>
            <p> {{middlewear_name}} </p>
            <p> {{innerwear_name}} </p>
            <p> {{pants_name}} </p>
            <p> {{headwear_name}} </p>
        </div>

        <div class="footer">
            <p class="delete-text" @click = "deleteSavedOutfit">Delete</p>
        </div>

        <div v-if="showErrorModal" class="overlay">
            <error-modal
            :show-modal="showErrorModal"
            :title="errorTitle"
            :message="errorMessage"
            @close-modal="showErrorModal = false"
            ></error-modal>
        </div>
    </div>
</template>

<script> 
import axios from "axios";
import ErrorModal from "@/components/ModalBox/ErrorModal.vue";

export default {
    name: "SavedOutfit",
    components: {
        ErrorModal,
    },
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
        "time_stamp",
    ],
    created() {
        this.getUserId();
    },
    data(){
        return {
            userid: this.null,
            errorTitle: "",
            errorMessage: "",
            showErrorModal: false,
        }
    },
    methods: {
    async getUserId() {
      try {
        const response = await axios.get(process.env.VUE_APP_WEB_DOMAIN + "/backend/get_userid.php", { withCredentials: true });
        this.userid = response.data.userid;
        console.log("The user id is: " + this.userid)
      } catch (error) {
        console.error("Unsuccessful request in getUserId().", error);
      }
    },
    deleteSavedOutfit(){
      axios.post(process.env.VUE_APP_WEB_DOMAIN + "/backend/delete_saved_outfit.php",
      {
        user_id: this.userid,
        location: this.location,
        temp: this.temp,
        temp_unit: this.temp_unit,
        temp_category: this.temp_category,
        outerwear_name: this.outerwear_name,
        outerwear_img: this.outerwear_img,
        middlewear_name: this.middlewear_name,
        middlewear_img: this.middlewear_img,
        innerwear_name: this.innerwear_name,
        innerwear_img: this.innerwear_img,
        pants_name: this.pants_name,
        pants_img: this.pants_img,
        headwear_name: this.headwear_name,
        headwear_img: this.headwear_name,
        shoes_name: this.shoes_name,
        shoes_img: this.shoes_img,
      })
      .then(res => {
        if(res != null){
          console.log(res)
          if (res.data.status == 1) {
            this.errorTitle = 'Success';
            this.errorMessage = 'Saved outfit deletion successfully!';
            this.showErrorModal = true;
          }
        //   alert(res.data.message)//Here
        } else {
          console.log("There was no data in the response")
        }
      }).catch((err) => {
        console.log(err)
      })
    }
  }
    
}
</script>

<style scoped>

.container{
    width: 80vw;
    display: flex;
    flex-direction: column;
    margin: auto;
    margin-bottom: 5vh;
    border: solid;
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

.image-container :hover{
    transform: scale(1.25); 
}

.clothes {
    text-align: center;
}

#clothes-subheader{
    font-weight: bold;
    color: #1e7c85;
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
    margin-left:auto;
    margin-right: 0;
    color: red;
    z-index: 1;
}
.delete-text :hover{
    cursor: pointer;
}

@media screen and (max-width: 800px) {
    .container{
    width: 80vw;
    display: flex;
    flex-direction: column;
    margin: auto;
    margin-bottom: 5vh;
    border: solid;
    height: min-content;
    }

    .images{
        height: 70vh;
        display: flex;
        flex-direction: column;
        background: grey;
        overflow: scroll;
        justify-content: start;
    }

    .image-container{
        width: 90%;
    }

    .image-container :hover{
        transform: scale(0); 
    }
}
</style>