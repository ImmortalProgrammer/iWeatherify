<template>
    <div v-if="showModal" class="error-modal">
      <div class="modal-content">
        <div id="title-container">
          <h1>{{ title }}</h1>
        </div>
        <br>
        <br>
        <p>{{ message }}</p>
        <br>
        <button @click="closeModal">Cancel</button>
      </div>
    </div>
</template>
  
<script>
  export default {
    props: {
      showModal: {
        type: Boolean,
        required: true,
      },
      title: {
        type: String,
        required: true,
      },
      message: {
        type: String,
        required: true,
      },
    },
    methods: {
      closeModal() {
        this.$emit("close-modal");
      },
    },
  };
</script>
  
<style scoped>
.error-modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.modal-content {
  background-color: #264653;
  color: rgba(255, 255, 255, 0.869);
  padding: 2rem;
  border-radius: 5px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
}

#title-container {
  display: flex;
  width: 100%;
  justify-content: center;
  border-bottom: 3px solid rgba(255, 255, 255, 0.869);
  padding-bottom: 5px;
}

h1 {
  font-size: large;
  font-weight: bold;
}

button {
  margin-top: 1rem;
  cursor: pointer;
  border-radius: 5px;
  height: 1.75rem;
  width: 5rem;
  color: white; 
  background-color: #4AAE9B;
  font-family: 'Inter';
  font-style: normal;
}
</style>  