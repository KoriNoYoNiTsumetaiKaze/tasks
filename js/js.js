function getTasks_success(msg) {
  let tab = JSON.parse(msg);
  let tasks_table = $('#tasks_table');
  tab.forEach( function(s) {
    let tr = $('<tr>');
    tasks_table.append(tr);
    let td_user = $('<td>', {text: s['user']});
    tr.append(td_user);
    let td_email = $('<td>', {text: s['email']});
    tr.append(td_email);
    let td_task = $('<td>', {text: s['task']});
    tr.append(td_task);
    let td_status = $('<td>', {text: s['status']});
    tr.append(td_status);
  });
  $('#tasks_table').DataTable($.fn.dataTable.defaults,{
    searching: true,
    ordering: true
    });
}

function getTasks() {
  $.ajax({
    type: "POST",
    url: "php/tasks.php",
    success: getTasks_success
    });
}

$(document).ready(getTasks);
