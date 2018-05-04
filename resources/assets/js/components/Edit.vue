<template>
  <div id="">
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit {{list.name}}'s Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="addForm" class="">
              <div class="form-group">
                <input v-model="list.name" type="text" class="form-control" id="" placeholder="Name">
                <p class="text-danger" v-if="errors.name">{{ errors.name[0] }}</p>
              </div>
              <div class="form-group">
                <input v-model="list.phone" type="text" class="form-control" id="" placeholder="Phone">
                <p class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</p>
              </div>
              <div class="form-group">
                <input v-model="list.email" type="email" class="form-control" id="" placeholder="Email">
                <p class="text-danger" v-if="errors.email">{{ errors.email[0] }}</p>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" v-on:click="update">Update</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "",
  data() {
    return {
      list: {},
      errors: {}
    }
  },
  methods: {
    update() {
      axios.put(`phonebooks/${this.list.id}`, this.$data.list)
        .then((response) => {
          if(response.data == "success") {
            console.log(response.data);
            $("#editModal").modal('hide');
          } else {
            this.errors = response.data;
          }
        });
    }
  }
}
</script>
<style lang="scss" scoped>
</style>
