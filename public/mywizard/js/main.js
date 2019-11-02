$(function(){
	$("#wizard").steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        onStepChanging: function (event, currentIndex, newIndex) { 
            if ( newIndex === 1 ) {
                if ($("#lokasi").val()!="") {
                    $('.wizard > .steps ul').addClass('step-2');
                    return true
                }else{
                    toast("Tentukan lokasi hunianmu dulu","error");
                    return false
                }
            } else {
                $('.wizard > .steps ul').removeClass('step-2');
            }
            if ( newIndex === 2 ) {
                if ($("#nama_hunian").val()!=""&&$("#kategori").val()!=""&&document.getElementById('gambar').files.length>0&&$("#desk").val()!="") {
                    $('.wizard > .steps ul').addClass('step-3');
                    return true
                }else{
                    toast("Pastikan form berbintang telah terisi","error");
                    return false
                }
            } else {
                $('.wizard > .steps ul').removeClass('step-3');
            }
            if ( newIndex === 3 ) {
                if ($bulan!=0||$hari!=0||$tahun!=0||$("#hargajual").val()) {
                    $('.wizard > .steps ul').addClass('step-4');
                    return true
                }else{
                    toast("Tentukan harga dulu","error");
                    $('.wizard > .steps ul').addClass('step-3');
                    return false
                }
            } else {
                $('.wizard > .steps ul').removeClass('step-4');
            }
            return true; 
        },
        onFinished: function (event, currentIndex)
        {
            insertz=[];
            var fd=new FormData();

            fd.append('_token', '{{csrf_token()}}');

            fd.append('harian',$hari);
            fd.append('bulanan',$bulan);
            fd.append('tahunan',$tahun);
            fd.append('hargajual',formatRupiah($("#hargajual").val(), "Rp."));
            fd.append('region',$("#provinsi").val());

            fd.append('status',mystatus);
            fd.append('hp',$("#hp").val());
            fd.append("nama",$("#nama_hunian").val());
            fd.append('kategori',$("#kategori").val());
            fd.append('lat',geolat);
            fd.append('lng',geolng);
            fd.append('alamat',$("#lokasi").val());
            fd.append('bed',$("#bed").val());
            fd.append('luas',$("#luas").val());
            fd.append('toilet',$("#wc").val());
            fd.append('garasi',$("#garasi").val());
            fd.append('tv',$("#tv").val());
            fd.append('desk',$("#desk").val());
            $('.get_value').each(function() {
                if ($(this).is(":checked")) {
                    insertz.push($(this).val());
                }
            });

            fd.append('fitur',JSON.stringify(insertz));
            //video
            fd.append("video",$("#video").val())
            // img
            totalfiles = document.getElementById('gambar').files.length;
            for (var index = 0; index < totalfiles; index++) {
                fd.append("imgs[]", document.getElementById('gambar').files[index]);
            }
            console.log(totalfiles);

            //kirim data
            Swal.fire({
                title: 'Daftarkan hunian?',
                text: "Silahkan cek lagi semua data sebelum hunianmu dilihat semua orang",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yap, Lanjutkan!'
              }).then((result) => {
                if (result.value) {
                    $(".overlays").show();
                    $.ajax({
                        type: "POST",
                        url: "/api/tambahiklan",
                        data: fd,
                        contentType: false, // The content type used when sending data to the server.
                        cache: false, // To unable request pages to be cached
                        processData: false,
                        dataType: "JSON",
                        success:function(response){

                            Swal.fire(response.message,response.desc,response.status).then(function (result) {
                                if (result.value) {
                                    window.location.href = "/vendor/iklan/kelola";
                                }
                            })
                        },error:function(){
                            Swal.fire("Terjadi kesalahan","Coba lagi?","error").then(function (result) {
                                $(".overlays").hide();
                                if (result.value) {
                                    $("a[href='#finish']").click();
                                }
                            })
                        }
                    });
                }
              })
        },
        labels: {
            finish: "Selesaikan",
            next: "Lanjut",
            previous: "Kembali"
        }
    });
    // Custom Button Jquery Steps
    $('.forward').click(function(){
    	$("#wizard").steps('next');
    })
    $('.backward').click(function(){
        $("#wizard").steps('previous');
    })
    // Date Picker
    var dp1 = $('#dp1').datepicker().data('datepicker');
    dp1.selectDate(new Date());
})
