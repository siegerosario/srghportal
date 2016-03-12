function openModal(id, backdrop) {
    if(typeof(backdrop) === 'undefined') {
        backdrop = true;
    }

    $('#' + id).modal({
        backdrop: backdrop,
        show: true
    });
}

function closeModal(id) {
    $('#' + id).modal('hide');
}

function setModalContent(id, header, body, footer) {
    $('#' + id + ' .modal-header').html(header);
    $('#' + id + ' .modal-body').html(body);
    $('#' + id + ' .modal-footer').html(footer);
}

function setLoader(id) {
    $('#' + id + ' .modal-header').html('');
    $('#' + id + ' .modal-body').html('<br><span class="fa fa-spinner fa-5x fa-pulse"></span><h3>Please Wait...</h3><br>');
    $('#' + id + ' .modal-footer').html('');
}