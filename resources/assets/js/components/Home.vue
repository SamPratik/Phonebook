<template>
  <div id="">
    <div>
      <div class="col-md-6 offset-md-3">
        <div class="well" style="padding:20px 0px;">
          <strong>Vuejs Phonebook</strong>
          <button class="btn btn-outline-success pull-right" type="button" data-toggle="modal" data-target="#addModal">Add New</button>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="" placeholder="Search here...">
        </div>
        <div class="">
          <ul class="list-group">
            <li class="list-group-item" v-for="item, key in lists">
              {{item.name}}
              <span class="pull-right">
                <i style="margin-right:20px;" class="fa fa-trash text-danger" aria-hidden="true"></i>
                <i style="margin-right:20px;" class="fa fa-edit text-warning" v-on:click="editItemModal(key)"></i>
                <i class="fa fa-eye text-primary" v-on:click="showItemModal(key)"></i>
              </span>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <br>
    <Add></Add>
    <Show></Show>
    <Edit></Edit>
  </div>
</template>
<script>
var Add = require('./Add.vue');
var Show = require('./Show.vue');
var Edit = require('./Edit.vue');
export default {
  name: "",
  components: {
    Add,
    Show,
    Edit
  },
  data() {
    return {
      lists: []
    }
  },
  methods: {
    showItemModal(key) {
      this.$children[1].item = this.lists[key];
      $("#showModal").modal('show');
    },
    editItemModal(key) {
      $("#editModal").modal('show');
      this.$children[2].list = this.lists[key];
    }
  },
  created() {
    //do something after creating vue instance
    axios.post('/getData')
      .then(response => {
        this.lists = response.data;
        console.log(this.lists);
      });
    // console.log("Vue instance created!");
  }
}
</script>
<style lang="scss" scoped>
  i {
    cursor: pointer;
  }
</style>
