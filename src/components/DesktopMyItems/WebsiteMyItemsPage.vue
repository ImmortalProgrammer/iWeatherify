<template>
  <div class="container-center-horizontal">
    <div class="website-my-items-page screen">
      <div class="flex-col">
        <div class="flex-row">
          <img class="default-logo-3" :src="defaultLogo3" alt="Default Logo 3" /><ellipse6 :src="ellipse6Props.src" />
          <img
            class="vector"
            src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/64028608c9953e08464983be/img/vector-1.svg"
            alt="Vector"
          />
        </div>
        <div class="overlap-group7">
          <div class="overlap-group4">
            <div class="rectangle-263"></div>
            <div class="hot ui---16-regular2">{{ hot }}</div>
            <img
              class="line"
              src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/6403ff00aa8af8606e71b64d/img/line-83.svg"
              alt="Line 83"
            />
            <img
              class="line-84"
              src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/6403ff00aa8af8606e71b64d/img/line-84.svg"
              alt="Line 84"
            />
          </div>
          <div class="overlap-group3">
            <div class="rectangle-264"></div>
            <img
              class="line-85"
              src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/6403ff00aa8af8606e71b64d/img/line-85.svg"
              alt="Line 85"
            />
            <img
              class="line-86"
              src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/6403ff00aa8af8606e71b64d/img/line-86.svg"
              alt="Line 86"
            />
            <div class="warm ui---16-regular2">{{ warm }}</div>
          </div>
          <div class="overlap-group1">
            <div class="overlap-group2">
              <div class="rectangle-265"></div>
              <img
                class="line-87"
                src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/6403ff00aa8af8606e71b64d/img/line-85.svg"
                alt="Line 87"
              />
              <img
                class="line-88"
                src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/6403ff00aa8af8606e71b64d/img/line-86.svg"
                alt="Line 88"
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
        <div class="add-edit-delete-container">
          <add-edit-delete />
          <add-edit-delete :className="addEditDelete1Props.className" />
          <add-edit-delete :className="addEditDelete2Props.className" />
        </div>
      </div>
      <div class="flex-row-1">
        <div class="flex-col-1">
          <div class="overlap-group5">
            <img
              class="rectangle-266"
              src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/6403ff00aa8af8606e71b64d/img/rectangle-266.svg"
              alt="Rectangle 266"
            />
            <img
              class="line-89"
              src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/6403ff00aa8af8606e71b64d/img/line-85.svg"
              alt="Line 89"
            />
            <img
              class="line"
              src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/6403ff00aa8af8606e71b64d/img/line-86.svg"
              alt="Line 90"
            />
            <div class="place ui---16-regular2">{{ place }}</div>
          </div>
          <add-edit-delete :className="addEditDelete3Props.className" />
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
                  class="line-91"
                  src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/6403ff00aa8af8606e71b64d/img/line-85.svg"
                  alt="Line 91"
                />
                <img
                  class="line-92"
                  src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/6403ff00aa8af8606e71b64d/img/line-86.svg"
                  alt="Line 92"
                />
              </div>
              <add-edit-delete :className="addEditDelete4Props.className" />
            </div>
            <div class="flex-col-4">
              <div class="line-container-1">
                <img
                  class="line-93"
                  src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/6403ff00aa8af8606e71b64d/img/line-85.svg"
                  alt="Line 93"
                />
                <img
                  class="line-94"
                  src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/6403ff00aa8af8606e71b64d/img/line-86.svg"
                  alt="Line 94"
                />
              </div>
              <add-edit-delete :className="addEditDelete5Props.className" />
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
export default {
  name: "WebsiteMyItemsPage",
  components: {
    Ellipse6,
    ListboxComponent,
    AddEditDelete,
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

<style>
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

.default-logo-3 {
  height: 71px;
  object-fit: cover;
  width: 212px;
}

.vector {
  height: 41px;
  margin-bottom: 2px;
  margin-left: 30px;
  width: 41px;
}

.overlap-group7 {
  align-self: flex-end;
  height: 422px;
  margin-top: 4px;
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

.rectangle-263 {
  background-color: var(--alto);
  height: 228px;
  left: 3px;
  position: absolute;
  top: 24px;
  width: 197px;
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

.line {
  height: 143px;
  left: 39px;
  object-fit: cover;
  position: absolute;
  top: 65px;
  width: 126px;
}

.line-84 {
  height: 143px;
  left: 40px;
  object-fit: cover;
  position: absolute;
  top: 65px;
  width: 126px;
}

.overlap-group3 {
  height: 251px;
  left: 289px;
  position: absolute;
  top: 171px;
  width: 198px;
}

.rectangle-264 {
  background-color: var(--alto);
  height: 228px;
  left: 2px;
  position: absolute;
  top: 23px;
  width: 196px;
}

.line-85 {
  height: 143px;
  left: 34px;
  object-fit: cover;
  position: absolute;
  top: 70px;
  width: 126px;
}

.line-86 {
  height: 143px;
  left: 35px;
  object-fit: cover;
  position: absolute;
  top: 70px;
  width: 126px;
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

.rectangle-265 {
  background-color: var(--alto);
  height: 228px;
  left: 0;
  position: absolute;
  top: 194px;
  width: 197px;
}

.line-87 {
  height: 143px;
  left: 33px;
  object-fit: cover;
  position: absolute;
  top: 236px;
  width: 126px;
}

.line-88 {
  height: 143px;
  left: 34px;
  object-fit: cover;
  position: absolute;
  top: 236px;
  width: 126px;
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
  margin-top: 2px;
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

.rectangle-266 {
  height: 228px;
  left: 3px;
  position: absolute;
  top: 23px;
  width: 196px;
}

.line-89 {
  height: 143px;
  left: 38px;
  object-fit: cover;
  position: absolute;
  top: 65px;
  width: 126px;
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
  min-height: 280px;
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

.line-91 {
  height: 143px;
  left: 31px;
  object-fit: cover;
  position: absolute;
  top: 41px;
  width: 126px;
}

.line-92 {
  height: 143px;
  left: 32px;
  object-fit: cover;
  position: absolute;
  top: 41px;
  width: 126px;
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

.line-93 {
  height: 143px;
  left: 34px;
  object-fit: cover;
  position: absolute;
  top: 45px;
  width: 126px;
}

.line-94 {
  height: 143px;
  left: 35px;
  object-fit: cover;
  position: absolute;
  top: 45px;
  width: 126px;
}
</style>
