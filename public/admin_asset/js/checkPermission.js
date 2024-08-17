let checked_permissions = document.querySelectorAll('.checked_permissions');
let check_all_permission = document.querySelector('.check_all_permission');


    function checkAllPermission() {
        console.log(check_all_permission.checked);
        checked_permissions.forEach((item) => {
            item.checked = check_all_permission.checked;
           //if all checked_permissions checked = true , then  check_all_permission checked = true
        });

        
    }
