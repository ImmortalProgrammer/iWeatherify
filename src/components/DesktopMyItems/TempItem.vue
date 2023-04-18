<template>
    <div class="Temperature-Items">
        <!-- Hidden modal -->
        <modal v-show="isModalVisible" @close="closeModal" :title="temp_and_clothing" :temp_category="temp_category" :clothing_category="clothing_category"></modal>

        <div class="All-my-items">
          <saved-item class="savedItem"
            v-for="item in items"
            :key = "item.id"
            :image_name = "item.clothing_name"
            :upload_path = '`https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/uploads/${item.upload_path}`'
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
        items: null,
        isModalVisible: false,
        userid: null,
        temp_and_clothing: this.$route.name,
        temp_category: this.$route.meta.temp_category,
        clothing_category: this.$route.meta.clothing_category,
      }
    },
    created() {
      this.getUserId().then(() => {this.getAllItems()});
    },
    methods: {
      showModal(){
        this.isModalVisible = true
        console.log("The state of showModal is: " + this.isModalVisible)
      },
      closeModal(){
        this.isModalVisible = false
        console.log("Closing the modal")
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
      getAllItems(){
        axios.post("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/get_my_items.php", 
        {
          user_id: this.userid,
          temp_category: this.temp_category,
          clothing_category: this.clothing_category
        })
        .then(res => {
          if(res != null){
            let lod = JSON.parse(JSON.stringify(res.data.message))
            this.items = lod
          } else {
            console.log("There was no data in the response")
          }
        }).catch((err) => {
          console.log(err)
        })
      }
    },
}
</script>

<style scoped>

.plusButton{
  padding-top: 20px;
  margin: auto;
  width: min-content;
}

.All-my-items{
  display: grid;
  width: 90vw;
  /* height: 100vh; */
  justify-content: space-evenly;
  grid-template-columns: repeat(3, 1fr);
  align-content: space-between;
  margin-top: 10vh;
}

.Temperature-Items {
    background: white;
    margin: auto;
}

.plusButton:hover {
    cursor: pointer;
}

</style>