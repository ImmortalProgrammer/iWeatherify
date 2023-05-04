<!-- Adapted from: https://www.digitalocean.com/community/tutorials/vuejs-vue-modal-component -->

<template>
    <transition name="modal-fade">
        <div class="modal-backdrop">
            <div class="modal">

              <div v-if="showErrorModal">
                <error-modal
                  :show-modal="showErrorModal"
                  :title="errorTitle"
                  :message="errorMessage"
                  @close-modal="closeErrorModal"
                ></error-modal>
              </div>

                <header class="modal-header">    
                  <div class="title-container">
                      <h1 class="title">{{ title }}</h1>
                  </div>
                </header>
        
                <div class="AddClothingModal">
                    <div class="Inputs">
                        <form>
                            <label>Clothing name: </label>
                            <input type="text" id="clothing_name" required v-model="clothing_name">
                            <br>

                            <input type="file" @change="onFileSelected" required>
                            <br>
                            <br>
                            <p>Please only upload photos that are less than 2MB</p>

                            <button class="save-btn" @click.prevent="uploadImage">SAVE</button>
                        </form>
                    </div>
                </div>
        
                <footer class="modal-footer">
                    <button
                        type="button"
                        class="btn-green"
                        @click="close"
                    >
                        Cancel
                    </button>
                </footer>
            </div>
        </div>
    </transition>
  </template>
  
  <script>
  import axios from "axios"
  import ErrorModal from "@/components/ModalBox/ErrorModal.vue";
  export default {
    props: ["temp_category", "clothing_category", "title"],
    components: {
      ErrorModal
    },
    data(){
      return {
        userid: null,
        selectedFile: null,
        clothing_name: "",
        errorTitle: "Upload error",
        errorMessage: "There was something wrong when uploading your image :/",
        showErrorModal: false,
      }
    },
    created() {
      this.getUserId();
    },    
    methods: {
        closeErrorModal(){
          this.showErrorModal = false;
        },
        close(){
            this.$emit("close");
        },
        onFileSelected(event){
          this.selectedFile = event.target.files[0]
        },
        async getUserId() {
          try {
            const response = await axios.get("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/get_userid.php", { withCredentials: true });
            this.userid = response.data.userid;
            console.log("The user id is: " + this.userid)
          } catch (error) {
            console.error("Unsuccessful request in getUserId().", error);
          }
        },
        uploadImage(){
          const fd = new FormData()
          if(!this.selectedFile){
            this.errorTitle = "Upload Error";
            this.errorMessage = "Make sure you upload an image with a name before saving";
            this.showErrorModal = true;
            // alert("Make sure you upload an image with a name before saving")//Here
          } else {
            fd.append('image', this.selectedFile, this.selectedFile.name)
            fd.append('user_id', this.userid)
            fd.append("clothing_name", this.clothing_name)
            fd.append('temp_category', this.temp_category)
            fd.append('clothing_category', this.clothing_category)
            // https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/my_items.php
            // http://localhost/project_s23-iweatherify/backend/my_items.php
            axios.post("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/my_items.php", fd, {header: {'Content-Type':'multipart/form-data'}}).then(
              (res) => {
                if(res.data.status === 1){
                  // console.log("This is the response from the server")
                  // console.log(res)
                  this.errorTitle = "Success";
                  this.errorMessage = "Your item has been saved successfully!";
                  this.showErrorModal = true;
                  this.close()
                } else{
                  console.log(res)
                  this.errorTitle = "Upload Error";
                  this.errorMessage = res.data.message;
                  this.showErrorModal = true;
                }
              }
            )
          }
        }
    },
  };
  </script>

  <style scoped>
  .modal-backdrop {
    z-index: 1;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.3);
  }

  .modal {
    font-family: 'Inter';
    background: #FFFFFF;
    box-shadow: 2px 2px 20px 1px;
    overflow-x: auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: auto;

    height: 90%;
    width: 100%;
    position:absolute;

  }

  .modal-header, .modal-footer {
    padding: 15px;
    display: flex;
  }

  .modal-header {
    position: relative;
    /* border-bottom: 1px solid #eeeeee; */
    color: #264653;
    justify-content: space-between;
  }

  .title {
    font-family: 'Inter';
    font-style: normal;
    font-size: xx-large;
    font-weight: bold;
  }

  .modal-footer {
    border-top: 1px solid #eeeeee;
    flex-direction: column;
    justify-content: flex-end;
  }

  .btn-green {
    color: white;
    background: #4AAE9B;
    border: 1px solid #4AAE9B;
    border-radius: 2px;
    cursor: pointer;
  }

.save-btn{
    font-family: 'Inter';
    font-style: normal;
    font-size: large;
    font-weight: bold;
    padding: 0.7em 10em;
    color: white;
    background-color: #264653;
    cursor: pointer;
}

  /* Transitioning css */
  .modal-fade-enter,
  .modal-fade-leave-to {
    opacity: 0;
  }

  .modal-fade-enter-active,
  .modal-fade-leave-active {
    transition: opacity .25s ease;
  }
</style>