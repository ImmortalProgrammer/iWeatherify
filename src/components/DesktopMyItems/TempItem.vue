<template>
    <div class="Temperature-Items">
        <!-- Hidden modal -->
        <modal v-show="isModalVisible" @close="closeModal"></modal>

        <div class="All-my-clothes">
            <div class="plusButton" @click.self="showModal">
                <img class="plus-math" src="../../../img/plus-math@2x.png" @click.self="showModal" alt="Plus Math" />  
            </div>
        </div>

    </div>
</template>

<script>
import NavBar from '../../NavBar/NavBar.vue';
import Modal from "../Modal/Modal.vue";
export default {
    name: "TempItem",
    components: {
        NavBar,
        Modal
    },
    props: [

    ],
    data(){
      return {
        isModalVisible: false
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

.Temperature-Items {
    background: white;
    margin: auto;
}

.plusButton:hover {
    cursor: pointer;
}

</style>