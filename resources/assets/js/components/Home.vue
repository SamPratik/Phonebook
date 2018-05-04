<template>
  <div id="">
    <div class="row">
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
            <li class="list-group-item">
              Cras justo odio
              <span class="pull-right">
                <i style="margin-right:20px;" class="fa fa-trash text-danger" aria-hidden="true"></i>
                <i style="margin-right:20px;" class="fa fa-edit text-warning"></i>
                <i class="fa fa-eye text-primary"></i>
              </span>
            </li>
            <li class="list-group-item">
              Dapibus ac facilisis in
              <span class="pull-right">
                <i style="margin-right:20px;" class="fa fa-trash text-danger" aria-hidden="true"></i>
                <i style="margin-right:20px;" class="fa fa-edit text-warning"></i>
                <i class="fa fa-eye text-primary"></i>
              </span>
            </li>
            <li class="list-group-item">
              Morbi leo risus
              <span class="pull-right">
                <i style="margin-right:20px;" class="fa fa-trash text-danger" aria-hidden="true"></i>
                <i style="margin-right:20px;" class="fa fa-edit text-warning"></i>
                <i class="fa fa-eye text-primary"></i>
              </span>
            </li>
            <li class="list-group-item">
              Porta ac consectetur ac
              <span class="pull-right">
                <i style="margin-right:20px;" class="fa fa-trash text-danger" aria-hidden="true"></i>
                <i style="margin-right:20px;" class="fa fa-edit text-warning"></i>
                <i class="fa fa-eye text-primary"></i>
              </span>
            </li>
            <li class="list-group-item">
              Vestibulum at eros
              <span class="pull-right">
                <i style="margin-right:20px;" class="fa fa-trash text-danger" aria-hidden="true"></i>
                <i style="margin-right:20px;" class="fa fa-edit text-warning"></i>
                <i class="fa fa-eye text-primary"></i>
              </span>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <Add></Add>
  </div>
</template>
<script>
var Add = require('./Add.vue');
export default {
  name: "",
  components: {
    Add
  },
  data() {
    return {

    }
  }
}
</script>
<style lang="scss" scoped>
i {
  cursor: pointer;
}
</style>
