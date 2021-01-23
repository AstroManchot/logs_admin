/**
 * 
 */

var inst = {
  list : function () {
  // list() : show all the users

    adm.load({
      url : "ajax-instruments.php",
      target : "container",
      data : {
        req : "list"
      }
    });
  },

  addEdit : function (id) {
  // addEdit() : show add/edit user docket
  // PARAM id : user ID

    adm.load({
      url : "ajax-instruments.php",
      target : "container",
      data : {
        req : "addEdit",
        id : id
      }
    });
  },

  save : function () {
  // save() : save user

    var id = document.getElementById("inst_id").value;
    adm.ajax({
      url : "ajax-instruments.php",
      data : {
        req : (id=="" ? "add" : "edit"),
        id : id,
        name : document.getElementById("inst_name").value,
        statut : document.getElementById("inst_statut").value,
        date : document.getElementById("inst_date").value
      },
      ok : inst.list
    });
    return false;
  },

  del : function (id) {
  // del() : delete user
  // PARAM id : user ID

    if (confirm("Supprimer l'utilisateur?")) {
      adm.ajax({
        url : "ajax-instruments.php",
        data : {
          req : "del",
          id : id
        },
        ok : inst.list
      });
    }
  }
};

window.addEventListener("load", inst.list);