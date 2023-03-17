<template>
  <div class="container-center-horizontal">
    <div class="website-profile-no-saved-outfit screen">
      <div class="overlap-group3">
        <div class="overlap-group4">
          <div class="overlap-group2">
            <h1 class="title ui---30-semi">{{ title }}</h1>
            <listbox-component />
          </div>
          <img
            class="vector"
            src="https://anima-uploads.s3.amazonaws.com/projects/6405ee9a4548b3806a50e138/releases/6405ef8c246cb8c2cd3b302a/img/vector.svg"
            alt="Vector"
          />
          <img
            class="undraw_weather_app_re_kcb1-1"
            src="https://anima-uploads.s3.amazonaws.com/projects/6405ee9a4548b3806a50e138/releases/6405ef8c246cb8c2cd3b302a/img/undraw-weather-app-re-kcb1-1.svg"
            alt="undraw_weather_app_re_kcb1 1"
          />
          <ellipse6 :src="ellipse6Props.src" />
          <div class="overlap-group1"><img class="plus-math" :src="plusMath" alt="Plus Math" /></div>
          <input-field />
        </div>
        <div class="add ui---14-regular">{{ add }}</div>
        <img class="default-frame-logo-3" :src="defaultFrameLogo3" alt="Default Frame Logo 3" />
      </div>
      <div class="group-41">
        <p class="no-saved-outfits-try-saving-one ui---16-regular">{{ noSavedOutfitsTrySavingOne }}</p>
      </div>
    </div>
  </div>

</template>

<script>
ShowOverlay = function (overlayName, animationName) {
  overlayName = "overlay-" + overlayName;
  var cssClasses = document.getElementById(overlayName).className.split(" ");
  var last = cssClasses.slice(-1)[0];
  if (last.lastIndexOf("animate") == -1) {
    document.getElementById(overlayName).className =
      document.getElementById(overlayName).className + " " + animationName;
  }
  if (window.loadAsyncSrc != undefined) {
    loadAsyncSrc();
  }
};

HideOverlay = function (overlayName, animationName) {
  overlayName = "overlay-" + overlayName;
  var cssClasses = document.getElementById(overlayName).className.split(" ");
  var last = cssClasses.slice(-1)[0];
  if (last.lastIndexOf("animate") != -1) {
    cssClasses.splice(-1);
    cssClasses.push(animationName);
    document.getElementById(overlayName).className = cssClasses.join(" ");

    cssClasses.splice(-1);
    setTimeout(function () {
      document.getElementById(overlayName).className = cssClasses.join(" ");
    }, 1100);
  }
  var vids = document.getElementsByTagName("video");
  if (vids) {
    for (var i = 0; i < vids.length; i++) {
      var video = vids.item(i);
      video.pause();
    }
  }
};

closeOutsideOverlay = function (overlay_slug) {
  var overlay_id = `overlay-${overlay_slug}`;
  const overlayElement = document.getElementById(overlay_id);
  overlayElement.addEventListener(
    `click`,
    function (event) {
      var overlay_id = `overlay-${overlay_slug}`;
      var e = event || window.event;
      var overlayContainer = overlayElement.getElementsByClassName(`${overlay_slug}`);
      if (e.target === overlayElement) {
        HideOverlay(`${overlay_slug}`, "animate-disappear");
      }
    },
    false
  );
};

CloseOnOverlayClick = function (overlay_slug) {
  var overlay_id = `overlay-${overlay_slug}`;
  document.getElementById(overlay_id).addEventListener(
    `click`,
    function (event) {
      {
        var overlay_id = `overlay-${overlay_slug}`;
        var e = event || window.event;
        var overlayElement = document.getElementById(overlay_id);
        var overlayContainer = overlayElement.getElementsByClassName(`${overlay_slug}`);
        var clickedDiv = e.toElement || e.target;
        var dismissButton = clickedDiv.parentElement.id == overlay_id;
        var clickOutsideOverlay = false;
        if (overlayContainer.length > 0) {
          {
            clickOutsideOverlay = !overlayContainer[0].contains(clickedDiv) || overlayContainer[0] == clickedDiv;
          }
        }
        if (dismissButton || clickOutsideOverlay) {
          {
            HideOverlay(`${overlay_slug}`, "animate-disappear");
          }
        }
      }
    },
    false
  );
};
</script>
<script>
  closeOutsideOverlay("website-menu-bar");
</script>

<script>
import ListboxComponent from "./ListboxComponent";
import Ellipse6 from "./Ellipse6";
import InputField from "./InputField";
export default {
  name: "WebsiteProfileNoSavedOutfit",
  components: {
    ListboxComponent,
    Ellipse6,
    InputField,
  },
  props: ["title", "plusMath", "add", "defaultFrameLogo3", "noSavedOutfitsTrySavingOne", "ellipse6Props"],
};
</script>

<style>

.website-profile-no-saved-outfit {
  align-items: flex-end;
  background-color: var(--white);
  border: 1px none;
  display: flex;
  flex-direction: column;
  gap: 35px;
  height: 1440px;
  padding: 49px 59px;
  width: 1440px;
}

.overlap-group3 {
  height: 596px;
  position: relative;
  width: 1279px;
}

.overlap-group4 {
  height: 596px;
  left: 0;
  position: absolute;
  top: 0;
  width: 1279px;
}

.overlap-group2 {
  height: 319px;
  left: 272px;
  position: absolute;
  top: 44px;
  width: 1007px;
}

.title {
  color: var(--black);
  font-weight: 600;
  left: 0;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 0;
  width: 706px;
}

.vector {
  cursor: pointer;
  height: 41px;
  left: 1236px;
  position: absolute;
  top: 4px;
  width: 41px;
}

.undraw_weather_app_re_kcb1-1 {
  height: 361px;
  left: 380px;
  position: absolute;
  top: 235px;
  width: 490px;
}

.overlap-group1 {
  align-items: flex-end;
  background-color: var(--gray01);
  display: flex;
  height: 240px;
  justify-content: flex-end;
  left: 0;
  min-width: 343px;
  padding: 69px 121px;
  position: absolute;
  top: 226px;
}

.plus-math {
  cursor: pointer;
  height: 96px;
  width: 96px;
}

.add {
  color: var(--blue-secondary);
  cursor: pointer;
  font-weight: 400;
  left: 316px;
  line-height: normal;
  position: absolute;
  text-align: right;
  top: 469px;
}

.default-frame-logo-3 {
  height: 60px;
  left: 35px;
  object-fit: cover;
  position: absolute;
  top: 6px;
  width: 201px;
}

.group-41 {
  align-items: flex-start;
  align-self: center;
  display: flex;
  height: 61px;
  margin-left: 0.75px;
  min-width: 747px;
}

.no-saved-outfits-try-saving-one {
  color: var(--black);
  font-weight: 400;
  line-height: normal;
  min-height: 61px;
  text-align: center;
  width: 747px;
}

@media screen and (min-width: 700px) and (max-width: 1100px) {
  .title {
  color: var(--black);
  font-weight: 1000;
  left: 0;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 0;
  width: 706px;
}

.overlap-group2 {
  height: 1000px;
  left: 450px;
  position: absolute;
  top: 370px;
  width: 1000px;
}


.no-saved-outfits-try-saving-one {
  color: var(--black);
  font-size: 1rem;
  font-weight: 400;
  line-height: normal;
  min-height: 61px;
  text-align: center;
  width: 747px;
}

/* Text under Illustration */
.group-41 {
  align-items: flex-start;
  align-self: center;
  display: flex;
  height: 81px;
  margin-top: 624px;
  margin-left: 550px;
  min-width: 747px;
}

/* Hamburger Menu */
.vector {
  cursor: pointer;
  height: 115px;
  left: 351px;
  position: absolute;
  top: 135px;
  width: 115px;
}

/* Illustration */
.undraw_weather_app_re_kcb1-1 {
  height: 740px;
  left: 500px;
  position: absolute;
  top: 555px;
  width: 740px;
}

/* Add Outfits Box  */
.overlap-group1 {
 display: none;
}

/* Add Outfits Entirety */
.plus-math {
  display: none;
}

/* Add text under the Add Outfits Box */
.add {
  display: none;
}

/* Logo */
.default-frame-logo-3 {
  height: 85px;
  left: 700px;
  object-fit: cover;
  position: absolute;
  top: 150px;
  width: 320px;
}  
}


@media screen and (min-width: 200px) and (max-width: 699px) {
.title {
  color: var(--black);
  font-weight: 1000;
  left: 0;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 0;
  width: 706px;
}

.overlap-group2 {
  height: 1000px;
  left: 575px;
  position: absolute;
  top: 370px;
  width: 1000px;
}


.no-saved-outfits-try-saving-one {
  color: var(--black);
  font-size: 1rem;
  font-weight: 400;
  line-height: normal;
  min-height: 61px;
  text-align: center;
  width: 747px;
}

/* Text under Illustration */
.group-41 {
  align-items: flex-start;
  align-self: center;
  display: flex;
  height: 61px;
  margin-top: 724px;
  margin-left: 700px;
  min-width: 747px;
}

/* Hamburger Menu */
.vector {
  cursor: pointer;
  height: 115px;
  left: 511px;
  position: absolute;
  top: 135px;
  width: 115px;
}

/* Illustration */
.undraw_weather_app_re_kcb1-1 {
  height: 740px;
  left: 605px;
  position: absolute;
  top: 555px;
  width: 740px;
}

/* Add Outfits Box  */
.overlap-group1 {
 display: none;
}

/* Add Outfits Entirety */
.plus-math {
  display: none;
}

/* Add text under the Add Outfits Box */
.add {
  display: none;
}

/* Logo */
.default-frame-logo-3 {
  height: 85px;
  left: 825px;
  object-fit: cover;
  position: absolute;
  top: 150px;
  width: 320px;
}

}
</style>
