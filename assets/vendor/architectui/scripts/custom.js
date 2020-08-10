//New Custome
$('document').ready(function(){
  var base_url=window.location.origin+'/siklinik/';
  $('#cari_obat').keyup(function(){
    reset();
    var query = $(this).val();
    if(query.length >= 3)
    {
         $.ajax({
              url:base_url+'search_data/cari_obat',
              method:"POST",
              data:{query:query},
              success:function(data)
              {
                   $('#list_obat').fadeIn();
                   $('#list_obat').html(data);
              }
         });
    }else {
      $('#list_obat').fadeOut();
    }
  });

  $(document).on('click', 'li', function(){
      var string=$(this).text();
      if (string=='Obat Not Found'){
        $('#kode_obat').val('');
      }else{

        var hb=$(this).data('hb');
        var hj=$(this).data('hj');
        var unit=$(this).data('unit');
        var isi=$(this).data('isi');
        var explode= string.split("/");
        var kode_obat = explode[0];
        var nama_obat = explode[1];
        var kategori = explode[2];
        $('#kode_obat').val(kode_obat);
        $('#nama_obat').val(nama_obat);
        $('#kategori').val(kategori);
        $('#unit').val(unit);
        $('#isi').val(isi);
        $('#harga_jual').val(hj);
        $('#harga_beli').val(hb);
        $('#list_obat').fadeOut();
      }
  });

  function reset(){
    $('#kode_obat').val('');
    $('#nama_obat').val('');
    $('#kategori').val('');
  }

  $('#cari_alkes').keyup(function(){
    reset_alkes();
    var query = $(this).val();
    if(query.length >= 3)
    {
         $.ajax({
              url:base_url+'search_data/cari_alkes',
              method:"POST",
              data:{query:query},
              success:function(data)
              {
                   $('#list_alkes').fadeIn();
                   $('#list_alkes').html(data);
              }
         });
    }else {
      $('#list_alkes').fadeOut();
    }
  });

  $(document).on('click', 'li', function(){
      var string=$(this).text();
      if (string=='Alkes Not Found'){
        $('#kode_alkes').val('');
      }else{

        var hb=$(this).data('hb');
        var hj=$(this).data('hj');
        var unit=$(this).data('unit');
        var isi=$(this).data('isi');
        var explode= string.split("/");
        var kode_alkes = explode[0];
        var nama_alkes = explode[1];
        var kategori = explode[2];
        $('#kode_alkes').val(kode_alkes);
        $('#nama_alkes').val(nama_alkes);
        $('#kategori').val(kategori);
        $('#unit').val(unit);
        $('#isi').val(isi);
        $('#kategori_alkes').val(kategori);
        $('#unit_alkes').val(unit);
        $('#isi_alkes').val(isi);
        $('#harga_jual').val(hj);
        $('#harga_beli').val(hb);
        $('#harga_jual_alkes').val(hj);
        $('#harga_beli_alkes').val(hb);
        $('#list_alkes').fadeOut();
      }
  });

  function reset_alkes(){
    $('#kode_alkes').val('');
    $('#nama_alkes').val('');
    $('#kategori').val('');
  }

  $(".vertical-nav-menu").metisMenu();
  $(".close-sidebar-btn").click(function(){
    $(".app-container").toggleClass("closed-sidebar");
    $(".close-sidebar-btn").toggleClass("is-active");
    $(".logo-src img").toggleClass("small");
    $(".brand").toggleClass("hide");
    $(".scrollbar-sidebar").toggleClass("m-top-0");
  });
  $(".mobile-toggle-nav").click(function(){
    $(this).toggleClass("is-active");
    $(".app-container").toggleClass("sidebar-mobile-open");
  });
  $(".mobile-toggle-header-nav").click(function(){
    $(this).toggleClass("active");
    $(".app-header__content").toggleClass("header-mobile-open");
  });

  $(".navigation-list").click(function(){
    $(".navigation-list").removeClass('mm-active');
    $(this).addClass('mm-active');
    $(".app-container").removeClass("sidebar-mobile-open");
  });

  
  $(".app-sidebar").hover(function() { 
    if($(".app-container").hasClass("closed-sidebar")){
      $(".logo-src img").addClass("hide"); 
      $(".scrollbar-sidebar").addClass("m-top-0-up");
    }
    
  }, function() { 
    if($(".app-container").hasClass("closed-sidebar")){
      $(".logo-src img").removeClass("hide"); 
      $(".scrollbar-sidebar").removeClass("m-top-0-up");
    }
  }); 
  
  new PerfectScrollbar(".scrollbar-sidebar",{wheelSpeed:2,wheelPropagation:!1,minScrollbarLength:20});
});

function loadPage(x){
    $(".hamburger").removeClass("is-active");
    $('#content').empty();
    $('#loading').show();
    $('#content').load(x);
  }

function loadPageInner(x){
  $('#content-inner').empty();
  $('#loading-inner').show();
  $('#content-inner').load(x);
}

  
  function process1(param){
    $(param).addClass('buttonload');
    $(param).html('<i class="fa fa-sync fa-spin"></i> DiProses...');
    $(param).prop('disabled',true);
    $(param).click(function(){return false;});
  }
  
  function process_done1(param,text){
    $(param).removeClass('buttonload');
    $(param).html(text);
    $(param).prop('disabled',false);
    $(param).click(function(){return true;});
  }

  function autoseparator(Num){
    Num += '';
        Num = Num.replace('.', ''); Num = Num.replace('.', ''); Num = Num.replace('.', '');
        Num = Num.replace('.', ''); Num = Num.replace('.', ''); Num = Num.replace('.', '');
        x = Num.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1))
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        return x1 + x2;
  }
  
  function removeSeparator(Num){
    x=Num.replace(/\./g,'');
    return (x);
  }
  
  
  function totop(){
    $("html").animate({ scrollTop: 0 }, "fast");
  }

  function base_url_func() {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin+'/'+pathparts[1].trim('/')+'/'; // http://localhost/myproject/
    }else{
        var url = location.origin; // http://stackoverflow.com
    }
    return url;
}





 