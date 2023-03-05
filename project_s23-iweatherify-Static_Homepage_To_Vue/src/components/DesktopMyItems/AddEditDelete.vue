<template>
  <div :class="[`add-edit-delete-1 ui---14-regular`, className || ``]">
    <div class="edit">Edit</div>
    <div class="delete">Delete</div>
  </div>
</template>

<script>
export default {
  name: "AddEditDelete",
  props: ["className"],
};
</script>

<style>
.add-edit-delete-1 {
  align-items: flex-start;
  align-self: flex-start;
  display: flex;
  gap: 7px;
  height: 17px;
  min-width: 80px;
}

.edit {
  color: var(--blue-secondary);
  font-weight: 400;
  line-height: normal;
  min-height: 17px;
  min-width: 26px;
  text-align: right;
}

.delete {
  color: var(--blue-secondary);
  font-weight: 400;
  line-height: normal;
  min-height: 17px;
  min-width: 43px;
  text-align: right;
}

.add-edit-delete-1.add-edit-delete-2 {
  align-self: unset;
  margin-left: 208px;
}

.add-edit-delete-1.add-edit-delete-3 {
  align-self: unset;
  margin-left: 209px;
}

.add-edit-delete-1.add-edit-delete {
  align-self: unset;
}

.add-edit-delete-1.add-edit-delete-4 {
  align-self: flex-end;
}
</style>
