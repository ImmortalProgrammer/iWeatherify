<template>
    <div class="Temperature-Items">
        <!-- Hidden modal -->
        <modal v-show="isModalVisible" @close="closeModal" :title="temp_and_clothing" :temp_category="temp_category" :clothing_category="clothing_category"></modal>

        <div class="All-my-items">
          <saved-item 
            v-for="item in items"
            :key = "item.index"
            :image_name = "item.image_name"
            :upload_path = "item.upload_path"
          >
          </saved-item>
        </div>

        <div class="All-my-clothes">
            <div class="plusButton" @click.self="showModal">
                <img class="plus-math" src="../../../img/plus-math@2x.png" @click.self="showModal" alt="Plus Math" />  
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios"
import NavBar from '../../NavBar/NavBar.vue';
import Modal from "../Modal/Modal.vue";
import SavedItem from "./SavedItem.vue";
export default {
    name: "TempItem",
    components: {
        NavBar,
        Modal,
        SavedItem
    },
    props: [

    ],
    data(){
      return {
        items: [
          {image_name: "my jacket", upload_path: "bunny.jpg", index: 1},
          {image_name: "my duck", upload_path: "duck.jpg", index: 2},
          {image_name: "cute", upload_path: "cute_bunny.jpg", index: 1},
          {image_name: "cuteeeeeeeeeeeee", upload_path: "cute_bunny_2.jpg", index: 2},
          {image_name: "Actual jacket", upload_path: "Summer jacket.png", index: 1},
        ],
        isModalVisible: false,
        temp_and_clothing: this.$route.name,
        temp_category: this.$route.meta.temp_category,
        clothing_category: this.$route.meta.clothing_category
      }
    },
    methods: {
      showModal(){
        this.isModalVisible = true
        console.log("The state of showModal is: " + this.isModalVisible)
      },
      closeModal(){
        this.isModalVisible = false
        console.log("Closing the modal")
      }
    },
}
</script>

<style scoped>

.plusButton{
  padding-top: 20px;
}

.All-my-items{
  display: grid;
  width: 100vw;
  height: 100vh;
  justify-content: space-evenly;
  grid-template-columns: repeat(3, 1fr);
  align-content: space-between;
}

.Temperature-Items {
    background: white;
    margin: auto;
}

.plusButton:hover {
    cursor: pointer;
}

</style>