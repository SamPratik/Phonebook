<template>
  <div id="">
    <div>
      <div class="col-md-6 offset-md-3">
        <div class="well" style="padding:20px 0px;">
          <strong>Vuejs Phonebook</strong>
          <i v-if="loading" class="fa fa-refresh fa-spin" style="margin-left:10px;font-size:20px;"></i>
          <button class="btn btn-outline-success pull-right" type="button" data-toggle="modal" data-target="#addModal">Add New</button>
        </div>
        <div class="form-group">
          <input v-model="searchTerm" type="text" class="form-control" id="" placeholder="Search here...">
        </div>
        <div class="">
          <ul class="list-group">
            <li class="list-group-item" v-for="item, key in filteredLists">
              {{item.name}}
              <span class="pull-right">
                <i style="margin-right:20px;" class="fa fa-trash text-danger" aria-hidden="true"  v-on:click="delItem(key, item.id)"></i>
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
      lists: [],
      loading: false,
      searchTerm: '',
      filteredLists: []
    }
  },
  watch: {
    searchTerm: function() {
      this.filteredLists = this.lists.filter(item => {
        return item.name.toLowerCase().indexOf(this.searchTerm.toLowerCase()) > -1;
      });
    }
  },
  methods: {
    showItemModal(key) {
      this.$children[1].item = this.filteredLists[key];
      $("#showModal").modal('show');
    },
    editItemModal(key) {
      $("#editModal").modal('show');
      this.$children[2].list = this.filteredLists[key];
    },
    delItem(key, itemID) {
      var c = confirm('Are you sure, you want to delete this item?');
      if(c == true) {
        this.loading = !this.loading;
        axios.delete(`/phonebooks/${itemID}`)
          .then(response => {
            if(response.data == "success") {
              this.loading = !this.loading;
              for(let i=0; i<this.lists.length; i++) {
                if(this.filteredLists[key].id == this.lists[i].id) {
                  this.lists.splice(i,1);
                  break;
                }
              }
              this.filteredLists.splice(key, 1);
            }
          });
        // console.log(`${key} ${itemID}`);
      }
    }
  },
  created() {
    //do something after creating vue instance
    axios.post('/getData')
      .then(response => {
        this.lists = this.filteredLists = response.data;
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
