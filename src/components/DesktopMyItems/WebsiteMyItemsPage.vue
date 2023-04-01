<template>
  <div class="container-center-horizontal">
    <div class="website-my-items-page screen">
      
      <div class="flex-col">
        
        <div class="flex-row">
          <nav-bar></nav-bar>
        </div>
        
        <div class="overlap-group7">
          
          <div class="overlap-group4">
            <div class="hot ui---16-regular2">{{ hot }}</div>
            <img
              src="../../../img/my_items_icons/hot.svg"
              alt="Line 83"
              style="width:200px; margin-top: 20px;"
            />
          </div>

          <div class="overlap-group3">
            <img
              src="../../../img/my_items_icons/warm.svg"
              alt="Line 83"
              style="width:200px; margin-top: 20px;"
            />
            <div class="warm ui---16-regular2">{{ warm }}</div>
          </div>

          <div class="overlap-group1">
            <div class="overlap-group2">
              <img
              src="../../../img/my_items_icons/just_right.svg"
              alt="Line 83"
              style="width:200px; margin-top: 190px;"
            />
              <div class="just-right ui---16-regular2">{{ justRight }}</div>
              <listbox-component
                :listBoxTitleProps="listboxComponentProps.listBoxTitleProps"
                :placeholderTextProps="listboxComponentProps.placeholderTextProps"
              />
            </div>
            <p class="categorize-clothes-b">{{ categorizeClothesB }}</p>
          </div>

          <h1 class="title">{{ title }}</h1>
        </div>
      </div>

      <div class="flex-row-1">
        <div class="flex-col-1">
          <div class="overlap-group5">
            <img
              src="../../../img/my_items_icons/chilly.svg"
              alt="Line 83"
              style="width:200px; margin-top: 20px;"
            />
            <div class="place ui---16-regular2">{{ place }}</div> 
          </div>

          <div class="edit-delete4">
        </div>

        </div>
        <div class="flex-col-2">
          <div class="flex-row-2 ui---16-regular2">
            <div class="cold">{{ cold }}</div>
            <div class="freezing">{{ freezing }}</div>
          </div>
          <div class="flex-row-3">
            <div class="flex-col-3">
              <div class="line-container">
                <img
              src="../../../img/my_items_icons/cold.svg"
              alt="Line 83"
              style="width:200px; margin-top: -5px;"
            />
              </div>

            </div>
            <div class="flex-col-4">
              <div class="line-container-1">
                <img
              src="../../../img/my_items_icons/freezing.svg"
              alt="Line 83"
              style="width:200px; margin-top: -5px;"
            />
              </div>

              <div class="edit-delete6">
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Ellipse6 from "./Ellipse6";
import ListboxComponent from "./ListboxComponent";
import AddEditDelete from "./AddEditDelete";
import menuBar from "@/components/menuBars/menuBarLoggedIn.vue";
import NavBar from "@/NavBar/NavBar.vue";
export default {
  name: "WebsiteMyItemsPage",
  components: {
    NavBar,
    Ellipse6,
    ListboxComponent,
    AddEditDelete,
    menuBar,
  },
  props: [
    "defaultLogo3",
    "hot",
    "warm",
    "justRight",
    "categorizeClothesB",
    "title",
    "place",
    "cold",
    "freezing",
    "ellipse6Props",
    "listboxComponentProps",
    "addEditDelete1Props",
    "addEditDelete2Props",
    "addEditDelete3Props",
    "addEditDelete4Props",
    "addEditDelete5Props",
  ],
};
</script>

<style scoped>
.website-my-items-page {
  align-items: flex-end;
  background-color: var(--white);
  border: 1px none;
  display: flex;
  flex-direction: column;
  gap: 27px;
  height: 1024px;
  padding: 39px 23px;
  width: 1440px;
}

.flex-col {
  align-items: flex-start;
  display: flex;
  flex-direction: column;
  min-height: 519px;
  width: 1327px;
}

.flex-row {
  align-items: center;
  display: flex;
  min-width: 1289px;
  position: relative;
}

.overlap-group3{
  align-self: flex-end;
  height: 422px;
  margin-top: 15.6%;
  position: relative;
  width: 1084px;
}


.overlap-group7 {
  align-self: flex-end;
  height: 422px;
  margin-top: 2%;
  position: relative;
  width: 1084px;
}

.overlap-group4 {
  height: 252px;
  left: 0;
  position: absolute;
  top: 170px;
  width: 200px;
}



.hot {
  color: var(--black);
  font-weight: 400;
  left: 0;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 0;
  width: 200px;
}



.overlap-group4 {
  height: 251px;
  left: 289px;
  position: absolute;
  top: 171px;
  width: 198px;
}


.warm {
  color: var(--black);
  font-weight: 400;
  left: 0;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 0;
  width: 196px;
}

.overlap-group1 {
  height: 422px;
  left: 165px;
  position: absolute;
  top: 0;
  width: 919px;
}

.overlap-group2 {
  height: 422px;
  left: 416px;
  position: absolute;
  top: 0;
  width: 503px;
}


.just-right {
  color: var(--black);
  font-weight: 400;
  left: 8px;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 171px;
  width: 197px;
}

.categorize-clothes-b {
  color: var(--black);
  font-family: var(--font-family-inter);
  font-size: var(--font-size-s);
  font-weight: 400;
  left: 0;
  letter-spacing: 0;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 99px;
  width: 444px;
}

.title {
  color: var(--black);
  font-family: var(--font-family-inter);
  font-size: var(--font-size-l);
  font-weight: 700;
  left: 254px;
  letter-spacing: 0;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 34px;
  width: 269px;
}

.add-edit-delete-container {
  align-items: flex-end;
  align-self: center;
  display: flex;
  height: 20px;
  margin-left: 64px;
  margin-top: 18px;
  min-width: 657px;
  position: relative;
}

.edit-delete4{
  align-items: flex-end;
  align-self: center;
  display: flex;
  height: 20px;
  margin-left: 700px;
  margin-top: 12px;
  min-width: 657px;
  position: relative;
}

.edit-delete5{
  align-items: flex-end;
  align-self: center;
  display: flex;
  height: 20px;
  margin-left: 700px;
  margin-top: 9px;
  min-width: 657px;
  position: relative;
}

.edit-delete6{
  align-items: flex-end;
  align-self: center;
  display: flex;
  height: 20px;
  margin-left: 700px;
  margin-top: 9px;
  min-width: 657px;
  position: relative;
}


.flex-row-1 {
  align-items: flex-end;
  align-self: center;
  display: flex;
  gap: 90px;
  height: 280px;
  margin-left: 8px;
  min-width: 780px;
}

.flex-col-1 {
  align-items: flex-end;
  display: flex;
  flex-direction: column;
  gap: 7px;
  margin-bottom: 1px;
  min-height: 275px;
  position: relative;
  width: 199px;
}

.overlap-group5 {
  height: 251px;
  position: relative;
  width: 199px;
}


.place {
  color: var(--black);
  font-weight: 400;
  left: 0;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 0;
  width: 197px;
}

.flex-col-2 {
  align-items: flex-start;
  display: flex;
  flex-direction: column;
  gap: 1px;
  min-height: 293px;
  width: 491px;
}

.flex-row-2 {
  align-items: center;
  display: flex;
  gap: 94px;
  height: 26px;
  min-width: 488px;
}

.cold {
  color: var(--black);
  font-weight: 400;
  line-height: normal;
  min-height: 26px;
  text-align: center;
  width: 198px;
}

.freezing {
  color: var(--black);
  font-weight: 400;
  line-height: normal;
  min-height: 20px;
  text-align: center;
  width: 196px;
}

.flex-row-3 {
  align-items: flex-start;
  display: flex;
  gap: 88px;
  height: 253px;
  margin-left: 2px;
  min-width: 489px;
}

.flex-col-3 {
  align-items: flex-end;
  display: flex;
  flex-direction: column;
  gap: 7px;
  min-height: 252px;
  position: relative;
  width: 200px;
}

.line-container {
  background-color: var(--alto);
  height: 228px;
  margin-right: 3px;
  position: relative;
  width: 197px;
}



.flex-col-4 {
  align-items: flex-start;
  display: flex;
  flex-direction: column;
  gap: 8px;
  min-height: 253px;
  position: relative;
  width: 201px;
}

.line-container-1 {
  background-color: var(--alto);
  height: 228px;
  position: relative;
  width: 196px;
}


</style>
