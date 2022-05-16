<script>
    $(document).ready(function () {
        // All check box check
        $('#checkPermissionAll').click(function(){
            if($(this).is(':checked')){
                // all checkbox are checked
                $('input[type=checkbox]').prop('checked', true)
            }else{
                // all checkbox are un check
                $('input[type=checkbox]').prop('checked', false)
            }
        })
    });

    function checkPermissionByGroup(className, checkThis){
        const groupIdName = $("#"+checkThis.id);
        const classCheckBox = $('.'+className+' input');
        
        if(groupIdName.is(':checked')){
             classCheckBox.prop('checked', true);
         }else{
             classCheckBox.prop('checked', false);
         }
         implementAllChecked(); 
     }

     function checkSinglePermission(groupClassName, groupID, countTotalPermission) {
        const groupIDCheckBox = $("#"+groupID);
        // if there is any occurance where something is not selected then make selected = false
        if($('.'+groupClassName+ ' input:checked').length == countTotalPermission){
            groupIDCheckBox.prop('checked', true);
        }else{
            groupIDCheckBox.prop('checked', false);
        }
        implementAllChecked();
     }

     function implementAllChecked() {
             const countPermissions = {{ count($permissions_all) }};
             const countPermissionGroups = {{ count($permission_groups) }};
            //  console.log((countPermissions + countPermissionGroups));
            //  console.log($('input[type="checkbox"]:checked').length);
             if($('input[type="checkbox"]:checked').length >= (countPermissions + countPermissionGroups)){
                $("#checkPermissionAll").prop('checked', true);
            }else{
                $("#checkPermissionAll").prop('checked', false);
            }
    }
    implementAllChecked(); 
</script>