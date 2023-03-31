<template>
    <div v-if="showModal" class="error-modal">
      <div class="modal-content">
        <h1>{{ title }}</h1>
        <br>
        <p>{{ message }}</p>
        <br>
        <button @click="closeModal">Close</button>
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
  background-color: white;
  padding: 2rem;
  border-radius: 5px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
}

h1 {
  font-size: larger;
  font-weight: bold;
  text-decoration: underline;
}

button {
  margin-top: 1rem;
  cursor: pointer;
}
</style>  