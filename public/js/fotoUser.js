deleteBtn = document.getElementById('deleteUserFoto');
deleteForm = document.querySelector('form[name="deleteUserFotoForm"]');
console.log(deleteForm);



deleteBtn.addEventListener("click", function () {
    deleteForm.submit();
})