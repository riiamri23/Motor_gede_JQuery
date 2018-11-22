
function rupiah(x){
    var	number_string = x.toString(),
	split	= number_string.split(','),
	sisa 	= split[0].length % 3,
	rupiah 	= split[0].substr(0, sisa),
	ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);
		
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    rupiah = split[1] != undefined ? "Rp. " + rupiah + ',' + '00' :"Rp. " + rupiah+ ',00';

    // Cetak hasil	
    return rupiah; // Hasil 23.456.789,32
}

function tgl_sekarang(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd = '0'+dd
    } 

    if(mm<10) {
        mm = '0'+mm
    } 

    today = mm + '/' + dd + '/' + yyyy;
    return today; // Hasil 23.456.789,32
}