<template>
    <div class="AddClothingModal">
        <!-- <div class="Navbar">
            <nav-bar class="navbar"></nav-bar>
        </div> -->

        <div class="title-container">
            <h1 class="title">{{ title }}</h1>
        </div>
    
        <div class="Inputs">
            <form> <!-- TODO - Replace with actual php file when implemented -->
                <label>Outfit name: </label>
                <input>
                <br>
                
                <label>Location: </label>
                <input>
                <br>
                
                <label>Degrees: </label>
                <input>
                <br>
                <br>

                <label>Clothes: </label>
                <button class="add-btn" @click.prevent = "$router.push('/addClothing')">Add clothing item</button>
                <br>
                <br>

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
    props: [
        "title"
    ]

}
</script>

<style scoped>
.title-container {
  /* position: relative; */
  top: 75px;
  margin: auto;
  display: flex;
  justify-content: center;
  align-items: center;
}

.title-container h1{
  color: var(--black);
  font-weight: 600;
  font-size: 3em;
  font-family: 'Inter';
  font-style: normal;
}

.AddClothingModal {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    /* align-content: center; */
    margin:auto
}

.navbar {
    top: -0.85%;
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

.Inputs label {
    font-family: var(--font-family-inter);
    font-weight: 600;
    font-size: large;
}

input {
    height: 3em;
    width: 30.5em;
}
</style>