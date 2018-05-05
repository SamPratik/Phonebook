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
      },
      errors: {}
    }
  },
  methods: {
    save() {
      // console.log(this.$data.list);
      // to access 'this' you must need to use 'ES6' syntax function...
      axios.post('phonebooks', this.$data.list)
      .then(response => {
        document.getElementById('addForm').reset();
        if(typeof response.data.error != 'undefined') {
          this.errors = response.data;
          console.log(response.data);
        } else {
          $("#addModal").modal('hide');
          this.$parent.lists.push(response.data);
          this.$parent.lists.sort(function(a,b){
            if(a.name > b.name) {
              return 1;
            } else if (a.name < b.name) {
              return -1;
            }
          })
        }
      });
    }
  }
}
</script>
<style lang="scss" scoped>
</style>
