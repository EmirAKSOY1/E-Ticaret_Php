const exampleModal = document.getElementById('exampleModal');
exampleModal.addEventListener('show.bs.modal', event => {
  const button = event.relatedTarget
  const modalTitle = exampleModal.querySelector('.modal-title')
  const modalBodyInput = exampleModal.querySelector('.modal-body input')
  modalTitle.textContent = `Bilgilerini Düzenle`;
  modalBodyInput.value = recipient;
})
$("#kaydet").click(function(){
    console.log($('#name').val());
    $.ajax({
    type: "POST",
    url: 'bilgi_yenile.php',
    data: {
        name:$('#name').val(),
        surname:$('#surname').val(),
        mail:$('#mail').val(),
        tel:$('#tel').val(),
        adres:$('#adres').val()
     
   },
    success: function(data){
     location.href='bilgilerim.php';
    },
    error: function(xhr, status, error){
    console.error(xhr);
    }
   });
     });