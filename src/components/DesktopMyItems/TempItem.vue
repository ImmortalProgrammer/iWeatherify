<template>
    <div class="Temperature-Items">
        <div>
            <nav-bar></nav-bar>
        </div>

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
import NavBar from '../../NavBar/NavBar.vue'
export default {
    name: "TempItem",
    components: {
        NavBar
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

.Temperature-Items {
    background: white;
    margin: auto;
}

.plusButton:hover {
    cursor: pointer;
}

</style>