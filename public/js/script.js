$(document).ready(function(){
    $('.panel-header').html('SIGN IN');
});


function getUsers() {
    const apiUrl = "http://localhost:8008";
    const $list = $('.users-list');

    $.ajax({
        url : apiUrl + '/?page=admin_users',
        dataType : 'json'
    })
        .done((res) => {

            $list.empty();
            //robimy pętlę po zwróconej kolekcji
            //dołączając do tabeli kolejne wiersze
            res.forEach(el => {
                $list.append(`<tr class="d-flex">
                    <td scope="col" class="col-3">${el.name}</td>
                    <td scope="col" class="col-3">${el.surname}</td>
                    <td scope="col" class="col-4">${el.email}</td>
                    <td scope="col" class="col-1">${el.Role}</td>
                    <td scope="col" class="col-1">
                    <button type="button" onclick="deleteUser(${el.id})" style="background: none; border: none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                         width="20" height="20"
                                         viewBox="0 0 224 224"
                                         style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,224v-224h224v224z" fill="none"></path><g fill="#e74c3c"><g id="surface1"><path d="M41.02,28.28l-12.74,12.74l70.98,70.98l-71.4,71.54l12.6,12.6l71.54,-71.4l71.4,71.4l12.74,-12.74l-71.4,-71.4l70.98,-70.98l-12.74,-12.74l-70.98,70.98z"></path></g></g></g></svg>
                                </button>
                    </td>
                    </tr>`);
            })
        });
}

function deleteUser(id) {
    if (!confirm('Are you sure to delete this user?')) {
        return;
    }

    const apiUrl = "http://localhost:8002";

    $.ajax({
        url : apiUrl + '/?page=admin_delete_user',
        method : "POST",
        data : {
            id : id
        },
        success: function() {
            alert('Selected user successfully deleted from database!');
            getUsers();
        }
    });
}
