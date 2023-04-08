<!-- Adapted from: https://www.digitalocean.com/community/tutorials/vuejs-vue-modal-component -->

<template>
    <transition name="modal-fade">
        <div class="modal-backdrop">
            <div class="modal">
                <header class="modal-header">    
                    
                </header>
        
                <div class="AddClothingModal">

                    <div class="title-container">
                        <h1 class="title">{{ title }}</h1>
                    </div>
    
                    <div class="Inputs">
                        <form>
                            <label>Clothing name: </label>
                            <input>
                            <br>

                            <input type="file" @change="onFileSelected">
                            <br>
                            <br>

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
                        Close Modal
                    </button>
                </footer>
            </div>
        </div>
    </transition>
  </template>
  
  <script>
  import axios from "axios"
  export default {
    props: ["showModal", "title"],
    data(){
      return {
        selectedFile: null,
      }
    },
    methods: {
        close(){
            this.$emit("close");
        },
        onFileSelected(event){
          this.selectedFile = event.target.files[0]
        },
        uploadImage(){
          const fd = new FormData()
          fd.append('image', this.selectedFile, this.selectedFile.name)
          // alert(this.selectedFile.name)
          axios.post("http://localhost/project_s23-iweatherify/backend/my_items.php", fd, {header: {'Content-Type':'multipart/form-data'}}).then(
            (res) => {
              console.log("This is the response from the server")
              console.log(res)
            }
          )
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
    /* display: flex;
    justify-content: center;
    align-items: center;
    margin: auto; */
  }

  .modal {
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

  .modal-header,
  .modal-footer {
    padding: 15px;
    display: flex;
  }

  .modal-header {
    position: relative;
    border-bottom: 1px solid #eeeeee;
    color: #4AAE9B;
    justify-content: space-between;
  }

  .modal-footer {
    border-top: 1px solid #eeeeee;
    flex-direction: column;
    justify-content: flex-end;
  }

  .modal-body {
    position: relative;
    /* padding: 20px 10px; */
  }

  .btn-close {
    position: absolute;
    top: 0;
    right: 0;
    border: none;
    font-size: 20px;
    padding: 10px;
    cursor: pointer;
    font-weight: bold;
    color: #4AAE9B;
    background: transparent;
    cursor: pointer;
  }

  .btn-green {
    color: white;
    background: #4AAE9B;
    border: 1px solid #4AAE9B;
    border-radius: 2px;
    cursor: pointer;
  }

  .add-btn{
    font-family: 'Inter';
    font-style: normal;
    font-size: large;
    font-weight: bold;
    padding: 0.7em;
    color: white;
    background-color: grey;
    cursor: pointer;
}

.save-btn{
    font-family: 'Inter';
    font-style: normal;
    font-size: large;
    font-weight: bold;
    padding: 0.7em 10em;
    color: white;
    background-color: black;
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