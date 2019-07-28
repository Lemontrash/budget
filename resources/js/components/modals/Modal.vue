<template>
  <div class="modal" ref="modal-window">
    <div class="modal-inner">
      <div class="close-modal" @click="closeModal">
        <i class="fal fa-times"></i>
      </div>
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  methods : {
    closeModal(event) {
      this.$emit('close', false)
      console.log('closed');
    }
  }

}
</script>

<style lang="scss" scoped>
.modal {
  position: fixed;
  z-index:100;
  background-color: rgba(0,0,0,0.1);
  width: 100vw;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  .modal-inner {
    background-color: #fff;
    border-radius: 10px;
    padding:16px 24px;
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    .close-modal {
      position: absolute;
      top: 8px;
      right: 8px;
      color: #333;
      font-size: 24px;
      border-radius: 50%;
      width: 30px;
      height: 30px;
      display: flex;
      justify-content: center;
      align-items: center;
      padding:2px;
      cursor: pointer;
      &:hover {
        background-color: rgba(100,100,100,0.1);
      }
    }
  }
}
</style>
