<template>
  <div id="">
    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="addForm" class="">
              <div class="form-group">
                <input v-model="list.name" type="text" class="form-control" id="" placeholder="Name">
              </div>
              <div class="form-group">
                <input v-model="list.phone" type="text" class="form-control" id="" placeholder="Phone">
              </div>
              <div class="form-group">
                <input v-model="list.email" type="email" class="form-control" id="" placeholder="Email">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button v-on:click="save" type="button" class="btn btn-primary">Save</button>
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
      list: {
        name: '',
        email: '',
        phone: ''
      }
    }
  },
  methods: {
    save() {
      // console.log(this.$data.list);
      axios.post('phonebooks', this.$data.list)
      .then(function(response) {
        document.getElementById('addForm').reset();
        $("#addModal").modal('hide');
        console.log(response.data);
      })
      .catch(function(error) {
        console.log(error);
      });
    }
  }
}
</script>
<style lang="scss" scoped>
</style>
