$('#addUser').on('click', function (e) {
    e.preventDefault();
    $("#addUserModal").modal("show");

} );

$('.x').on('click', function (e) {
    e.preventDefault();
    var val = "'" +"#"+$(this).attr('id')+"'";
    var getName = $(this).attr('name');
    var getValue = JSON.parse(getName);
    $("[name='username']").val(getValue['username']); 
    $("[name='name']").val(getValue['name']);
    $("[name='surname']").val(getValue['surname']);
    $("[name='email']").val(getValue['email']);
    $("[name='mobile']").val(getValue['mobile']);
    $("[name='jobtitle']").val(getValue['jobtitle']);
    $("[name='bio']").val(getValue['bio']);
    $("#editUserModal").modal("show");

} );