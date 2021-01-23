/**
 * 
 */

var filtertest = {
  list : function () {
  // list() : show all the filters

    adm.load({
      url : "ajax-filters.php",
      target : "container",
      data : {
        req : "list"
      }
    });
  },

  addEdit : function (id) {
  // addEdit() : show add/edit filter docket
  // PARAM id : filter ID

    adm.load({
      url : "ajax-filters.php",
      target : "container",
      data : {
        req : "addEdit",
        id : id
      }
    });
  },

  save : function () {
  // save() : save filter

    var id = document.getElementById("filter_id").value;
    adm.ajax({
      url : "ajax-filters.php",
      data : {
        req : (id=="" ? "add" : "edit"),
        id : id,
        instrument : document.getElementById("filter_instrument").value,
        filter : document.getElementById("filter_filter").value,
        filter_name : document.getElementById("filter_name").value,
        plage : document.getElementById("filter_plage").value
      },
      ok : filtertest.list
    });
    return false;
  },

  del : function (id) {
  // del() : delete filter
  // PARAM id : filer ID

    if (confirm("Supprimer le filtre?")) {
      adm.ajax({
        url : "ajax-filters.php",
        data : {
          req : "del",
          id : id
        },
        ok : filtertest.list
      });
    }
  }
};

window.addEventListener("load", filtertest.list);