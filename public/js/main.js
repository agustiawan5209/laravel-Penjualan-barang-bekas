ClassicEditor
.create(document.querySelector('#editor'), {
    toolbar: ['|'],

})
.catch(error => {
    console.error(error);
});
