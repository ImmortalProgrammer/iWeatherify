<template>
    <div>
        <div class="Navbar">
            <nav-bar class="navbar"></nav-bar>
        </div>

        <div class="title-container">
            <h1 class="title">{{ title }}</h1>
        </div>
    
        <div class="Inputs">
            <form action="/add_new_outfit.php"> <!-- TODO - Replace with actual php file when implemented -->
                <label>Outfit name: </label>
                <input>
                <br>
                
                <label>Location: </label>
                <input>
                <br>
                
                <label>Degrees: </label>
                <input>
                <br>

                <button class="add-btn">Add clothing item</button>

                <button class="save-btn">SAVE</button>

            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios"
import NavBar from "@/NavBar/NavBar.vue";
export default {
    name: "AddClothingModal",
    components: {NavBar},
    data() {
        return {

        }
    },

}
</script>

<style scoped>
.navbar {
    top: -0.85%;
  }

.add-btn{
    font-family: 'Inter';
    font-style: normal;
    font-size: large;
    font-weight: bold;
    padding: 0.7em 10em;
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

.Inputs label {
    font-family: var(--font-family-inter);
    font-weight: 600;
}
</style>